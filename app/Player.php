<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user', 'server', 'updated', 'online'
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user');
    }

    public function server()
    {
        return $this->belongsTo('App\Server', 'id', 'server');
    }
}
