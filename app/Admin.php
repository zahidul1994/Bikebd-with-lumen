<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Admin extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
     use Authenticatable, Authorizable;
     use HasRoles;
     use SoftDeletes;

        protected $guard_name = 'superadmin';
    protected $dates = ['deleted_at'];
    // protected $connection = 'mongodb';

    protected $fillable = [
        'superadmin_id','phone','language','name','image','gender_id','status_id', 'email', 'password','country'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function user()
    {
        return $this->hasMany('App\User');
    }
    public function product()
    {
        return $this->hasOne('App\Product');
    }
    public function gender()
    {
        return $this->belongsTo('App\Gender');
    }
    public function superadmin()
    {
        return $this->belongsTo('App\Superadmin');
    }
    public function createuser(){
        return $this->hasOne('App\Createuser');
    }
    public function accounttype()
    {
        return $this->belongsTo('App\Accounttype');
    }
    public function status()
    {
        return $this->belongsTo('App\Status','status_id','id');
    }
    public function blog()
    {
        return $this->hasOne('App\Blog');
    }
        // public function sendPasswordResetNotification($token)
        // {
        //     $this->notify(new AdminResetPasswordNotification($token));
        // }
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