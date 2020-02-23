<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogcategorylist extends Model
{
     protected $fillable = [
        'blog_id', 'categorylist'
    ];
    
    public function blog()
    {
        return $this->belongsToMany('App\Blog','blog_id','id');
    }

}
