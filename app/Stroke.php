<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stroke extends Model
{
    protected $fillable = [
        'admin_id', 'stroke','created_by','status'
    ];
    public function admin(){
        return $this->belongsTo('App\Admin');
    }
}
