<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    public function city()
    {
        return $this->belongsTo(City::class)->select('id','city_name');
    }

    public function state()
    {
        return $this->belongsTo(State::class)->select('id','state_name');
    }


    protected $fillable =[
        'type','data_id','unit','address_number','street_address','suburb','city_id','state_id','zipcode','is_this_main_address','is_this_mail_address','status','imported_address'
    ];
}
