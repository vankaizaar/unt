<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendEntryEmail extends Notification implements ShouldQueue {

    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct() {
        
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable) {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable) {
        $message = new MailMessage();
        $message->subject(trans('emails.entrySubject'))
                ->greeting(trans('emails.entryGreeting', ['username' => \Auth::User()->name]))
                ->line(trans('emails.entryMessage'))
                ->action(trans('emails.entryButton'), route('audio.index'))
                ->line(trans('emails.entryThanks'));

        return $message;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function toArray($notifiable) {
        return [
                //
        ];
    }

}
