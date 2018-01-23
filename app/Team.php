<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'match', 'race', 'avg_sf', 'commander'
    ];

    function user(){
        return $this->belongsTo('App\User', 'commander', 'id');
    }

    function actionplayers(){
        return $this->hasMany('App\Actionplayer', 'team', 'id');
    }

}
