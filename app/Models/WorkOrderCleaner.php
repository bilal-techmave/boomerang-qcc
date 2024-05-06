<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkOrderCleaner extends Model
{
    use HasFactory,SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'work_order_id','cleaner_id','work_hours','work_budget','date_attendance','delete_stauts'
    ];


    public function work_order(){
        return $this->hasOne(WorkOrder::class,'id','work_order_id');
    }

    public function cleaner(){
        return $this->hasOne(User::class,'id','cleaner_id')->where('role','cleaner');
    }
}
