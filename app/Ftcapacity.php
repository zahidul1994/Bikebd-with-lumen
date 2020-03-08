<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ftcapacity extends Model
{
    protected $fillable = [
        'admin_id', 'ftcapacity','created_by','status'
    ];
    public function admin(){
        return $this->belongsTo('App\Admin');
    }
}
