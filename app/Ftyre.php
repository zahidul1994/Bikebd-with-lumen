<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ftyre extends Model
{
    protected $fillable = [
        'admin_id', 'ftyre','created_by','status'
    ];
    public function admin(){
        return $this->belongsTo('App\Admin');
    }
}
