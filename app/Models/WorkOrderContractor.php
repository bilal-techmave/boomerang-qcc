<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkOrderContractor extends Model
{
    use HasFactory,SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'work_order_id','contractor_id','work_hours','work_cost','date_attendance','delete_stauts'
    ];


    public function work_order(){
        return $this->hasOne(WorkOrder::class,'id','work_order_id');
    }

    public function contractor(){
        return $this->hasOne(Contractor::class,'id','contractor_id');
    }
}
