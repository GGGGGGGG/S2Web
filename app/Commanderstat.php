<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commanderstat extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'account_id',  'wins', 'losses', 'd_conns', 'exp', 'earned_exp', 'builds', 'gold', 'razed',
        'hp_healed', 'pdmg', 'kills', 'assists', 'debuffs', 'buffs', 'orders', 'secs', 'winstreak'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'account_id');
    }
}
