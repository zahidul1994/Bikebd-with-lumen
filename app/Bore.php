<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bore extends Model
{
    protected $fillable = [
        'admin_id', 'bore','created_by','status'
    ];
    public function admin(){
        return $this->belongsTo('App\Admin');
    }
}
