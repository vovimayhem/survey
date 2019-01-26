<?php

namespace App\Mail;

use App\Models\Result;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SurveyCompleted extends Mailable
{
     use Queueable, SerializesModels;

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
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.survey_alert')
        ->with(['case_number' => $this->result->case_number,]);
    }
}
