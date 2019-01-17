<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deelnemers extends Model
{
    public function relTeam()
    {
        return $this->hasOne(\App\Models\Teams::class,'id','team_id');
    }

    public function relVoucher()
    {
        return $this->hasOne(\App\Models\Vouchers::class,'id','voucher_id');
    }

    public function relOrder()
    {
        return $this->hasOne(\App\Models\Orders::class,'uuid','order_uuid');
    }

    public function relUser()
    {
        return $this->hasOne(\App\Models\User::class,'id','user_id');
    }

    public function hasPaid()
    {
        if ($this->voucher_id == null && $this->relOrder->betaal_status !== 'paid') {
            return false;
        }
        else{
            return true;
        }
    }
}
