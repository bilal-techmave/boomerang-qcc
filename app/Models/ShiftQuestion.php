<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShiftQuestion extends Model
{
    use HasFactory;
    protected $fillable = ['client_site_id','question','status'];

    public function nooptions(){
        return $this->hasMany(ShiftQuestionsReason::class,'shift_question_id','id')->select('shift_question_id','reson_option');
    }
    public function site(){
        return $this->hasOne(ClientSite::class,'id','client_site_id');
    }
}
