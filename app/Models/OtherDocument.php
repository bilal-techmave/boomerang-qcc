<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherDocument extends Model
{
    use HasFactory;

    protected $fillable = ['type','data_id','document'];
}
