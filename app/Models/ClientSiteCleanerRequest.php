<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientSiteCleanerRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'cleaner_id','client_site_id','request_body','status','create_date_time'
    ];

    public function site(){
        return $this->hasOne(ClientSite::class,'id','client_site_id');
    }

    public function cleaner(){
        return $this->hasOne(User::class,'id','cleaner_id');
    }

   
}
