<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'description', 'url', 'categorie_id'
    ];

    public function categorie()
    {
        return $this->hasOne('App\Categorie', 'id', 'categorie_id');
    }

    public function image()
    {
        return $this->hasOne('App\Image', 'id', 'image_id');
    }

}
