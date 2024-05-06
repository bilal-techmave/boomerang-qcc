<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageItemAddon extends Model
{
    use HasFactory;

    protected $fillable = [
        'manage_item_id','item_type','image'
    ];
}
