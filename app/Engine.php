<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Engine extends Model
{
    protected $fillable = [
        'admin_id', 'enginetype','created_by','status'
    ];
    public function admin(){
        return $this->belongsTo('App\Admin');
    }
}
