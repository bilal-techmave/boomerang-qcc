<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  IncidentDocu extends Model
{
    use HasFactory;
    protected $fillable =[
        'incident_id','doc_type','doc_file'
    ];


}
