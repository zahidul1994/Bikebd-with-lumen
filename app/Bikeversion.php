<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent; //for use mongodb

class Bikeversion extends Eloquent
{
    protected $fillable = [
        'admin_id', 'bikeversion',
    ];

    public function bike(){
        return $this->hasOne('App\Bike');

    }
    public function car(){
        return $this->hasOne('App\Car');

    }
}