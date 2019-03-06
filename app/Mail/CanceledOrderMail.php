<?php

namespace App\Mail;

use App\Models\Deelnemers;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CanceledOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $deelnemer;
    protected $inschrijver;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Deelnemers $deelnemer, User $inschrijver)
    {
        $this->deelnemer    = $deelnemer;
        $this->inschrijver  = $inschrijver;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.inschrijver_canceled_order_mail',['deelnemer' => $this->deelnemer])
            ->from(config('constants.from_mail'))
            ->subject(config('constants.from_subject_canceledorder'));
    }
}
