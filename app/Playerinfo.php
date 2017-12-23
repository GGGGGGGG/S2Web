<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playerinfo extends Model
{
    protected $fillable = [
        'account_id', 'overall_r', 'sf', 'lf', 'level', 'clan_id', 'karma'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'account_id');
    }

    public function clan(){
        return $this->hasOne('App\Clan', 'id', 'clan_id');
    }
}
