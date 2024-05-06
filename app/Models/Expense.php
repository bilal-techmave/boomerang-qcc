<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $fillable = [
        'financial_accounts_id','expense_types_id','main_companies_id','due_date','amount','suppliers_id','notes','status'
    ];
}
