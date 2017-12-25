<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'permissions'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function actionplayer(){
        return $this->hasMany('App\Actionplayer', 'user', 'id');
    }

    public function playerstat(){
        return $this->hasOne('App\Playerstat', 'account_id', 'id');
    }

    public function playerinfo(){
        return $this->hasOne('App\Playerinfo', 'account_id', 'id');
    }

    public function commanderstat(){
        return $this->hasOne('App\Commanderstat', 'account_id', 'id');
    }
}
