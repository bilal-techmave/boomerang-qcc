<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\HasPermissionsTrait;

use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, HasPermissionsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'dateofbirth',
        'phone_number',
        'second_number',
        'geo_country',
        'tfn',
        'abn',
        'notes',
        'role',
        'is_multipal_shift',
        'login_status',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function roledata(){
        return $this->hasOne(UsersRole::class,'user_id','id');
    }

    public function country(){
        return $this->hasOne(GeoCountry::class,'id','geo_country');
    }

    public  function rolename(){
        return $this->hasOneThrough(Role::class,UsersRole::class,'user_id','id','id','role_id')->select('name');
    }

    public function isAdmin(){
        return auth()->user()->role == "admin" ? true : false;
    }

    public function isCleaner(){
        return auth()->user()->role == "cleaner" ? true : false;
    }

    public function getJWTIdentifier() {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }



    public function department(){
        return $this->hasMany(UserDepartment::class,'user_id','id');
    }

    public function contractor(){
        return $this->hasMany(Contractor::class,'user_id','id');
    }

    public function cleanerShiftSite(){
        return $this->hasMany(ClientSiteShift::class,'cleaner_id','id')->select('client_site_id','cleaner_id');
    }

    public function portfolio_manager(){
        return $this->belongsTo(ClientPortfolio::class,'id','manager_id');
    }

    public function portfolio_managers(){
        return $this->hasMany(ClientPortfolio::class,'manager_id','id');
    }

    public function workordersubmit(){
        return $this->hasMany(WorkOrderSubmission::class,'manager_id','id');
    }
}
