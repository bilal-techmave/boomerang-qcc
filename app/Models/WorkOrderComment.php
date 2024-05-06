<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkOrderComment extends Model
{
    use HasFactory,SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'work_order_id','user_id','comment','delete_stauts'
    ];


    public function work_order(){
        return $this->hasOne(WorkOrder::class,'id','work_order_id');
    }

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
