<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Accounttype extends Model
{
    protected $fillable = [
        'superadmin_id', 'accounttype','created_by'
    ];
    public function admin()
    {
        return $this->hasOne('App\Admin');
    }
    public function user(){
        return $this->hasOne('App\User');
    }
}
