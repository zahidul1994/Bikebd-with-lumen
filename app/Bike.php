<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent; //for use mongodb

class Bike extends Eloquent
{
   
    protected $fillable = ['admin_id',
    'category_id','newused','negotiable','condition','biketype','bikebrand_id','startingmethod','kilometerrun','bikemodel_id','bikeversion_id','bikemodelyear_id','engine_capacity','description','price','usedtime'
];
public function user()
{
    return $this->belongsTo('App\User','user_id','_id');
}
public function category()
{
    return $this->belongsTo('App\Category','category_id','_id');
}
public function bikebrand()
{
    return $this->belongsTo('App\Bikebrand','bikebrand_id','_id');
}

public function bikeversion()
{
    return $this->belongsTo('App\Bikeversion','bikeversion_id','_id');
}

public function bikemodel()
{
    return $this->belongsTo('App\Bikemodel','bikemodel_id','_id');
}

public function modelyear()
{
    return $this->belongsTo('App\Modelyear','bikemodelyear_id','_id');
}
public function bikeimage()
{
    return $this->hasMany('App\Bikeimage','post_id','_id');
}
}
