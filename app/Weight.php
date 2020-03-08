<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    protected $fillable = [
        'admin_id', 'weight','created_by','status'
    ];
    public function admin(){
        return $this->belongsTo('App\Admin');
    }
}
