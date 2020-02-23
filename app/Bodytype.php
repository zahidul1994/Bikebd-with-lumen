<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent; //for use mongodb

class Bodytype extends Eloquent
{
   protected $fillable = [
     'admin_id','bodytype'
      ];
      
      public function car(){
        return $this->hasOne('App\Car');

    }
}
