<?php

namespace App\Mail;

use App\Models\Deelnemers;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NoTeamMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $deelnemer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Deelnemers $deelnemer)
    {
        $this->deelnemer    = $deelnemer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.deelnemer_no_team_mail',['deelnemer' => $this->deelnemer])
            ->from(config('constants.from_mail'))
            ->subject(config('constants.from_subject_noteam'));
    }
}
