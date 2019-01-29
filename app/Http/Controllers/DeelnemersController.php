<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

use App\Models\Deelnemers;

use App\Traits\traitSession;
use App\Traits\traitViews;
use App\Traits\traitVouchers;

class DeelnemersController extends Controller
{
    use traitSession;
    use traitViews;
    use traitVouchers;

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check for session
        $this->checkSession();

        //Get the order
        $arr_order = Orders::where('uuid',session('ss_order_id'))->first();

        // Validate the request
        $validator = Validator::make(Input::all(), [
            'naam'      => 'required',
            'voornaam'  => 'required',
            'email'     => 'required|email'
        ]);

        if($validator->fails()) {
            return view('front.inc.tbl_inschrijvingen',$this->getInschrijvingsData(Input::all()))->withErrors($validator)->render();
        }

        // Check for valid voucher
        if(isset($request->voucher) && $this->checkVoucherUsed($request->voucher)) {
            return view('front.inc.tbl_inschrijvingen',$this->getInschrijvingsData(Input::all(),true))->withErrors($validator)->render();
        }

        $arr_deelnemer                  = new Deelnemers();
        $arr_deelnemer->naam            = $request->naam;
        $arr_deelnemer->voornaam        = $request->voornaam;
        $arr_deelnemer->email           = $request->email;
        $arr_deelnemer->order_uuid      = session('ss_order_id');
        $arr_deelnemer->referentienr    = substr(md5(Carbon::now().$request->naam.$request->voornaam),0,8);
        $arr_deelnemer->save();

        // Assign voucher if set
        if(isset($request->voucher) && !$this->checkVoucherUsed($request->voucher)) {
            $arr_deelnemer->voucher_id = $this->assignVoucher($request->voucher,$arr_deelnemer->id);
            $arr_deelnemer->save();

            $arr_order->totaal += (config('constants.price') - $arr_deelnemer->relVoucher->waarde);
            $arr_order->save();
        }
        else {
            $arr_order->totaal += config('constants.price');
            $arr_order->save();
        }

        return view('front.inc.tbl_inschrijvingen',$this->getInschrijvingsData())->withErrors($validator)->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $arr_deelnemer = Deelnemers::where('referentienr',$request->referentie)->first();

        return view('front.mijn-account.inschrijvingen.edit',['arr_deelnemer' => $arr_deelnemer]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editFront(Request $request)
    {
        $arr_deelnemer = Deelnemers::where('referentienr',$request->referentie)->first();

        return view('front.inc.tbl_inschrijvingen',$this->getInschrijvingsData(null,null,true,$arr_deelnemer->referentienr));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Deelnemers  $deelnemers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $arr_deelnemer              = Deelnemers::where('referentienr',$request->referentie)->first();
        $arr_deelnemer->naam        = $request->naam;
        $arr_deelnemer->voornaam    = $request->voornaam;
        $arr_deelnemer->save();

        return redirect(route('mijn-account.inschrijvingen'));
    }

    /**
     * @param Request $request
     * @return string
     * @throws \Throwable
     */
    public function updateFront(Request $request)
    {
        $arr_deelnemer              = Deelnemers::where('referentienr',$request->referentie)->first();
        $arr_deelnemer->naam        = $request->naam;
        $arr_deelnemer->voornaam    = $request->voornaam;
        $arr_deelnemer->email       = $request->email;
        $arr_deelnemer->save();

        return view('front.inc.tbl_inschrijvingen',$this->getInschrijvingsData(false,false,false))->render();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //Get the order and deelnemer
        $arr_order      = Orders::where('uuid',session('ss_order_id'))->first();
        $arr_deelnemer  = Deelnemers::where('referentienr',$request->referentie)->first();

        // Unlink voucher if one was linked
        if($arr_deelnemer->voucher_id !== null) {
            $arr_order->totaal -= (config('constants.price') - $arr_deelnemer->relVoucher->waarde);
            $arr_order->save();
            $this->unlinkVoucher($arr_deelnemer->id);
        }
        // Update the order price
        else {
            $arr_order->totaal -= config('constants.price');
            $arr_order->save();
        }

        // Delete the deelnemer
        $arr_deelnemer->delete();

        return view('front.inc.tbl_inschrijvingen',$this->getInschrijvingsData())->render();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showInschrijvingen()
    {
        $user = Auth::user();

        return view('front.mijn-account.inschrijvingen.index',['user' => $user]);
    }
}
