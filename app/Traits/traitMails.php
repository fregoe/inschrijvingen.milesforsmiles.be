<?php

namespace App\Traits;

use App\Models\Deelnemers;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

use App\Mail\CanceledOrderMail;
use App\Mail\DeelnemerMail;
use App\Mail\InschrijverMail;
use App\Mail\InformatieMail;
use App\Mail\NoTeamMail;

trait traitMails
{
    /**
     * @param $arr_order
     */
    public function sendDeelnemerMails($arr_order)
    {
        $arr_deelnemers = $arr_order->relDeelnemers;

        foreach ($arr_deelnemers as $deelnemer) {
            Mail::to($deelnemer->email)
                ->send(new DeelnemerMail($deelnemer));
        }
    }

    /**
     * @param $arr_order
     */
    public function sendInschrijverMails($arr_order)
    {
        $deelnemers     = $arr_order->relDeelnemers;
        $inschrijver    = $arr_order->relUser;

        Mail::to($inschrijver->email)
            ->send(new InschrijverMail($inschrijver,$deelnemers));
    }

    /**
     * @param $arr_order
     */
    public function sendCanceledOrderMail($arr_order)
    {
        $deelnemers     = $arr_order->relDeelnemers;
        $inschrijver    = $arr_order->relUser;

        foreach($deelnemers as $deelnemer) {
            Mail::to($deelnemer->email)
                ->send(new CanceledOrderMail($inschrijver,$deelnemer));
        }
    }

    /**
     * @param Deelnemers $deelnemer
     */
    public function sendNoTeamMail(Deelnemers $deelnemer)
    {
        try {
            Mail::to($deelnemer->email)
                ->send(new NoTeamMail($deelnemer));
        }
        catch (Exception $e) {
            Log::error($e);
        }

    }

    /**
     * @param Deelnemers $deelnemer
     */
    public function sendInfoMail(Deelnemers $deelnemer)
    {
        try {
            Mail::to($deelnemer->email)
                ->send(new InformatieMail($deelnemer));
        }
        catch (Exception $e) {
            Log::error($e);
        }

    }
}
