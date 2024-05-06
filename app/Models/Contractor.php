<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','abn','responsible_id','hourly_rate','status' 
    ];

    public function responsible(){
        return $this->hasOne(User::class,'id','responsible_id');
    }
}
