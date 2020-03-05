<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable=[
        'superadmin_id','admin_id','brand','fullname','profileimage','description','coverimage','status'
    ];
    public function brandcategory(){
        return $this->hasMany('App\Brandcategory');
    }
}
