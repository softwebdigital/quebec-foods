<?php

namespace App\Http\Controllers;

use App\Notifications\CustomNotification;
use App\Notifications\CustomNotificationByEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function index()
    {
        return view('user.notifications.index', ['notifications' => auth()->user()->notifications()->paginate(50)]);
    }

    // Show Notifications.
    public function show($notification)
    {
        DB::table('notifications')->where('id', $notification)->update(['read_at' => now()]);
        $notification = DB::table('notifications')->where('id', $notification)->first();
        return view('user.notifications.show', ['notification' => $notification]);
    }

    public static function sendAdminRegistrationEmailNotification($admin, $password)
    {
        $msg = 'Welcome to '.env('APP_NAME').'.<br>
                An administrator account with role of <b>'.$admin->roles()->first()['name'].'</b> has been created for you, find your login credentials below.<br><br>
                Email: <b>'.$admin['email'].'</b><br>
                Password: <b>'.$password.'</b><br>';
        $admin->notify(new CustomNotificationByEmail('Administrator Welcome', $msg, 'Login to Dashboard', route('admin.login')));
    }

    // Welcome Email.
    public static function sendWelcomeEmailNotification($user)
    {
        $msg = 'Welcome to '.env('APP_NAME').'.<br>
                Your profile has been completed successfully and your account is active.<br>
                You can proceed to invest in our awesome investments plans.';
        $user->notify(new CustomNotificationByEmail('Welcome to '.env('APP_NAME'), $msg, 'Login to Dashboard', route('login')));
    }

    public static function sendInvestmentCreatedNotification($investment)
    {
        // $pdf = PDF::loadView('pdf.certificate', ['investment' => $investment]);
        $description = 'Your investment of <b>₦ '.number_format($investment->amount).'</b> in our <b>'.$investment->package["name"].'</b> package was successful.';
        $msg = 'Your investment of <b>₦ '.number_format($investment->amount).'</b> in our <b>'.$investment->package["name"].'</b> package was successful.<br><br>
                <b><u>Investment details:</u></b><br>
                Investment package: <b>'.$investment->package["name"].'</b><br>
                Total amount invested: <b>₦ '.number_format($investment->amount).'</b><br>
                ROI amount: <b>₦ '.number_format($investment->total_return - $investment->amount).'</b><br>
                Expected returns: <b>₦ '.number_format($investment->total_return).'</b><br>
                Investment duration: <b>'.$investment['return_date']->diff($investment['investment_date'])->m.' month(s)</b><br>
                Investment date: <b>'.$investment->investment_date->format('M d, Y \a\t h:i A').'</b><br>
                Return date: <b>'.$investment->return_date->format('M d, Y \a\t h:i A').'</b><br>
                Investment method: <b>'.$investment->transaction["method"].'</b><br><br>
                <b><u>Wallet details:</u></b><br>
                Amount debited: <b>₦ '.number_format($investment->amount, 2).'</b><br>
                Wallet balance: <b>₦ '.number_format($investment->user->wallet['balance'], 2).'</b><br>
                ';
        // $investment->user->notify(new CustomNotification('investment', 'Investment Created', $msg, $description, $pdf->output()));
        $investment->user->notify(new CustomNotification('investment', 'Investment Created', $msg, $description));
    }

    public static function sendInvestmentQueuedNotification($investment)
    {
        $description = 'Your investment of <b>₦ '.number_format($investment->amount).'</b> in our <b>'.$investment->package["name"].'</b> package has been queued.';
        $msg = 'Your investment of <b>₦ '.number_format($investment->amount).'</b> in our <b>'.$investment->package["name"].'</b> package has been queued.<br>
                Your investment will be automatically created once you payment has been approved.';
        $investment->user->notify(new CustomNotification('pending', 'Investment Queued', $msg, $description));
    }

    public static function sendWithdrawalQueuedNotification($transaction)
    {
        $description = 'Your withdrawal of <b>₦ '.number_format($transaction['amount']).'</b> has been queued.';
        $msg = 'Your withdrawal of <b>₦ '.number_format($transaction['amount']).'</b> has been queued.<br>
                Your bank account will be credited after administrator approval.';
        $transaction->user->notify(new CustomNotification('pending', 'Withdrawal Queued', $msg, $description));
    }

    public static function sendDepositQueuedNotification($transaction)
    {
        $description = 'Your deposit of <b>₦ '.number_format($transaction['amount']).'</b> has been queued.';
        $msg = 'Your deposit of <b>₦ '.number_format($transaction['amount']).'</b> has been queued.<br>
                Your wallet will be automatically credited once you payment has been approved.';
        $transaction->user->notify(new CustomNotification('pending', 'Deposit Queued', $msg, $description));
    }

    public static function sendDepositCancelledNotification($transaction)
    {
        $description = 'Your queued deposit of <b>₦ '.number_format($transaction['amount']).'</b> has been declined.';
        $msg = 'Your queued deposit of <b>₦ '.number_format($transaction['amount']).'</b> has been declined.<br>
                Contact administrator <a href="mailto:'.env('SUPPORT_EMAIL').'">'.env('SUPPORT_EMAIL').'</a> for further complaints.';
        $transaction->user->notify(new CustomNotification('cancelled', 'Deposit Declined', $msg, $description));
    }

    public static function sendWithdrawalSuccessfulNotification($transaction)
    {
        $description = 'Your withdrawal of <b>₦ '.number_format($transaction['amount']).'</b> was successful.';
        $msg = 'Your withdrawal of <b>₦ '.number_format($transaction['amount']).'</b> was successful.<br><br>
                <b><u>Withdrawal details:</u></b><br>
                Amount: <b>₦ '.number_format($transaction['amount']).'</b><br>
                Withdrawal method: <b>'.$transaction["method"].'</b><br><br>
                <b><u>Wallet details:</u></b><br>
                Amount debited: <b>₦ '.number_format($transaction->amount).'</b><br>
                Wallet balance: <b>₦ '.number_format($transaction->user->wallet['balance']).'</b><br>';
        $transaction->user->notify(new CustomNotification('withdrawal', 'Withdrawal Successful', $msg, $description));
    }

    public static function sendDepositSuccessfulNotification($transaction)
    {
        $method = $transaction["method"] == 'deposit' ? 'deposit / bank transfer' : $transaction["method"];
        $description = 'Your deposit of <b>₦ '.number_format($transaction['amount']).'</b> was successful.';
        $msg = 'Your deposit of <b>₦ '.number_format($transaction['amount']).'</b> was successful.<br><br>
                <b><u>Deposit details:</u></b><br>
                Amount: <b>₦ '.number_format($transaction['amount']).'</b><br>
                Deposit method: <b>'.$method.'</b><br><br>
                <b><u>Wallet details:</u></b><br>
                Amount credited: <b>₦ '.number_format($transaction->amount, 2).'</b><br>
                Wallet balance: <b>₦ '.number_format($transaction->user->wallet['balance'], 2).'</b><br>';
        $transaction->user->notify(new CustomNotification('deposit', 'Deposit Successful', $msg, $description));
    }

    public static function sendWithdrawalCancelledNotification($transaction)
    {
        $description = 'Your queued withdrawal of <b>₦ '.number_format($transaction['amount']).'</b> has been declined.';
        $msg = 'Your queued withdrawal of <b>₦ '.number_format($transaction['amount']).'</b> has been declined.<br>
                Your wallet has been refunded, contact administrator <a href="mailto:'.env('SUPPORT_EMAIL').'">'.env('SUPPORT_EMAIL').'</a> for further complaints.';
        $transaction->user->notify(new CustomNotification('cancelled', 'Withdrawal Declined', $msg, $description));
    }

    public static function sendInvestmentCancelledNotification($investment)
    {
        $description = 'Your queued investment of <b>₦ '.number_format($investment->amount).'</b> in our <b>'.$investment->package["name"].'</b> package has been cancelled.';
        $msg = 'Your queued investment of <b>₦ '.number_format($investment->amount).'</b> in our <b>'.$investment->package["name"].'</b> package has been cancelled.<br>
                Contact administrator <a href="mailto:'.env('SUPPORT_EMAIL').'">'.env('SUPPORT_EMAIL').'</a> for further complaints.';
        $investment->user->notify(new CustomNotification('cancelled', 'Investment Cancelled', $msg, $description));
    }
}
