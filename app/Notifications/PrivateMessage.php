<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PrivateMessage extends Notification
{
    use Queueable;
    protected $pm;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($pm)
    {
        $this->pm = $pm;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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

    public function toDatabase($notifiable)
    {
        return [
            "type" => "new_pm",
            "author" => $this->pm->author->username,
            "profileLink" => "/profile/{$this->pm->author->slugified_user}",
            "messageLink" => "/me/private-messages/{$this->pm->slug}",
            "message" => " sent you a message: "
        ];
    }
}
