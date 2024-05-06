<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientSiteShiftsReceivable extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_site_id','avaliable_start_time','avaliable_end_time','total_hours','hourly_rate_receivable','frequency','status'
    ];

    public function shift_days(){
        return $this->hasMany(ClientSiteShiftsDay::class,'client_site_shifts_id','id')->where('shift_type','receivable');
    }
}
