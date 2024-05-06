<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class JobType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','status'
    ];

    public function getSubJob(){
        return $this->hasMany(JobsubType::class,'job_type_id','id');
    }


}
