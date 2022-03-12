<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\NotificationController as ControllersNotificationController;
use App\Models\Investment;
use App\Models\OnlinePayment;
use App\Models\Package;
use App\Models\Referral;
use App\Models\Setting;
use App\Models\Transaction;
use App\Models\User;

use App\Notifications\CustomNotificationByEmailWithoutGreeting;
use App\Notifications\CustomNotificationWithoutGreeting;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;

class CommandController extends Controller
{
    public static function generateSettings()
    {
        if (Setting::all()->count() == 0){
            Setting::create([
                'bank_name' => 'Quebec Bank',
                'account_number' => '0123456789',
                'account_name' => 'Quebec'
            ]);
        }
    }

    public static function notifyMaturity()
    {
        $investments = Investment::query()
                                    ->with('user')
                                    ->where('status', 'active')
                                    ->get();
        foreach ($investments as $investment){
            if (now()->diffInDays(date('Y-m-d', strtotime($investment['return_date']))) == 30){
                try {
                    \App\Http\Controllers\NotificationController::sendInvestmentAlmostMaturedNotification($investment->user);
                } catch (Exception $e) {
                    logger($e->getMessage());
                }
            }
        }
    }

    public static function transactionNotify()
    {
        $transactions = Transaction::query()->where('status', 'pending')->count();
        if ($transactions > 0){
            $settings = Setting::all()->first();
            if ($settings['pending_transaction_mail'] == 1){
                $dateTime = date('Y-m-d H:i:s', strtotime($settings['last_pending_transaction_notification'].' + '.$settings['pending_transaction_mail_interval']));
                if (now()->gte($dateTime)){
                    try {
                        NotificationController::sendPendingTransactionNotificationOnScheduleToAdmin($transactions);
                    } catch (Exception $e ) {
                        logger($e->getMessage());
                    }
                    $settings->update(['last_pending_transaction_notification' => now()]);
                }
            }
        }
    }

    public static function deleteUsers()
    {
        $setting = Setting::all()->first();
        if ($setting['auto_delete_unverified_users'] == 1){
            $users = User::query()->whereNull('email_verified_at')
                ->get();
            foreach ($users as $user){
                if ($user->canBeDeleted($setting['auto_delete_unverified_users_after'])){
                    Referral::query()->where('referred_id', $user['id'])
                        ->delete();
                    $user->wallet()->delete();
                    $user->delete();
                }
            }
        }
    }

    public static function settlePayments()
    {
        $payments = OnlinePayment::query()->where('status', 'pending')->get();
        foreach ($payments as $payment){
//            if ($payment->canRetryVerification()){
                $paymentDetails = Http::withHeaders([
                    'Authorization' => 'Bearer '.env('PAYSTACK_SECRET_KEY')
                ])->get('https://api.paystack.co/transaction/verify/'.$payment['reference']);
                try {
                    if (isset($paymentDetails['status'])) {
                        $res = $paymentDetails['data'];
                        if (isset($res)) {
                            if ($res["status"] == 'success') {
                                OnlinePaymentController::processTransaction($payment, $res['metadata']);
                                $payment->update(['status' => 'success']);
                            } else {
                                $payment->update(['status' => 'failed']);
                            }
                        }
                    }
                } catch (\Exception $e) {
                    $payment->update(['status' => 'failed']);
                }
//            }
        }
    }

    public static function settleInvestments()
    {
        $investments = Investment::query()->with('package', 'transactions')->where('status', 'active')->get();
        foreach ($investments as $investment) {
            $package = $investment->package;
            $user = $investment->user;
            if ($package->type == 'plant') {
                $totalPayments = $investment->transactions()->where('type', 'payout')->count();
                $milestones = $investment->current_package['milestones'];
                $roi = $investment['amount'] * ($investment->current_package['roi'] / 100);
                $next = $totalPayments + 1;
                if (Carbon::make($investment['start_date'])->addMonths($investment->getPlantDurationIncreaseByMonth($next))->lt(now())) {
                    if ($next == $milestones) {
                        $user->wallet()->increment('balance', $investment->amount + $roi);
                        $investment->update(['status' => 'settled']);
                        TransactionController::storeInvestmentPayoutTransaction($investment, $investment->amount + $roi);
                        try {
                            \App\Http\Controllers\NotificationController::sendInvestmentMilestoneSettledNotification($investment, $investment->amount + $roi);
                            \App\Http\Controllers\NotificationController::sendInvestmentSettledNotification($investment);
                        } catch(Exception $e) {
                            logger($e->getMessage());
                        }
                    } else if ($totalPayments < $milestones) {
                        $user->wallet()->increment('balance', $roi);
                        TransactionController::storeInvestmentPayoutTransaction($investment, $roi);
                        try {
                            \App\Http\Controllers\NotificationController::sendInvestmentMilestoneSettledNotification($investment, $roi);
                        } catch (Exception $e) {
                            logger($e->getMessage());
                        }
                    }
                }
            } else {
                if ($investment->canSettle()){
                    $availablePackage = Package::where('type', 'farm')->where('status', 'open')->latest()->first();
                    if ($availablePackage && $investment->rollover){
                        $slots = floor($investment['total_return'] / $availablePackage['price']);
                        $amount = $slots * $availablePackage['price'];
                        $balance = $investment['total_return'] - $amount;

                        if ($slots > 0){
                            if ($availablePackage['duration_mode'] == 'day') {
                                $returnDate = now()->addDays($availablePackage['duration'])->format('Y-m-d H:i:s');
                            } elseif ($availablePackage['duration_mode'] == 'month') {
                                $returnDate = now()->addMonths($availablePackage['duration'])->format('Y-m-d H:i:s');
                            } else {
                                $returnDate = now()->addYears($availablePackage['duration'])->format('Y-m-d H:i:s');
                            }
                            $newInvestment = Investment::create([
                                'user_id' => $investment->user['id'], 'package_id'=> $availablePackage['id'], 'slots' => $slots,
                                'amount' => $amount, 'total_return' => $amount * (( 100 + $availablePackage['roi'] ) / 100 ),
                                'investment_date' => now()->format('Y-m-d H:i:s'),
                                'return_date' => $returnDate, 'status' => 'active'
                            ]);
                            if ($newInvestment){
                                TransactionController::storeInvestmentTransaction($newInvestment, 'wallet');
                                try {
                                    \App\Http\Controllers\NotificationController::sendRolloverInvestmentCreatedNotification($newInvestment);
                                } catch(Exception $e) {
                                    logger($e->getMessage());
                                }
                            }
    //                        Check if user has balance and refund
                            if ($balance > 0){
                                $user->wallet()->increment('balance', $balance);
                            }
                        }else{
                            $user->wallet()->increment('balance', $investment['total_return']);
                        }
                    }else{
                        $user->wallet()->increment('balance', $investment['total_return']);
                    }
                    $investment->update(['status' => 'settled']);
                    TransactionController::storeInvestmentPayoutTransaction($investment, $investment['amount']);
                    try {
                        \App\Http\Controllers\NotificationController::sendInvestmentSettledNotification($investment);
                    } catch (Exception $e) {
                        logger($e->getMessage());
                    }
                }
            }
        }
    }

    public static function activateInvestment() {
        $investments = Investment::where('payment', 'approved')->where('status', 'pending')->get();
        foreach ($investments as $investment) {
            if (Carbon::make($investment->start_date)->lte(now())) {
                $investment->update([
                    'start_date' => now(),
                    'status'     => 'active'
                ]);
                try {
                    \App\Http\Controllers\NotificationController::sendInvestmentStartedNotification($investment);
                } catch(Exception $e) {
                    logger($e->getMessage());
                }
            }
        }
    }

    public static function closePackages()
    {
        $packages = Package::where('type', 'farm')->where('status', 'open')->get();
        foreach ($packages as $package) {
            if (Carbon::make($package->start_date)->lte(now())) {
                $package->update([
                    'status' => 'closed'
                ]);
            }
        }
    }
}
