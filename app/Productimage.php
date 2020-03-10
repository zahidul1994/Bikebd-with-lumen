<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productimage extends Model
{
   protected $fillabel=[
'product_id','productimage'
   ];
   public function product(){
       return $this->belongsTo('App\Product');
   }
}
