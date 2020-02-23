<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $fillable = [
        'admin_id', 'gender','created_by','status_id'
    ];
    public function admin()
    {
        return $this->hasOne('App\Admin');
    }
    public function user(){
        return $this->hasOne('App\User');
    }
}
