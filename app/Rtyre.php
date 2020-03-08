<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rtyre extends Model
{
    protected $fillable = [
        'admin_id', 'rtyre','created_by','status'
    ];
    public function admin(){
        return $this->belongsTo('App\Admin');
    }
}
