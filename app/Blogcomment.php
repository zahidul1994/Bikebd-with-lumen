<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogcomment extends Model
{

    protected $fillable = [
        'blog_id', 'name','comment','email','website'
    ];
    
    public function blog()
    {
        return $this->belongsToMany('App\Blog','blog_id','id');
    }
}
