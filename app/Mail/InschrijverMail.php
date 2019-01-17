<?php

namespace App\Mail;

use App\Models\Deelnemers;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InschrijverMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $inschrijver;
    protected $deelnemers;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $inschrijver, $deelnemers)
    {
        $this->inschrijver  = $inschrijver;
        $this->deelnemers   = $deelnemers;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.inschrijver_mail',['inschrijver' => $this->inschrijver, 'deelnemers' => $this->deelnemers])
            ->from(config('constants.from_mail'))
            ->subject(config('constants.from_subject_inschrijver'));
    }
}
