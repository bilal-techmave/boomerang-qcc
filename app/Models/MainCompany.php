<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCompany extends Model
{
    use HasFactory;
    protected $fillable = [
        'business_name','abn','unit','address_number','street_address','suburb','city','state','zipcode','status'
    ];

    public function gcity(){
        return $this->hasOne(GeoCity::class,'id','city')->select('id','city_name');
    }


    public function gstate(){
        return $this->hasOne(GeoState::class,'id','state')->select('id','state_name');
    }
}
