<?php

namespace App\Http\Controllers;

use App\Mail\InformatieMail;
use App\Mail\NoTeamMail;
use App\Models\Trackings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Models\Deelnemers;
use App\Models\Orders;
use App\Models\User;

use App\Traits\traitViews;
use App\Traits\traitPayment;
use App\Traits\traitMails;

class InschrijvingsController extends Controller
{
    use traitViews;
    use traitPayment;
    use traitMails;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showInschrijving()
    {
        return view ('front.inschrijvingen',$this->getInschrijvingsData());
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showBedankt(Request $request)
    {
        $arr_order = Orders::where('uuid',session('ss_order_id'))->first();

        if(isset($arr_order) && ($arr_order->betaal_status == 'Open' || $arr_order->betaal_status == 'Canceled')) {
            return redirect(route('index'));
        }
        else {
            session()->forget('ss_order_id');
            return view('front.bedankt');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function submitInschrijving(Request $request)
    {
        //Check if administratieve user already exists
        $validator = Validator::make($request->all(),[
            'email_administratief' => 'email'
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        //Check if there are deelnemers
        if(session('ss_order_id')) {
            $arr_deelnemers = Deelnemers::where('order_uuid',session('ss_order_id'))->get();
            if(count($arr_deelnemers) == 0) {
                return redirect()->back()->with('status','no_deelnemers');
            }
        }
        else {
            return redirect()->back()->with('status','no_deelnemers');
        }

        //Check if user exists
        $user = User::where('email',$request->email_administratief)->first();

        //Create user if it doesn't exists
        if(!isset($user)){
            $user           = new User();
            $user->email    = $request->email_administratief;
            $user->save();
            $user->sendWelcomeEmail();
        }

        //Assign deelnemers to user
        Deelnemers::where('order_uuid',session('ss_order_id'))->update(['user_id' => $user->id]);

        //Assign order to user
        $arr_order                  = Orders::where('uuid',session('ss_order_id'))->first();
        $arr_order->user_id         = $user->id;
        $arr_order->betaal_status  = 'Open';
        $arr_order->save();

        //Create payment if the amount is more then 0
        if($arr_order->totaal > 0) {
            $payment = $this->doPayment($arr_order);

            //Save payment id in order
            $arr_order->betaal_referentie = $payment->id;
            $arr_order->save();

            // Redirect to payment page
            return redirect($payment->getCheckoutUrl(), 303);
        }
        //Else redirect to order success page
        else {
            //Set order as paid
            $arr_order->betaal_status = 'paid';
            $arr_order->save();

            $this->sendDeelnemerMails($arr_order);
            $this->sendInschrijverMails($arr_order);
            return redirect(route('order.success'));
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function mijnAccountIndex()
    {
        return view('front.mijn-account.index');
    }

    public function test()
    {
        $trackings = Trackings::get();

        foreach($trackings as $tracking) {
            if(isset($tracking->relTeam) && count($tracking->relTeam->relDeelnemers)>0) {
                foreach($tracking->relTeam->relDeelnemers as $deelnemer) {

                    $this->sendInfoMail($deelnemer);
                }
            }
        }
    }
}
