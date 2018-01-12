<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commanderstat extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'account_id',  'c_wins', 'c_losses', 'c_d_conns', 'c_exp', 'c_earned_exp', 'c_builds', 'c_gold', 'c_razed',
        'c_hp_healed', 'c_pdmg', 'c_kills', 'c_assists', 'c_debuffs', 'c_buffs', 'c_orders', 'c_secs', 'c_winstreak'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'account_id');
    }
}
