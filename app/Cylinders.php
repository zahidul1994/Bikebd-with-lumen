<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cylinders extends Model
{
    protected $fillable = [
        'admin_id', 'cylinder','created_by','status'
    ];
    public function admin(){
        return $this->belongsTo('App\Admin');
    }
}
