<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\HtmlString;
use File;

class CustomNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $title;
    public $body;
    public $description;
    public $file;
    public $icon;

    public function __construct($type, $title, $body, $description, $file = null)
    {
        $this->title = $title;
        $this->body = $body;
        $this->description = $description;
        $this->file = base64_encode($file);
        // $this->icon = base64_encode($icon);
        switch ($type) {
            case 'deposit':
                $this->icon = '<div class="icon icon-sm"><i data-feather="corner-right-down"></i></div>';
                break;
            case 'withdrawal':
                $this->icon = '<div class="icon icon-sm"><i data-feather="corner-down-left"></i></div>';
                break;
            case 'investment':
                $this->icon = '<div class="icon icon-sm"><i data-feather="layers"></i></div>';
                break;
            case 'trade':
                $this->icon = '<div class="icon icon-sm"><i data-feather="trending-up"></i></div>';
                break;
            case 'referral':
                $this->icon = '<div class="icon icon-sm"><i data-feather="users"></i></div>';
                break;
            case 'success':
                $this->icon = '<div class="icon icon-sm"><i data-feather="check-circle"></i></div>';
                break;
            case 'pending':
                $this->icon = '<div class="icon icon-sm"><i data-feather="alert-circle"></i></div>';
                break;
            case 'cancelled':
                $this->icon = '<div class="icon icon-sm"><i data-feather="x-circle"></i></div>';
                break;
            case 'default':
                $this->icon = '<div class="icon icon-sm"><i data-feather="bell"></i></div>';
                break;
        }
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        
        if ($this->file) {
            return (new MailMessage)
                ->subject($this->title)
                ->greeting('skip default')
                ->line('Hello '.$notifiable->name.',')
                ->line(new HtmlString($this->body))
                ->attachData(base64_decode($this->file), 'certificate.pdf');
        }
        return (new MailMessage)
            ->subject($this->title)
            ->greeting('skip default')
            ->line('Hello '.$notifiable->name.',')
            ->line(new HtmlString($this->body));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'title' => $this->title,
            'body' => $this->body,
            'icon' => $this->icon,
            'description' => $this->description,
        ];
    }
}
