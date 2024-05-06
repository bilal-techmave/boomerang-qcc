<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspectionField extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'inspection_id','filed_name','filed_data'
    ];
}
