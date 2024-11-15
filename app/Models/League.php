<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    protected $table = 'futsal_standings'; 
    public $timestamps = false;

    public function getPointsAttribute()
    {
        return ($this->wins * 3) + ($this->draws * 1);
    }

    public function getGoalDifAttribute()
    {
        return ($this->goals_scored) - ($this->goals_conceded);
    }


}
