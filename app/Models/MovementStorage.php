<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovementStorage extends Model
{
    use HasFactory;

    protected $fillable = [
        'storage_id','item_id','qty','action','documentReferenceNumber','reason','referalDocument','status','movement_storage'
    ];
}
