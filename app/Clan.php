<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clan extends Model
{
    protected $fillable = [
        'clan_name', 'clan_tag', 'clan_img'
    ];

    public function playerinfo(){
        return $this->hasMany('App\Playerinfo', 'clan_id', 'id');
    }
}
