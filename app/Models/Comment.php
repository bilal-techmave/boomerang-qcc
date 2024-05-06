<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function client()
    {
        return $this->belongsTo(Client::class,'data_id','id')->select('id','business_name');
    }

    protected $fillable = [
        'type','data_id','user_id','comment_type','comment','file','is_live'
    ];

    public function user(){
        return $this->hasOne(User::class,'id','user_id')->select('id','name','surname');
    }
}
