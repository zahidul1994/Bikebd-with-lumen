<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $fillable=[
        'superadmin_id','admin_id','distributor','address','phone','fullname','profileimage','description','coverimage','status'
    ];
    public function product(){
        return $this->hasMany('App\Product');
    }
}
