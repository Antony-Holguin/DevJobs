<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicantNotification extends Notification
{
    use Queueable;

    public $jobOpening_id;
    public $jobOpening_name;
    public $user_id;
    public function __construct($jobOpening_id, $jobOpening_name, $user_id)
    {
        $this->jobOpening_id = $jobOpening_id;
        $this->jobOpening_name = $jobOpening_name;
        $this->user_id = $user_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url('notifications');

        return (new MailMessage)
                    ->line('You received a new applicant to your Job opening')
                    ->line('For:'.$this->jobOpening_name)
                    ->action('See notification', $url)
                    ->line('Thank you for using DevJobs!');
    }

    public function toDatabase($notifiable){
        return [
            'jobOpening_id' => $this->jobOpening_id,
            'jobOpening_name' =>$this->jobOpening_name,
            'user_id' =>$this->user_id,
        ];
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
