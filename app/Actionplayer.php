<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actionplayer extends Model
{
    public $timestamps = false;

    protected $table = 'actionplayers';

    protected $fillable = [
        'user', 'match', 'team', 'exp', 'kills', 'deaths', 'assists', 'souls', 'razed', 'pdmg', 'bdmg', 'npc', 'hp_healed', 'res', 'gold', 'hp_repaired', 'secs', 'ip'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user', 'id');
    }

    public function matches()
    {
        return $this->hasOne('App\Match', 'id', 'match');
    }
}
