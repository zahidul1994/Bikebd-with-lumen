<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gears extends Model
{
    protected $fillable = [
        'admin_id', 'gear','created_by','status'
    ];
    public function admin(){
        return $this->belongsTo('App\Admin');
    }
}
