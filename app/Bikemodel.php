<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bikemodel extends Model
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