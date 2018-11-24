<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserWelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $passwordLink;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $passwordLink)
    {
        $this->user         = $user;
        $this->passwordLink = $passwordLink;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.user_welcome_mail',['user' => $this->user, 'passwordLink' => $this->passwordLink])
            ->from(config('constants.from_mail'))
            ->subject('Welkom bij Miles for Smiles');
    }
}
