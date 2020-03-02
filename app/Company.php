<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable=[
        'superadmin_id','admin_id','shortname','fullname','profileimage','description','coverimage','status'
    ];
}
