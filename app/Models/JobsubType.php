<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobsubType extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_type_id','name','status'
    ];

    public function jobtype(){
        return $this->hasOne(JobType::class,'id','job_type_id')->select('id','name');
    }
}
