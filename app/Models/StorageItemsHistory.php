<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageItemsHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'storage_id','item_id','qty','document_ref_no','referalDocument','status','storage_to','user_id','action','reason','storage_form'
    ];

    public function formStore()
    {
        return $this->belongsTo(ManageStorage::class, 'storage_id');
    }
    
    public function toStore()
    {
        return $this->belongsTo(ManageStorage::class, 'storage_to');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}