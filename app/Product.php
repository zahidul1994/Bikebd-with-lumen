<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'superadmin_id','admin_id','company_id','brand_id','clickview','productname','producttype','marketstatus','regularprice','offerprice','offerurl','displacement','mileage','rm','rpm','torquenm','torquerpm','engine','enginemaximumpower','enginemaximumtorque','stroke','compressionratio','gears','clutch','chassis','frontsuspension','rearsuspension','frontbrake','rearbrake','frontbrakediameter','rearbrakediameter','abs','fronttire','reartire','tubelesstires','overalllength','overallwidth','weight','fueltankcapacity','wheelbase','voltage','battery','headlight','taillight','indicators','speedometer','odometer','rpmmeter','handle','passenger','status','videoourl'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' =>'productname'
            ]
        ];
    }
    
}
