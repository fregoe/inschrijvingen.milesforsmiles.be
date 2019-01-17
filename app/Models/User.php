<?php

namespace App\Models;

use App\Mail\UserWelcomeMail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function relDeelnemers()
    {
        return $this->hasMany(\App\Models\Deelnemers::class,'user_id','id');
    }

    public function relTeams()
    {
        return $this->hasMany(\App\Models\Teams::class,'user_id','id');
    }

    public function sendWelcomeEmail()
    {
        // Generate a new reset password token and URL
        $token  = app('auth.password.broker')->createToken($this);
        $url    = route('password.reset')."?token=".$token;

        // Send email
        Mail::to($this->email)
            ->send(new UserWelcomeMail($this,$url));
    }

    public function getBetaaldeDeelnemers()
    {
        $col_deelnemers = $this->relDeelnemers;

        $col_paidDeelnemers = collect(new Deelnemers);

        foreach($col_deelnemers as $deelnemer) {
            if($deelnemer->relOrder->betaal_status == 'paid' || $deelnemer->voucher_id !== null) {
                $col_paidDeelnemers->push($deelnemer);
            }
        }

        return $col_paidDeelnemers;
    }
}
