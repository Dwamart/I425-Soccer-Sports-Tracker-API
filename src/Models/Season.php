<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $table = 'Season';

    protected $primaryKey = 'SeasonID';

    public $timestamps = false;

    public function league()
    {
        return $this->belongsTo(
            League::class,
            'LeagueID',
            'LeagueID'
        );
    }
}