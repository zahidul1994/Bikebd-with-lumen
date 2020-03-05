<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chassis extends Model
{
    protected $fillable = [
        'admin_id', 'chassis','created_by','status'
    ];
    public function admin(){
        return $this->belongsTo('App\Admin');
    }
}
