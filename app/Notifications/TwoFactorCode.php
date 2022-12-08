<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class TwoFactorCode extends Notification
{
    use Queueable;
    protected bool $api;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(bool $api = false)
    {
        $this->api = $api;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail(mixed $notifiable)
    {
        if ($this->api)
            return (new MailMessage)
                ->line('Please use the otp below to complete your login.')
                ->line(new HtmlString('<h2>'.$notifiable->two_factor_code.'</h2>'))
                ->line('The code will expire in 10 minutes')
                ->line('If you have not tried to login, ignore this message.');
        return (new MailMessage)
            ->line('Your two factor code is '.$notifiable->two_factor_code)
            ->action('Verify Here', route('verify.index'))
            ->line('The code will expire in 10 minutes')
            ->line('If you have not tried to login, ignore this message.');
    }
}
