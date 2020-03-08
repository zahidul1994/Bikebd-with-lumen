<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Betteryvoltage extends Model
{
    protected $fillable = [
        'admin_id', 'bvoltage','created_by','status'
    ];
    public function admin(){
        return $this->belongsTo('App\Admin');
    }
}
