<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brandcategory extends Model
{
    protected $fillable=[
        'admin_id','brandcategory','company_id'
    ];
    public function company(){
        return $this->belongsTo('App\Company','company_id','id');
    }
}
