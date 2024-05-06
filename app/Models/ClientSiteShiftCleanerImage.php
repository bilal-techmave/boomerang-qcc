<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientSiteShiftCleanerImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_tbl','shift_submission_id','shift_images','image_type'
    ];


}
