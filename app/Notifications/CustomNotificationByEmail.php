<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class CustomNotificationByEmail extends Notification
{
    use Queueable;

    private string|null $title, $message, $buttonText, $url;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($title, $message, $buttonText = null, $url = null)
    {
        $this->title = $title;
        $this->message = $message;
        $this->buttonText = $buttonText;
        $this->url = $url;
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
    public function toMail(mixed $notifiable) : MailMessage
    {
        if ($this->url) {
            return (new MailMessage)
                ->subject($this->title)
                ->greeting('skip default')
                ->line('Hello ' .$notifiable->first_name.',')
                ->line(new HtmlString($this->message))
                ->action($this->buttonText, $this->url);
        } else {
            return (new MailMessage)
                ->subject($this->title)
                ->greeting('skip default')
                ->line('Hello ' .$notifiable->first_name.',')
                ->line(new HtmlString($this->message));
        }

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray(mixed $notifiable): array
    {
        return [
            //
        ];
    }
}
