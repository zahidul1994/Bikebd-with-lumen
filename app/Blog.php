<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
class Blog extends Model
{
    use SoftDeletes;
	use Sluggable;
    protected $dates = ['deleted_at'];
       protected $fillable = [
        'admin_id', 'title','postimage','clickview','url','shortdescription','description','blogtype','keywork','language','metadescription'
    ];
	public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function blogcategorylist()
{
    return $this->hasMany('App\Blogcategorylist');
} 
   public function blogcomment()
{
    return $this->hasMany('App\Blogcomment');
}
public function admin()
{
    return $this->belongsTo('App\Admin','admin_id','id');
}

}
