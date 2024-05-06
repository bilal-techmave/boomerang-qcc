<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeoState extends Model
{
    use HasFactory;
    protected $fillable = ["id","state_name","state_timezone"];
    public function addresses()
    {
        return $this->hasMany(BaseAddress::class);
    }

    public function client_prospectes(){
        return $this->hasMany(ClientProspect::class);
    }
}
