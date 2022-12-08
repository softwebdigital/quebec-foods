<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class EmailVerificationNotification extends Notification
{
    use Queueable;

    private string $otp;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $otp)
    {
        $this->otp = $otp;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via(mixed $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage
     */
    public function toMail(mixed $notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting('Hello '.explode(' ', $notifiable['name'])[0].'!')
            ->subject('Verify Email Address')
            ->line('Please use the otp below to verify your email address.')
            ->line(new HtmlString('<h2>'.$this->otp.'</h2>'))
            ->line('This email verification otp will expire in 10 minutes.');
    }
}
