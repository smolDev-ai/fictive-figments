<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ThreadReply extends Notification
{
    use Queueable;
    protected $post;
    protected $thread;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($thread, $post)
    {
        $this->thread = $thread;
        $this->post = $post;
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

        ];
    }

    public function toDatabase($notifiable)
    {
        return [
            'type' => 'new_post',
            'reply' => $this->post->id,
            'author' => $this->post->author,
            'threadLink' => "/forum/{$this->thread->forum}/{$this->thread->slug}/{$this->thread->type}",
            'replyLink' => "/forum/{$this->thread->forum}/{$this->thread->slug}/{$this->thread->type}#{$this->post->id}/",
            'message' => $this->post->author . " replied to " . $this->thread->title


        ];
    }
}
