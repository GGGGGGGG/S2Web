<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    const UPDATED_AT = 'updated';

    protected $fillable = [
        'ip', 'port', 'num_conn', 'max_conn', 'name', 'description', 'minlevel', 'maxlevel', 'official', 'online'
    ];
}
