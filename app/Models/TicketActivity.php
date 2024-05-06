<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketActivity extends Model
{
    use HasFactory;

    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function getAssignedBy()
    {
        return $this->hasOne(User::class, 'id', 'assigned_by');
    }
    public function department()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }

    public function reply()
    {
        return $this->hasOne(Department::class, 'id', 'reply_from');
    }

    protected $fillable = [
        'ticket_id',
        'user_id',
        'department_id',
        'assigned_by',
        'reply_from',
        'status'
    ];
}
