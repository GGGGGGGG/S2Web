<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    const UPDATED_AT = 'updated';

    protected $fillable = [
        'ip', 'port', 'num_conn', 'max_conn', 'name', 'login', 'description', 'minlevel', 'maxlevel', 'official', 'online'
    ];

    public function players(){
        return $this->hasMany('App\Player', 'server', 'id');
    }
}
