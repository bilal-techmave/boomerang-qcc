<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NcrAction extends Model
{
    use HasFactory;

    protected $fillable = [
        'recommended_actions', 'by_whom', 'due_date', 'status', 'completed_date', 'incident_id', 
    ];
}