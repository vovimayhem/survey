<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SurveyReminder extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $result;
    protected $customMessage;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name, $result, $customMessage)
    {
        $this->name    = $name;
        $this->result  = $result;
        $this->customMessage = $customMessage;
    }
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.survey_reminder')->subject('Community Tax Survey')->with(
            [
                'name'          => $this->name,
                'customMessage' => $this->customMessage,
                'url'           => $this->result->url
            ]);
    }
}