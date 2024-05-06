<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractorSupervisor extends Model
{
    use HasFactory;

    protected $fillable = [
        'contractor_id','user_id','status'
    ];

    public function supervisor(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
