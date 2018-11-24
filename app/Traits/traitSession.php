<?php

namespace App\Traits;

use Illuminate\Support\Str;

use App\Models\Orders;

trait traitSession
{
    /**
     * Check if session exists, if not, it will create a new order and session
     */
    public function checkSession()
    {
        if(session('ss_order_id')){
            $arr_order = Orders::where('uuid',session('ss_order_id'))->first();
        }
        else {
            $arr_order = new Orders();
            $arr_order->uuid    = (string) Str::uuid();
            $arr_order->save();

            session(['ss_order_id' => $arr_order->uuid]);
        }
    }
}
