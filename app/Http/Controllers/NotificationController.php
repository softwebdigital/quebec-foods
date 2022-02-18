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
                Wallet balance: <b>₦ '.number_format($investment->user->nairaWallet['balance'], 2).'</b><br>
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
}
