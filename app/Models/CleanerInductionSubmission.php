<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CleanerInductionSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'cleaner_induction_id','cleaner_id','signature','status'
    ];

    public function cleaner(){
        return $this->hasOne(User::class,'id','cleaner_id');
    }

    public function cleaner_induction(){
        return $this->hasOne(CleanerInduction::class,'id','cleaner_induction_id');
    }
}
