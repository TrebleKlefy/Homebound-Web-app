<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUser extends Notification
{
    use Queueable;
    private $data;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // return (new MailMessage)->markdown('mail.new.user');
        return (new MailMessage)
        ->greeting($this->data['greeting'])
        ->line($this->data['body'])
        ->action($this->data['actionText'], $this->data['actionURL'])
        ->line($this->data['thanks']);
    }
    public function toDatabase($notifiable)
    {
        return [
            
            'thanks' => $this->data['eamil'],
            'body' => $this->data['body'],
            'greeting'=> $this->data['greeting'],
            
        ];
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
            //
        ];
    }
}
