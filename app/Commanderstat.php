<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commanderstat extends Model
{
    protected $fillable = [
        'account_id', 'exp', 'earned_exp', 'wins', 'losses', 'd_conns', 'kills', 'assists', 'souls', 'razed', 'pdmg',
        'bdmg', 'npc', 'hp_healed', 'res', 'gold', 'hp_repaired', 'secs', 'total_secs', 'malphas', 'revenant', 'devourer'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'account_id');
    }
}
