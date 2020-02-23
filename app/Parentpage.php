<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parentpage extends Model
{
    protected $fillable = [
        'admin_id',  'superadmin_id', 'parentpage','created_by'
      ];
      public function page(){
        return $this->hasMany('App\Page');
    }
}
