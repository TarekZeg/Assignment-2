<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    public $timestamps = false;

    public function league()
    {
        return $this->belongsTo(League::class, 'futsal_standings_id'); 

    }

    public function getContributionsAttribute (){
        return ($this->player_goals) + ($this->player_assists);
    }

}
