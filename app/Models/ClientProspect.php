<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientProspect extends Model
{
    use HasFactory;

    public function city()
    {
        return $this->belongsTo(GeoCity::class)->select('id','geo_city_id');
    }

    public function state()
    {
        return $this->belongsTo(GeoState::class)->select('id','geo_state_id');
    }

    protected $fillable = [
        'business_name','abn','acn','unit','address_number','street_address','suburb','geo_city_id','geo_state_id','zipcode','contact_name','contact_surname','contact_email','phone_number','contact_type','contacted_by','client_entry_point','file','notes','facebook','twitter','instagram','linkedin'
    ];
}
