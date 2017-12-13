<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = [
        'server', 'servername', 'winner', 'duration', 'map'
    ];

    public function server()
    {
        return $this->hasOne('App\Server', 'id', 'server');
    }

    public function maps()
    {
        return $this->hasOne('App\Map', 'id', 'map');
    }
}
