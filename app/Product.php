<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'superadmin_id','admin_id','brand_id','distributor_id','brandcategory_id','clickview','title','slug','cc','producttype','marketstatus','keyword','regularprice','offerprice','offerurl','displacement','mileage','rm','rpm','torquenm','torquerpm','engine','enginemaximumpower','enginemaximumtorque','bore','stroke','compressionratio','cylinder','gears','clutch','transmission','chassis','frontsuspension','rearsuspension','frontbrake','rearbrake','frontbrakediameter','rearbrakediameter','abs','ftyre','rtyre','tubeless','overalllength','overallwidth','groundclearness','weight','ftcapacity','wheelbase','battery','bvoltage','headlight','taillight','indicators','speedometer','odometer','rpmmeter','handle','seattype','passenger','engineks','shortdescription','featureimage','embedurl'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' =>'title'
            ]
        ];
    }
    public function images(){
    return $this->hasMany('App\Productimage');
    }
   
    
}
