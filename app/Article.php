<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'content', 'account_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'account_id', 'id');
    }

    public function image()
    {
        return $this->hasOne('App\Image', 'id', 'image_id');
    }

}
