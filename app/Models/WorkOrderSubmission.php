<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrderSubmission extends Model
{
    use HasFactory;

    protected $fillable = ['work_order_id','site_id','client_portfolio_id','manager_id','cleaner_id','latitude','longitude','selfie_taken','shift_start','shift_data','finish_salfie_taken','shift_end','status','start_distance','end_latitude','end_longitude','end_distance'];

    public function site(){
        return $this->hasOne(ClientSite::class,'id','site_id');
    }

    public function cleaner(){
        return $this->hasOne(User::class,'id','cleaner_id');
    }

    public function work_order(){
        return $this->hasOne(WorkOrder::class,'id','work_order_id');
    }

    public function work_order_images(){
        return $this->hasMany(ClientSiteShiftCleanerImage::class,'shift_submission_id','id')->where('image_tbl','work-order');
    }

    public function portfolio(){
        return $this->hasOne(ClientPortfolio::class,'id','client_portfolio_id');
    }

    public function managers(){
        return $this->hasOne(User::class,'id','manager_id');
    }

    // public function shift_images(){
    //     return $this->hasOne(ClientSiteShiftCleanerImage::class,'shift_submission_id','id')->where('image_tbl','shift');
    // }

    public function before_image(){
        return $this->hasMany(ClientSiteShiftCleanerImage::class,'shift_submission_id','id')->where('image_type', 'before')->where('image_tbl','work-order');
    }

    public function after_image(){
        return $this->hasMany(ClientSiteShiftCleanerImage::class,'shift_submission_id','id')->where('image_type', 'after')->where('image_tbl','work-order');
    }
}