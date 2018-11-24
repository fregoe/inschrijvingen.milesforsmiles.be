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
}
