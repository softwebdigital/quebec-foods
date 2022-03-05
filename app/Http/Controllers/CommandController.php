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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;

class CommandController extends Controller
{
    public static function generateSettings()
    {
        if (Setting::all()->count() == 0){
            Setting::create([
                'bank_name' => 'Access Bank',
                'account_number' => '0123456789',
                'account_name' => 'Rare Gems'
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
                \App\Http\Controllers\NotificationController::sendInvestmentAlmostMaturedNotification($investment->user);
            }
        }
    }

    public static function transactionNotify()
    {
        $transactions = Transaction::query()->where('status', 'pending')->count();
        if ($transactions > 0){
            $settings = Setting::all()->first();
            if ($settings['pending_transaction_mail'] == 1){
                logger("Pinged");
                $dateTime = date('Y-m-d H:i:s', strtotime($settings['last_pending_transaction_notification'].' + '.$settings['pending_transaction_mail_interval']));
                logger($dateTime);
                logger(now());
                if (now()->gte($dateTime)){
                    logger("Fired");
                    NotificationController::sendPendingTransactionNotificationOnScheduleToAdmin($transactions);
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
        $investments = Investment::query()->where('status', 'active')->get();
        foreach ($investments as $investment){
//            Check if investment can be settled
            if ($investment->canSettle()){
//                Check if investment has rollover
                $user = $investment->user;
                if ($investment->rollover){
                    $rollover = $investment->rollover;
//                    Check if returns can purchase slot
                    if (!($investment['total_return'] < ($rollover['slots'] * $rollover->package['price']))){
                        $slots = $rollover['slots'];
                    }else{
                        $slots = floor($investment['total_return'] / $rollover->package['price']);
                    }
                    $amount = $slots * $rollover->package['price'];
                    $balance = $investment['total_return'] - $amount;
//                    Check if slots can create investment
                    if ($slots > 0){
//                        Create investment from rollover
                        $package = Package::find($investment->package->id);
                        if ($package['duration_mode'] == 'day') {
                            $returnDate = now()->addDays($package['duration'])->format('Y-m-d H:i:s');
                        } elseif ($package['duration_mode'] == 'month') {
                            $returnDate = now()->addMonths($package['duration'])->format('Y-m-d H:i:s');
                        } else {
                            $returnDate = now()->addYears($package['duration'])->format('Y-m-d H:i:s');
                        }
                        $newInvestment = Investment::create([
                            'user_id' => $investment->user['id'], 'package_id'=> $rollover->package['id'], 'slots' => $slots,
                            'amount' => $amount, 'total_return' => $amount * (( 100 + $rollover->package['roi'] ) / 100 ),
                            'investment_date' => now()->format('Y-m-d H:i:s'),
                            'return_date' => $returnDate, 'status' => 'active'
                        ]);
                        if ($newInvestment){
                            TransactionController::storeInvestmentTransaction($newInvestment, 'wallet');
                            \App\Http\Controllers\NotificationController::sendRolloverInvestmentCreatedNotification($newInvestment);
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
                \App\Http\Controllers\NotificationController::sendInvestmentSettledNotification($investment);
            }
        }
    }

}
