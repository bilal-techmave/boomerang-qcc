<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketReply extends Model
{
    use HasFactory;

    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    protected $fillable = ['ticket_id','user_id','message'];
}
