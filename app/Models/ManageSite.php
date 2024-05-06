<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageSite extends Model
{
    use HasFactory;

    protected $fillable = [
        'internal_code','client_id','portfolio_id','site_type','reference','contractor_id','unit','address_number','street_address','suburb','geo_city_id','geo_state_id','zip_code','supervisor_id','latitude','longitude','distance_gps','variation_allowed_minutes','is_regular_site','is_overnight_shift','show_missed_clean','is_high_risk','note','scope_of_work'
    ];

    public function city(){
        return $this->hasOne(GeoCity::class,'id','geo_city_id');
    }

    public function state(){
        return $this->hasOne(GeoState::class,'id','geo_state_id');
    }

    public function client(){
        return $this->hasOne(Client::class,'id','client_id');
    }

    public function question(){
        return $this->hasMany(ShiftQuestion::class,'id','client_id');
    }
}
