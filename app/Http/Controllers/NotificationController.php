<?php

namespace App\Http\Controllers;

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
}
