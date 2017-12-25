<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'account_id', 'banneduntil'
    ];

    public function user(){
        return $this->hasOne('App\User', 'id', 'account_id');
    }
}
