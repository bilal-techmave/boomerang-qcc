<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageStorage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','supervisor','unit','address_number','street_address','suburb','geo_city_id','geo_state_id','zipcode','is_fixed_storage','description'
    ];

    public function getUserDetail()
    {
        return $this->hasOne(User::class, 'id', 'supervisor');

    }
    public function city()
    {
        return $this->hasOne(GeoCity::class, 'id', 'geo_city_id');

    }
    public function state()
    {
        return $this->hasOne(GeoState::class, 'id', 'geo_state_id');

    }

    public function storageItems()
    {
        return $this->hasMany(StorageItem::class, 'storage_id', 'id');

    }


}
