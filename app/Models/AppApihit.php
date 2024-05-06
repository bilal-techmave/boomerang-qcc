<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppApihit extends Model
{
    use HasFactory;

    protected $fillable =[
        'api_data','api_file_data','cleaner_id','api_type'
    ];
}
