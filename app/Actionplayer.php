<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actionplayer extends Model
{
    public $timestamps = false;

    protected $table = 'actionplayers';

    protected $fillable = [
        'account_id', 'match_id', 'team_id', 'exp', 'kills', 'deaths', 'assists', 'souls', 'razed', 'pdmg', 'bdmg',
            'npc', 'hp_healed', 'res', 'gold', 'hp_repaired', 'secs', 'ip'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'account_id', 'id');
    }

    public function match()
    {
        return $this->hasOne('App\Match', 'id', 'match_id');
    }
}
