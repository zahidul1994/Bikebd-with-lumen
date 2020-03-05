<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clutch extends Model
{
    protected $fillable = [
        'admin_id', 'clutch','created_by','status'
    ];
    public function admin(){
        return $this->belongsTo('App\Admin');
    }
}
