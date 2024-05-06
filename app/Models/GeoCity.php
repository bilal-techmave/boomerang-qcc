<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeoCity extends Model
{
    use HasFactory;
    protected $fillable = ["id","geo_state_id","city_name"];
    public function addresses()
    {
        return $this->hasMany(BaseAddress::class);
    }

    public function client_prospectes(){
        return $this->hasMany(ClientProspect::class);
    }

    public function state(){
        return $this->hasOne(GeoState::class,'id','geo_state_id');
    }


}
