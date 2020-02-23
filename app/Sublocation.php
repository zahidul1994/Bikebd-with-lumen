<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent; //for use mongodb
class Sublocation extends Eloquent
{
    protected $fillable = [
        'admin_id','division_id','subdivisionname',
    ];
    public function location(){
        return $this->belongsTo('App\Location','division_id','_id');
    }
    public function user(){
        return $this->hasOne('App\User');
    }
}
