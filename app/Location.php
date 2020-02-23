<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent; //for use mongodb
class Location extends Eloquent
{
    protected $fillable = [
        'admin_id', 'divisionname',
    ];
    public function sublocation(){
        return $this->hasOne('App\Sublocation');
    }
    public function user(){
        return $this->hasOne('App\User');
    }
}
