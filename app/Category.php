<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'admin_id', 'categoryname',
    ];
    public function admin()
    {
        return $this->hasOne('App\Admin');
    }
    public function user(){
        return $this->hasOne('App\User');
    } 
     public function bike(){
        return $this->hasOne('App\Bike');

    }
    
    public function car(){
        return $this->hasOne('App\Car');
    }
}
