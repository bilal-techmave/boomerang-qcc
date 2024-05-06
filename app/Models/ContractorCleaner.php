<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractorCleaner extends Model
{
    use HasFactory;

    protected $fillable = [
        'contractor_id','cleaner_id','status'
    ];

    public function cleaners(){
        return $this->belongsTo(User::class,'cleaner_id','id');
    }
}
