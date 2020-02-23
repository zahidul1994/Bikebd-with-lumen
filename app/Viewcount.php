<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viewcount extends Model
{
    protected $fillable = [
        'post_id','titleslug', 'url','session_id','user_id','ip','agent','description','pagetype','language','pagemetadescription','slug','pageurl'
    ];
}
