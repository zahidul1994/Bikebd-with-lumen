<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent; //for use mongodb

class Bikeimage extends Eloquent
{
    protected $fillable = [
        'user_id', 'post_id','bikeimge'
    ];

    public function bike()
    {
        return $this->belongsToMany('App\Bike','post_id','_id');
    }

    public function car()
    {
        return $this->belongsToMany('App\Car','post_id','_id');
    }
}
