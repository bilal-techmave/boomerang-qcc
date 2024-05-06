<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientSite extends Model
{
    use HasFactory;

    protected $fillable = [
        'internal_code','client_id','portfolio_id','site_type','reference','contractor_id','unit','address_number','street_address','suburb','geo_city_id','geo_state_id','zip_code','supervisor_id','latitude','longitude','distance_gps','variation_allowed_minutes','is_regular_site','is_overnight_shift','show_missed_clean','is_high_risk','note','scope_of_work','status'
    ];

    public function client_site_shift(){
        return $this->hasMany(ClientSiteShift::class,'client_site_id','id');
    }

    public function client(){
        return $this->hasOne(Client::class,'id','client_id');
    }

    public function contractor(){
        return $this->hasOne(Contractor::class,'id','contractor_id');
    }

    public function potfolio(){
        return $this->hasOne(ClientPortfolio::class,'id','portfolio_id');
    }

    public function city(){
        return $this->hasOne(GeoCity::class,'id','geo_city_id')->select('id','city_name');
    }

    public function supervisor(){
        return $this->hasOne(User::class,'id','supervisor_id')->select('id','name');
    }

    public function state(){
        return $this->hasOne(GeoState::class,'id','geo_state_id')->select('id','state_name');
    }

    public function question(){
        return $this->hasMany(ShiftQuestion::class,'client_site_id','id')->select('id','client_site_id','question')->with('nooptions')->where('status',1);
    }

    public function shift_submit(){
        return $this->hasMany(ClientSiteShiftCleanerSubmissions::class,'client_site_id','id');
    }
}
