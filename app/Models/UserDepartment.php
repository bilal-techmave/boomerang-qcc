<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDepartment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','department_id','status'];
    
    public function department(){
        return $this->hasOne(Department::class,'id','department_id')->select('id','name');
    }
}
