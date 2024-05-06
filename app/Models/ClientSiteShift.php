<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientSiteShift extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_site_id','cleaner_id','shift_type','hourly_rate','avaliable_start_time','avaliable_end_time','total_hours','frequency','status'
    ];

    public function client_site(){
        return $this->belongsTo(ClientSite::class,'client_site_id','id');
    }

    public function cleaner(){
        return $this->belongsTo(User::class,'cleaner_id','id');
    }

    public function shift_days(){
        return $this->hasMany(ClientSiteShiftsDay::class,'client_site_shifts_id','id')->where('shift_type','shift');
    }

    public function shift_submit(){
        return $this->hasMany(ClientSiteShiftCleanerSubmissions::class,'client_site_shift_id','id');
    }
}
