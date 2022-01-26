<?php

namespace App\Http\Controllers;

use App\Notifications\CustomNotificationByEmail;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // Welcome Email.
    public static function sendWelcomeEmailNotification($user)
    {
        $msg = 'Welcome to '.env('APP_NAME').'.<br>
                Your profile has been completed successfully and your account is active.<br>
                You can proceed to invest in our awesome investments plans.';
        $user->notify(new CustomNotificationByEmail('Welcome to '.env('APP_NAME'), $msg, 'Login to Dashboard', route('login')));
    }
}
