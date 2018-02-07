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

    public function match_summ()
    {
        return $this->belongsTo('App\Match_summ', 'id', 'id');
    }

    public function teams()
    {
        return $this->hasMany('App\Team', 'match', 'id');
    }

    public function actionplayers()
    {
        return $this->hasMany('App\Actionplayer', 'match_id', 'id');
    }
}
