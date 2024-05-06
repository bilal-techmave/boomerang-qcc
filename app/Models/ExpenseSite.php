<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseSite extends Model
{
    use HasFactory;
    protected $fillable = [
        'expense_id','client_site_id','created_by'
    ];

    public function site(){
        return $this->hasOne(ClientSite::class,'id','client_site_id');
    }
}
