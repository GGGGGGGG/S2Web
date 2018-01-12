<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'image_url',
    ];

    public function category() {
        return $this->belongsTo('App\Category', 'image_id', 'id');
    }

    public function download() {
        return $this->belongsTo('App\Download', 'image_id', 'id');
    }

    public function article() {
        return $this->belongsTo('App\Article', 'image_id', 'id');
    }

}
