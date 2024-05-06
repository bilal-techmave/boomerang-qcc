<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','abn','phone_number','alt_phone_number','fax_number','unit','address_number','street_address','zipcode','suburb','city','state','email','website','notes','status'
    ];

    public function getcity(){
        return $this->hasOne(GeoCity::class,'id','city')->select('id','city_name');
    }

    public function getstate(){
        return $this->hasOne(GeoState::class,'id','state')->select('id','state_name');
    }
}
