<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    protected $table = 'League';

    protected $primaryKey = 'LeagueID';

    public $timestamps = false;

    public function seasons()
    {
        return $this->hasMany(
            Season::class,
            'LeagueID',
            'LeagueID'
        );
    }
}