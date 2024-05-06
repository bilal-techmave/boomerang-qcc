<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','slug','email','internal_code','supervisor','manager','is_work_order','is_email_send','status'
    ];

    public function supervisor_get(){
        return $this->hasOne(User::class,'id','supervisor')->select('id','name','surname','email');
    }

    public function manager_get(){
        return $this->hasOne(User::class,'id','manager')->select('id','name','surname','email');
    }
}
