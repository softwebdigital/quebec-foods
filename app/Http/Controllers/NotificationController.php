<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use \PDF;
use App\Notifications\CustomNotification;
use App\Notifications\CustomNotificationByEmail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CustomNotificationByStaticEmail;

class NotificationController extends Controller
{
    public function index()
    {
        return view('user.notifications.index', ['notifications' => auth()->user()->notifications()->paginate(50)]);
    }

    public function read(): \Illuminate\Http\RedirectResponse
    {
        foreach (auth()->user()->unreadNotifications()->get() as $notification) {
            $notification->markAsRead();
        }
        return redirect()->route('notifications')->with('success', 'Notifications marked as read');
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
        $msg = 'Welcome to ' . env('APP_NAME') . '.<br>
                An administrator account with role of <b>' . $admin->roles()->first()['name'] . '</b> has been created for you, find your login credentials below.<br><br>
                Email: <b>' . $admin['email'] . '</b><br>
                Password: <b>' . $password . '</b><br>';
        $admin->notify(new CustomNotificationByEmail('Administrator Welcome', $msg, 'Login to Dashboard', route('admin.login')));
    }

    // Welcome Email.
    public static function sendWelcomeEmailNotification($user, $api = false)
    {
        $title = 'Welcome to ' . env('APP_NAME');
        $msg = 'Welcome to ' . env('APP_NAME') . '.<br>
                Your profile has been completed successfully and your account is active.<br>
                You can proceed to invest in our awesome investments plans.';
        if ($api)
            $user->notify(new CustomNotificationByEmail($title, $msg));
        else
            $user->notify(new CustomNotificationByEmail($title, $msg, 'Login to Dashboard', route('login')));
    }

    public static function sendMaintenancePaidNotification($item, $user)
    {
        $msg = "Maintenance payment for the month of {$item['month']} {$item['year']} has been queued, click below to process this payment.<br>";
        $user->notify(new CustomNotificationByEmail('Maintenance Payment Queued', $msg, 'Process Payment', route('admin.maintenance.index')));
    }

    public static function sendMaintenanceApprovedNotification($item, $user)
    {
        $msg = "Maintenance payment for the month of {$item['month']} {$item['year']} has been approved.<br>";
        $user->notify(new CustomNotificationByEmail('Maintenance Payment Approved', $msg, 'Process Payment', route('admin.maintenance.index')));
    }

    public static function sendMaintenanceDeclinedNotification($item, $user)
    {
        $msg = "Maintenance payment for the month of {$item['month']} {$item['year']} has been declined.<br>";
        $user->notify(new CustomNotificationByEmail('Maintenance Payment Declined', $msg, 'Process Payment', route('admin.maintenance.index')));
    }

    public static function sendInvestmentCreatedNotification($investment)
    {
        $transaction = $investment->transactions()->where('type', 'investment')->first();
        $pdf = PDF::loadView('pdf.certificate', ['investment' => $investment]);
        $description = 'Your investment of <b>' . getCurrency() .' ' . number_format($investment->amount, 2) . '</b> in our <b>' . $investment->package["name"] . '</b> package was successful.';
        $msg = 'Your investment of <b>' . getCurrency() .' ' . number_format($investment->amount, 2) . '</b> in our <b>' . $investment->package["name"] . '</b> package was successful.<br><br>
                <b><u>Investment details:</u></b><br>
                Investment package: <b>' . $investment->package["name"] . '</b><br>
                Total amount invested: <b>' . getCurrency() .' ' . number_format($investment->amount, 2) . '</b><br>
                CVR amount: <b>' . getCurrency() .' ' . number_format($investment->total_return - $investment->amount, 2) . '</b><br>
                Expected returns: <b>' . getCurrency() .' ' . number_format($investment->total_return, 2) . '</b><br>
                Investment duration: <b>' . Carbon::make($investment['return_date'])->diffInMonths($investment['investment_date']) . ' month(s)</b><br>
                Investment date: <b>' . $investment->investment_date->format('M d, Y \a\t h:i A') . '</b><br>
                Return date: <b>' . Carbon::make($investment->return_date)->format('M d, Y \a\t h:i A') . '</b><br>
                Investment method: <b>' . $transaction->method . '</b><br><br>
                <b><u>Wallet details:</u></b><br>
                Amount debited: <b>' . getCurrency() .' ' . number_format($investment->amount, 2) . '</b><br>
                Wallet balance: <b>' . getCurrency() .' ' . number_format($investment->user->wallet['balance'], 2) . '</b><br>
                ';
        $investment->user->notify(new CustomNotification('investment', 'Investment Created', $msg, $description, $pdf->output()));
        // $investment->user->notify(new CustomNotification('investment', 'Investment Created', $msg, $description));
    }

    public static function sendInvestmentStartedNotification($investment)
    {
        $transaction = $investment->transactions()->where('type', 'investment')->first();
        $pdf = PDF::loadView('pdf.certificate', ['investment' => $investment]);
        $description = 'Your investment of <b>' . getCurrency() .' ' . number_format($investment->amount, 2) . '</b> in our <b>' . $investment->package["name"] . '</b> package has started.';
        $msg = 'Your investment of <b>' . getCurrency() .' ' . number_format($investment->amount, 2) . '</b> in our <b>' . $investment->package["name"] . '</b> package has started.<br><br>
                <b><u>Investment details:</u></b><br>
                Investment package: <b>' . $investment->package["name"] . '</b><br>
                Total amount invested: <b>' . getCurrency() .' ' . number_format($investment->amount, 2) . '</b><br>
                CVR amount: <b>' . getCurrency() .' ' . number_format($investment->total_return - $investment->amount, 2) . '</b><br>
                Expected returns: <b>' . getCurrency() .' ' . number_format($investment->total_return, 2) . '</b><br>
                Investment duration: <b>' . Carbon::make($investment['return_date'])->diffInMonths($investment['investment_date']) . ' month(s)</b><br>
                Investment date: <b>' . $investment->investment_date->format('M d, Y \a\t h:i A') . '</b><br>
                Return date: <b>' . Carbon::make($investment->return_date)->format('M d, Y \a\t h:i A') . '</b><br>
                Investment method: <b>' . $transaction->method . '</b><br>';
        $investment->user->notify(new CustomNotification('investment', 'Investment Created', $msg, $description, $pdf->output()));
        // $investment->user->notify(new CustomNotification('investment', 'Investment Started', $msg, $description));
    }

    public static function sendInvestmentQueuedNotification($investment)
    {
        $description = 'Your investment of <b>' . getCurrency() .' ' . number_format($investment->amount, 2) . '</b> in our <b>' . $investment->package["name"] . '</b> package has been queued.';
        $msg = 'Your investment of <b>' . getCurrency() .' ' . number_format($investment->amount, 2) . '</b> in our <b>' . $investment->package["name"] . '</b> package has been queued.<br>
                Your investment will be automatically created once you payment has been approved.';
        $investment->user->notify(new CustomNotification('pending', 'Investment Queued', $msg, $description));
    }

    public static function sendWithdrawalQueuedNotification($transaction)
    {
        $description = 'Your withdrawal of <b>' . getCurrency() .' ' . number_format($transaction['amount'], 2) . '</b> has been queued.';
        $msg = 'Your withdrawal of <b>' . getCurrency() .' ' . number_format($transaction['amount'], 2) . '</b> has been queued.<br>
                Your bank account will be credited after administrator approval.';
        $transaction->user->notify(new CustomNotification('pending', 'Withdrawal Queued', $msg, $description));
    }

    public static function sendDepositQueuedNotification($transaction)
    {
        $description = 'Your deposit of <b>' . getCurrency() .' ' . number_format($transaction['amount'], 2) . '</b> has been queued.';
        $msg = 'Your deposit of <b>' . getCurrency() .' ' . number_format($transaction['amount'], 2) . '</b> has been queued.<br>
                Your wallet will be automatically credited once you payment has been approved.';
        $transaction->user->notify(new CustomNotification('pending', 'Deposit Queued', $msg, $description));
    }

    public static function sendDepositCancelledNotification($transaction)
    {
        $description = 'Your queued deposit of <b>' . getCurrency() .' ' . number_format($transaction['amount'], 2) . '</b> has been declined.';
        $msg = 'Your queued deposit of <b>' . getCurrency() .' ' . number_format($transaction['amount'], 2) . '</b> has been declined.<br>
                Contact administrator <a href="mailto:' . env('SUPPORT_EMAIL') . '">' . env('SUPPORT_EMAIL') . '</a> for further complaints.';
        $transaction->user->notify(new CustomNotification('cancelled', 'Deposit Declined', $msg, $description));
    }

    public static function sendWithdrawalSuccessfulNotification($transaction)
    {
        $description = 'Your withdrawal of <b>' . getCurrency() .' ' . number_format($transaction['amount'], 2) . '</b> was successful.';
        $msg = 'Your withdrawal of <b>' . getCurrency() .' ' . number_format($transaction['amount'], 2) . '</b> was successful.<br><br>
                <b><u>Withdrawal details:</u></b><br>
                Amount: <b>' . getCurrency() .' ' . number_format($transaction['amount'], 2) . '</b><br>
                Withdrawal method: <b>' . $transaction["method"] . '</b><br><br>
                <b><u>Wallet details:</u></b><br>
                Amount debited: <b>' . getCurrency() .' ' . number_format($transaction->amount, 2) . '</b><br>
                Wallet balance: <b>' . getCurrency() .' ' . number_format($transaction->user->wallet['balance'], 2) . '</b><br>';
        $transaction->user->notify(new CustomNotification('withdrawal', 'Withdrawal Successful', $msg, $description));
    }

    public static function sendDepositSuccessfulNotification($transaction)
    {
        $method = $transaction["method"] == 'deposit' ? 'deposit / bank transfer' : $transaction["method"];
        $description = 'Your deposit of <b>' . getCurrency() .' ' . number_format($transaction['amount'], 2) . '</b> was successful.';
        $msg = 'Your deposit of <b>' . getCurrency() .' ' . number_format($transaction['amount'], 2) . '</b> was successful.<br><br>
                <b><u>Deposit details:</u></b><br>
                Amount: <b>' . getCurrency() .' ' . number_format($transaction['amount'], 2) . '</b><br>
                Deposit method: <b>' . $method . '</b><br><br>
                <b><u>Wallet details:</u></b><br>
                Amount credited: <b>' . getCurrency() .' ' . number_format($transaction->amount, 2) . '</b><br>
                Wallet balance: <b>' . getCurrency() .' ' . number_format($transaction->user->wallet['balance'], 2) . '</b><br>';
        $transaction->user->notify(new CustomNotification('deposit', 'Deposit Successful', $msg, $description));
    }

    public static function sendWithdrawalCancelledNotification($transaction)
    {
        $description = 'Your queued withdrawal of <b>' . getCurrency() .' ' . number_format($transaction['amount'], 2) . '</b> has been declined.';
        $msg = 'Your queued withdrawal of <b>' . getCurrency() .' ' . number_format($transaction['amount'], 2) . '</b> has been declined.<br>
                Your wallet has been refunded, contact administrator <a href="mailto:' . env('SUPPORT_EMAIL') . '">' . env('SUPPORT_EMAIL') . '</a> for further complaints.';
        $transaction->user->notify(new CustomNotification('cancelled', 'Withdrawal Declined', $msg, $description));
    }

    public static function sendInvestmentCancelledNotification($investment)
    {
        $description = 'Your queued investment of <b>' . getCurrency() .' ' . number_format($investment->amount, 2) . '</b> in our <b>' . $investment->package["name"] . '</b> package has been cancelled.';
        $msg = 'Your queued investment of <b>' . getCurrency() .' ' . number_format($investment->amount, 2) . '</b> in our <b>' . $investment->package["name"] . '</b> package has been cancelled.<br>
                Contact administrator <a href="mailto:' . env('SUPPORT_EMAIL') . '">' . env('SUPPORT_EMAIL') . '</a> for further complaints.';
        $investment->user->notify(new CustomNotification('cancelled', 'Investment Cancelled', $msg, $description));
    }

    public static function sendInvestmentAlmostMaturedNotification($user)
    {
        $description = 'This is to notify you that your investment will mature within the next thirty (30) days.<br>';
        $msg = 'This is to notify you that your investment will mature within the next thirty (30) days.<br><br>
                Remember, you have the option to request for a full withdrawal of invested sum plus returns or simply rollover your investment. You can login to your account at any time after the maturity date of your investment to process this.<br><br>
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing: border-box; margin: auto; text-align: center; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\'; position: relative;">
                <tr>
                <td style="box-sizing: border-box; margin: auto; text-align: center; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\'; position: relative;">
                <a href="' . route('login') . '" class="button button-primary" target="_blank" rel="noopener" style="box-sizing: border-box; margin: auto; text-align: center; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\'; position: relative; -webkit-text-size-adjust: none; border-radius: 4px; color: #fff; display: inline-block; overflow: hidden; text-decoration: none; background-color: #2d3748; border-bottom: 8px solid #2d3748; border-left: 18px solid #2d3748; border-right: 18px solid #2d3748; border-top: 8px solid #2d3748;">Click here to login</a>
                </td>
                </tr>
                </table><br>
                We are available for any further enquiries or assistance. You can email us at '. env('SUPPORT_EMAIL') .'<br><br>
                Thank you for choosing us as your preferred partner in growing your wealth.<br><br>
                ';
        $user->notify(new CustomNotification('investment', 'Investment Maturity - 30days Notice', $msg, $description));
    }

    public static function sendRolloverInvestmentCreatedNotification($investment)
    {
        $transaction = $investment->transactions()->where('type', 'investment')->first();
        $description = 'Your rollover investment of <b>' . getCurrency() .' ' . number_format($investment->amount, 2) . '</b> in our <b>' . $investment->package["name"] . '</b> package was successful.';
        $msg = 'Your rollover investment of <b>' . getCurrency() .' ' . number_format($investment->amount, 2) . '</b> in our <b>' . $investment->package["name"] . '</b> package was successful.<br><br>
                <b><u>Investment details:</u></b><br>
                Investment package: <b>' . $investment->package["name"] . '</b><br>
                Total amount invested: <b>' . getCurrency() .' ' . number_format($investment->amount, 2) . '</b><br>
                CVR amount: <b>' . getCurrency() .' ' . number_format($investment->total_return - $investment->amount, 2) . '</b><br>
                Expected returns: <b>' . getCurrency() .' ' . number_format($investment->total_return, 2) . '</b><br>
                Investment duration: <b>' . $investment['return_date']->diff($investment['investment_date'])->m . ' month(s)</b><br>
                Investment date: <b>' . $investment->investment_date->format('M d, Y \a\t h:i A') . '</b><br>
                Return date: <b>' . $investment->return_date->format('M d, Y \a\t h:i A') . '</b><br>
                Investment method: <b>' . $transaction["method"] . '</b><br><br>
                <b><u>Wallet details:</u></b><br>
                Amount debited: <b>' . getCurrency() .' ' . number_format($investment->amount, 2) . '</b><br>
                Wallet balance: <b>' . getCurrency() .' ' . number_format($investment->user->wallet['balance'], 2) . '</b><br>
                ';
        $investment->user->notify(new CustomNotification('investment', 'Rollover Investment Created', $msg, $description));
    }

    public static function sendInvestmentSettledNotification($investment)
    {
        $description = 'Your investment of <b>' . getCurrency() .' ' . number_format($investment->amount, 2) . '</b> in our <b>' . $investment->package["name"] . '</b> package has been settled.';
        $msg = 'Your investment of <b>' . getCurrency() .' ' . number_format($investment->amount, 2) . '</b> in our <b>' . $investment->package["name"] . '</b> package has been settled.<br><br>
                <b><u>Wallet details:</u></b><br>
                Amount credited: <b>' . getCurrency() .' ' . number_format($investment->total_return, 2) . '</b><br>
                Wallet balance: <b>' . getCurrency() .' ' . number_format($investment->user->wallet['balance'], 2) . '</b><br>
                ';
        $investment->user->notify(new CustomNotification('investment', 'Investment Settled', $msg, $description));
    }

    public static function sendInvestmentMilestoneSettledNotification($investment, $amount)
    {
        $description = 'A milestone from your investment of <b>' . getCurrency() .' ' . number_format($investment->amount, 2) . '</b> in our <b>' . $investment->package["name"] . '</b> package has been paid to your wallet.';
        $msg = 'A milestone from your investment of <b>' . getCurrency() .' ' . number_format($investment->amount, 2) . '</b> in our <b>' . $investment->package["name"] . '</b> package has been paid to your wallet.<br><br>
                <b><u>Wallet details:</u></b><br>
                Amount credited: <b>' . getCurrency() .' ' . number_format($amount, 2) . '</b><br>
                Wallet balance: <b>' . getCurrency() .' ' . number_format($investment->user->wallet['balance'], 2) . '</b><br>
                ';
        $investment->user->notify(new CustomNotification('investment', 'Investment Milestone Payment', $msg, $description));
    }

    public static function sendReferralTransactionNotification($transaction)
    {
        $description = 'You have just received <b>$' . number_format($transaction->amount, 2) . '</b> bonus for a referral.';
        $transaction->user->notify(new CustomNotification('referral', 'Referral Bonus', $description, $description));
    }

    public static function sendContactUsNotification($info)
    {
        $description = 'You have a contact us message';
        $msg =  'Name: <b>' . $info['name'] . '</b><br>
                 Email: <b>' . $info['email'] . '</b><br>
                 Message: <b>' . $info['message'] . '</b><br>';
                 Notification::route('mail', 'quebecfoodprocessingparksng@gmail.com')
                 ->notify(new CustomNotificationByStaticEmail('Contact Us Message', $msg, $description));
    }
}
