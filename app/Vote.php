<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'account_id', 'comm_id', 'match_id', 'vote', 'reason'
    ];

    public function user(){
        $this->belongsTo('App\User', 'account_id', 'id');
    }

    public function commander(){
        $this->belongsTo('App\User', 'comm_id', 'id');
    }

    public function match(){
        $this->belongsTo('App\Match', 'match_id', 'id');
    }

}
