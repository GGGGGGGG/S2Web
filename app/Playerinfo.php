<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playerinfo extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'account_id', 'overall_r', 'sf', 'lf', 'level', 'clan_id', 'karma', 'ap'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'account_id', 'id');
    }

    public function clan(){
        return $this->hasOne('App\Clan', 'id', 'clan_id');
    }
}
