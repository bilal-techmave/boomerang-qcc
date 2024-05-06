<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseContact extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'contact_type','data_id','user_id','user_type','status'
    ];

    public function user(){
        return $this->hasOne(User::class,'id','user_id')->select('id','name','surname','email','phone_number');
    }
}
