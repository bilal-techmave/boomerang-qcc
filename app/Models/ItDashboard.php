<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItDashboard extends Model
{
    use HasFactory;

    protected $table = 'it_dashboards';
    protected $fillable = [
        'name','type','doc_file','uploaded_by'
    ];

   
}
