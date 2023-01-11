<?php

namespace App\Traits;

use Mollie\Laravel\Facades\Mollie;

use App\Models\Orders;

trait traitPayment
{
    /**
     * @param Orders $order
     * @return mixed
     */
    public function doPayment(Orders $order)
    {
        $payment = Mollie::api()->payments()->create([
            'amount' => [
                'currency' => 'EUR',
                'value' => number_format($order->totaal,2,'.','')
            ],
            'description' => 'Inschrijving Miles for Smiles 2023',
            'webhookUrl' => route('webhooks.mollie'),
            'redirectUrl' => route('order.success'),
        ]);

        $payment = Mollie::api()->payments()->get($payment->id);

        return $payment;
    }
}
