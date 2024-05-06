<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrderEmail extends Model
{
    use HasFactory;

    protected $fillable = [
        'work_order_id','email','delete_stauts'
    ];


    public function work_order(){
        return $this->hasOne(WorkOrder::class,'id','work_order_id');
    }
}
