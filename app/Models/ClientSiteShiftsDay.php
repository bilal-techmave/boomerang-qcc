<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientSiteShiftsDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_site_shifts_id','client_site_id','shift_type','day_type'
    ];

}
