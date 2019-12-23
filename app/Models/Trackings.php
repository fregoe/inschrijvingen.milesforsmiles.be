<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trackings extends Model
{
    public function relTeam()
    {
        return $this->hasOne(\App\Models\Teams::class,'id','team_id');
    }
}
