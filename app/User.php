<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;


use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
    use Authenticatable, Authorizable;
    
        use Authenticatable, Authorizable;
        //use Notifiable;
        //use SoftDeletes;

        protected $guard = 'user';
        protected $dates = ['deleted_at'];
        // protected $connection = 'mongodb';
        
        protected $fillable = ['admin_id',
            'username','superadmin_id','phone','accounttype_id','name','image','gender_id','status_id', 'email', 'password','country'
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
        public function gender(){
            return $this->belongsTo('App\Gender');
        }
         public function admin(){
            return $this->belongsTo('App\Admin','admin_id','_id');
        }
        
        public function accessories(){
            return $this->hasMany('App\Accessories');
        }

        public function car(){
            return $this->hasMany('App\Car');
        }
        public function location(){
            return $this->belongsTo('App\Location','division_id','_id');
        }  
        
        public function sublocation(){
            return $this->belongsTo('App\Sublocation','subdivision_id','_id');
        } 
        public function status(){
            return $this->belongsTo('App\Status');
        }
        public function shop(){
            return $this->hasMany('App\Shop');
        }
        public function bike(){
            return $this->hasMany('App\Bike');
        }
        public function accounttype()
        {
            return $this->belongsTo('App\Accounttype');
        }
     

        
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
        public function getJWTIdentifier()
        {
            return $this->getKey();
        }
    
        /**
         * Return a key value array, containing any custom claims to be added to the JWT.
         *
         * @return array
         */
        public function getJWTCustomClaims()
        {
            return [];
        }
    }