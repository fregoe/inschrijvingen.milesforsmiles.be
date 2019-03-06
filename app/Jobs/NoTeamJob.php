<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Traits\traitMails;

use App\Models\Orders;

class NoTeamJob implements ShouldQueue
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
        $arr_orders = Orders::where('betaal_status','paid')->get();

        foreach($arr_orders as $order) {
            if(count($order->relDeelnemers)>0) {
                foreach($order->relDeelnemers as $deelnemer) {
                    if($deelnemer->team_id == null) {
                        $this->sendNoTeamMail($deelnemer);
                    }
                }
            }
        }
    }
}
