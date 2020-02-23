<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent; //for use mongodb

class Bikemodel extends Eloquent
{
    protected $fillable = [
        'admin_id', 'bikemodel',
    ];
    public function bike(){
        return $this->hasOne('App\Bike');

    }
    public function car(){
        return $this->hasOne('App\Car');

    }
}