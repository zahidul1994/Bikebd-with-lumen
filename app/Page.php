<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;
	use Sluggable;
    protected $dates = ['deleted_at'];
       protected $fillable = [
        'admin_id','superadmin_id', 'pagetitle','pageimage','pagename','pagekeyword','clickview','parentpage_id','description','pagetype','language','pagemetadescription','slug','pageurl'
    ];
	public function sluggable()
    {
        return [
            'slug' => [
                'source' =>'pagetitle'
            ]
        ];
    }
    public function parentpage()
{
    return $this->belongsTo('App\Parentpage');
}
public function admin()
{
    return $this->belongsTo('App\Admin');
}


}

