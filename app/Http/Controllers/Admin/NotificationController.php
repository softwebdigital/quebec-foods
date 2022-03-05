<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Notifications\CustomNotificationByEmail;
use App\Notifications\CustomNotificationByStaticEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    public static function sendAdminRegistrationEmailNotification($admin, $password)
    {
        $msg = 'Welcome to '.env('APP_NAME').'.<br>
                An administrator account with role of <b>'.$admin->roles()->first()['name'].'</b> has been created for you, find your login credentials below.<br><br>
                Email: <b>'.$admin['email'].'</b><br>
                Password: <b>'.$password.'</b><br>';
        $admin->notify(new CustomNotificationByEmail('Administrator Welcome', $msg, 'Login to Dashboard', route('admin.login')));
    }

    public static function sendPendingTransactionNotificationOnScheduleToAdmin($transactions)
    {
        if ($transactions > 1){
            $msg = 'There are <b>'.$transactions.'</b> pending transactions awaiting administrator action.<br>
                Kindly attend to these transaction as soon as possible<br>';
            $title = $transactions.' Pending Transactions';
        }else{
            $msg = 'There is <b>'.$transactions.'</b> pending transaction awaiting administrator action.<br>
                Kindly attend to these transaction as soon as possible<br>';
            $title = $transactions.' Pending Transaction';
        }
        Notification::route('mail', env('ADMIN_EMAIL'))->notify(new CustomNotificationByStaticEmail($title, $msg, 'View Transactions', route('admin.transactions')));
    }
}

