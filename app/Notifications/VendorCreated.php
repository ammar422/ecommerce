<?php

namespace App\Notifications;

use App\Models\Vendor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VendorCreated extends Notification
{
    use Queueable;



    public $vendor;
    /**
     * Create a new notification instance.  
     */
    public function __construct(Vendor $vendor)
    {
        $this->vendor = $vendor;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        // return ['mail','sms','database','slack'];
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $subject = sprintf("Congrats... your Market account is created successfuly ", config('app.name'), "Ammar");
        $greeting = sprintf("welcome ", $notifiable->name);
        return (new MailMessage)
            ->subject($subject)
            ->greeting($greeting)
            ->salutation("Yours Faithfully")
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     * 
     * @return array<string, mixed>
     * 
     * 
     * 
     * this function uesing only when return DATABASE in via function 
     * return the column shueld be save in database  
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
