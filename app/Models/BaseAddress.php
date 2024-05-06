<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseAddress extends Model
{
    use HasFactory,SoftDeletes;

    protected $dates = ['deleted_at'];
    public function city()
    {
        return $this->hasOne(GeoCity::class,'id','geo_city_id');
    }

    public function state()
    {
        return $this->hasOne(GeoState::class,'id','geo_state_id');
    }


    protected $fillable =[
        'type','data_id','unit','address_number','street_address','suburb','geo_city_id','geo_state_id','zipcode','is_this_main_address','is_this_mail_address','status','imported_address'
    ];
}
