<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producttype extends Model
{
    protected $fillable = [
        'admin_id', 'producttype','created_by','status'
    ];
    public function admin(){
        return $this->belongsTo('App\Admin');
    }
}
