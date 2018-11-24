<?php

namespace App\Http\Controllers;

use Mollie\Laravel\Facades\Mollie;
use Illuminate\Support\Facades\Request;

use App\Models\Orders;

class PaymentController extends Controller
{
    /**
     * @param Request $request
     */
    public function mollieWebhook(Request $request)
    {
        $payment = Mollie::api()->payments()->get($_POST["id"]);

        if($payment->isPaid()) {
            $arr_order                  = Orders::where('betaal_referentie',$payment->id)->first();
            $arr_order->betaal_status   = $payment->status;
            $arr_order->save();

            //Send mail
        }
    }
}
