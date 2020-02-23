<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
        'superadmin_id','status_name','created_by'
    ];
  
    public function user(){
        return $this->hasOne('App\User');
    }
    public function admin(){
        return $this->hasOne('App\Admin');
    }
   
}
 