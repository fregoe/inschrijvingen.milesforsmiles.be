<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    public function relDeelnemers()
    {
        return $this->hasMany(\App\Models\Deelnemers::class,'team_id','id');
    }
}
