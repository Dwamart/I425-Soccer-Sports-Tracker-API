<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'Player';

    protected $primaryKey = 'PlayerID';

    public $timestamps = false;

    public function teams()
    {
        return $this->belongsToMany(
            Team::class,
            'PlayerTeam',
            'PlayerID',
            'TeamID'
        );
    }
}