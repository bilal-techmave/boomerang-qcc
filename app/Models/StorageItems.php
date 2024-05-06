<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'storage_id','item_id','qty','document_ref_no','referalDocument','status','storage_to','user_id','action','reason','storage_form'
    ];
}