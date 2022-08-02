<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CustomNotificationByStaticEmail;

class ContactUsController extends Controller
{
    public function sendMail(Request $request)
    {
        $info = [ 
            'name' => $request->first_name." ".$request->last_name,
            'email' => $request->email,
            'message' => $request->message
        ];

        $description = 'You have a contact us message';
        $msg =  'Name: <b>' . $info['name'] . '</b><br>
                 email: <b>' . $info['email'] . '</b><br>
                 Message: <b>' . $info['message'] . '</b><br>';
        
        NotificationController::sendContactUsNotification($info);
        return back();
    }
}
