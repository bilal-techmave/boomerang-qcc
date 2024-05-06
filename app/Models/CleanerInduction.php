<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CleanerInduction extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','description','docs_image','user_id','signature','status'
    ];

    public function cleaner_docs(){
        return $this->hasMany(BaseDocument::class,'user_id','user_id');
    }

    public function signature(){
        return $this->hasMany(CleanerInductionSubmission::class,'cleaner_induction_id','id');
    }
}
