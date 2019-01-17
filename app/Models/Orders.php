<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public function relDeelnemers()
    {
        return $this->hasMany(\App\Models\Deelnemers::class,'order_uuid','uuid');
    }

    public function relUser()
    {
        return $this->hasOne(\App\Models\User::class, 'id','user_id');
    }
}
