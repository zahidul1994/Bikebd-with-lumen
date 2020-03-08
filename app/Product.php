<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'superadmin_id','admin_id','company_id','brand_id','clickview','title','slug','cc','producttype','marketstatus','keyword','regularprice','offerprice','offerurl','displacement','mileage','rm','rpm','torquenm','torquerpm','company_id','brandcategory_id','engine','enginemaximumpower','enginemaximumtorque','bore','stroke','gears','clutch','transmission','frontsuspension','rearsuspension','frontbrake','rearbrake','frontbrakediameter','rearbrakediameter','abs','fronttire','reartire','tubelesstires','overalllength','overallwidth','weight','fueltankcapacity','wheelbase','voltage','battery','headlight','taillight','indicators','speedometer','odometer','rpmmeter','handle','passenger','status','videoourl'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' =>'title'
            ]
        ];
    }
    
}
