<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissedClean extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_site_shift_id','date_missed','person_action_id','comment','client_id','site_id','portfolio_id'
    ];

    public function shiftSite(){
        return $this->hasOne(ClientSiteShift::class,'id','client_site_shift_id');
    }

    public function site(){
        return $this->hasOne(ClientSite::class,'id','site_id');
    }
}
