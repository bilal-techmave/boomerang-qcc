<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContractor extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','contractor_id','status'];

    public function contarctor(){
        return $this->hasOne(Contractor::class,'id','contractor_id')->select('id','name');
    }
}
