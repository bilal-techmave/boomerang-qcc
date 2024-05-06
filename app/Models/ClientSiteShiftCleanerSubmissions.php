<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientSiteShiftCleanerSubmissions extends Model
{
    use HasFactory;

    protected $fillable = [
        'cleaner_id','client_site_id','client_site_shift_id','latitude','longitude','selfie_taken','shift_start','shift_data','finish_salfie_taken','shift_end','status','start_distance','end_latitude','end_longitude','end_distance','is_approval_boards'
    ];

    public function site(){
        return $this->belongsTo(ClientSite::class,'client_site_id','id');
    }

    public function cleaner(){
        return $this->belongsTo(User::class,'cleaner_id','id');
    }

    public function clientsiteshift(){
        return $this->belongsTo(ClientSiteShift::class,'client_site_shift_id','id');
    }


    public function shift_image(){
        return $this->hasMany(ClientSiteShiftCleanerImage::class,'shift_submission_id','id')->where('image_tbl','shift');
    }

    public function before_image(){
        return $this->hasMany(ClientSiteShiftCleanerImage::class,'shift_submission_id','id')->where('image_type', 'before')->where('image_tbl','shift');
    }

    public function after_image(){
        return $this->hasMany(ClientSiteShiftCleanerImage::class,'shift_submission_id','id')->where('image_type', 'after')->where('image_tbl','shift');
    }

}