<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karma extends Model
{
    protected $fillable = [
        'account_id', 'target_id', 'match_id', 'do', 'reason'
    ];

    public function user(){
        $this->belongsTo('App\User', 'account_id', 'id');
    }

    public function target(){
        $this->belongsTo('App\User', 'target_id', 'id');
    }

    public function match(){
        $this->belongsTo('App\Match', 'match_id', 'id');
    }

}
