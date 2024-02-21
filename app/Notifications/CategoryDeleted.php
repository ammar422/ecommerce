<?php

namespace App\Notifications;

use App\Models\MainCategorie;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CategoryDeleted extends Notification
{
    use Queueable;
    protected $category;
    /**
     * Create a new notification instance.
     */
    public function __construct(MainCategorie $category)
    {
        $this->category = $category;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $subject = sprintf("Oops .... the main category has been deleted", config('app.name'));
        $greeting = sprintf("welcome ", $notifiable->name);

        return (new MailMessage)
            ->subject($subject)
            ->greeting($greeting)
            ->salutation("ecommerce admins")
            ->line('thw main category has been deleted.')
            ->action('report an issue ', url('/'))
            ->line('Thank you for using our application!');

        
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
