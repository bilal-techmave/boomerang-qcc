<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CleanerDoc extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id','docs_type','docs_image'
    ];

    public function cleanerInduction()
    {
        return $this->hasOne(CleanerInduction::class, 'user_id', 'user_id');
    }
}
