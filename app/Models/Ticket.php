<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'priority','type','ticket_id','client_id','portfolio_id','client_site_id','user_id','department_id','reference_number','subject','due_date_to','attachment','message','created_by','status'
    ];

    public function getTicketDetail()
    {
        return $this->hasOne(JobType::class, 'id', 'type');
    }

    public function getDepartments()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }

    public function getClients()
    {
        return $this->hasOne(Client::class, 'id', 'client_id');
    }

    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function site()
    {
        return $this->hasOne(ClientSite::class, 'id', 'client_site_id');
    }

    public function created_by()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }





}
