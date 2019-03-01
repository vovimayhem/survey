<?php

namespace App\Notifications;

use App\Models\Result;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\URL;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class BadCustomerReview extends Notification
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
        $url = URL::to('/') . '/admin/surveys/' . $this->result->id;
        
        return (new MailMessage)->view('emails.bad_review', [
            'case_number' => $this->result->case_number,
            'url' => $url,
        ]);
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