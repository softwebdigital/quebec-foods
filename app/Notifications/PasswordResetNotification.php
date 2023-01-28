<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class PasswordResetNotification extends Notification
{
    use Queueable;

    private string $otp;

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
            ->subject('Reset Password')
            ->line('You are receiving this email because we received a password reset request for your account.')
            ->line('Please use the otp below to reset your password.')
            ->line(new HtmlString('<h2>'.$this->otp.'</h2>'))
            ->line('This password reset otp will expire in 10 minutes.')
            ->line('If you did not request a password reset, no further action is required.');
    }
}
