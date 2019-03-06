<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Traits\traitMails;

use App\Models\Orders;

class PendingOrdersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    use traitMails;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //Get all the "Pending" orders
        $arr_orders = Orders::where(function ($q) {
                $q->where('betaal_status',null);
                $q->orWhere('betaal_status','Open');
            })
            ->get();

        foreach($arr_orders as $order) {
            //Set the order on canceled
            $order->betaal_status = 'Canceled';
            $order->save();

            //Get the related participants
            if(count($order->relDeelnemers) >0) {
                foreach($order->relDeelnemers as $deelnemer) {
                    //Send the mail to the participant
                    $this->sendCanceledOrderMail($order);

                    //If voucher is used, unlink them
                    if(isset($deelnemer->relVoucher)) {
                        $deelnemer->voucher_id = null;
                        $deelnemer->save();
                        $voucher = $deelnemer->relVoucher;
                        $voucher->gebruikt = 'N';
                        $voucher->deelnemer_id = null;
                        $voucher->save();
                    }
                }
            }
        }
    }
}
