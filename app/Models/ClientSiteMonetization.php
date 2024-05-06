<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientSiteMonetization extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_site_id','client_yearly','client_monthly','client_fortnightly','client_time_allocated','client_hourly_rate','client_service_cost','client_frequency','cleaner_frequency','cleaner_yearly','cleaner_monthly','cleaner_fortnightly','cleaner_time_allocated','cleaner_hourly_rate','cleaner_service_cost','cleaner_contractor'
    ];

}