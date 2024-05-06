<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspectionAction extends Model
{
    use HasFactory;

    protected $fillable = [
        'inspection_id','inspection_field_id','action_name','action_data'
    ];
}
