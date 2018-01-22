<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match_summ extends Model
{
    const CREATED_AT = 'created';

    protected $fillable = [
        'port', 'created_at', 'map', 'server_id'
    ];

    function server(){
        $this->belongsTo('App\Server', 'server_id', 'id');
    }
}
