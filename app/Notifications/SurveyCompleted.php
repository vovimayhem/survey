<?php

namespace App\Notifications;

use App\Models\Result;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SurveyCompleted extends Notification
{
    use Queueable;

    /**
     * The order instance.
     *
     * @var Order
     */
    protected $result;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Result $result)
    {
        $this->result = $result;
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
    public function toMail($notifiable)
    {
        $url = url('admin/result/show/' . $this->result->id);

        return (new MailMessage)
        ->greeting('Hello, there!')
        ->line('We detect that a survey has been successfully completed. To visualize the results please click on the below button.')
        ->line('Case #: ' . $this->result->case_number)
        ->action('View Results', $url)
        ->line('Thank you for using our Community Tax Survey application!');
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