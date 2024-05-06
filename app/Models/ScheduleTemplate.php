<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'template_id','site_id','asset_id','assign_to','assign_by','how_often','date_from','date_to','submit_after_due_date','title','status',
    ];
}
