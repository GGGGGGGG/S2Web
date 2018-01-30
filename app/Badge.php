<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    const CREATED_AT = 'created_at';

    protected $fillable = [
        'account_id', 'achievement_id', 'created_at'
    ];

    public function achievement(){
        return $this->hasOne('App\Badges', 'id', 'account_id');
    }
}
