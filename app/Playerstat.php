<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playerstat extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'account_id', 'exp', 'earned_exp', 'wins', 'losses', 'd_conns', 'kills', 'assists', 'souls', 'razed', 'pdmg',
        'bdmg', 'npc', 'hp_healed', 'res', 'gold', 'hp_repaired', 'secs', 'total_secs', 'malphas', 'revenant', 'devourer'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'account_id', 'id');
    }

    public function hf()
    {
        return $this->hp_healed/($this->secs/60);
    }

    public function rf()
    {
        return $this->hp_repaired/($this->secs/60);
    }

    public function kf()
    {
        return $this->kills/($this->secs/60);
    }

    public function af()
    {
        return $this->assists/($this->secs/60);
    }

    public function bf()
    {
        return $this->bdmg/($this->secs/60);
    }
}
