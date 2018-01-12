<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function downloads(){
        return $this->hasMany('App\Download', 'categorie_id', 'id');
    }

    public function image()
    {
        return $this->hasOne('App\Image', 'id', 'image_id');
    }

}
