<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuppliersFinancial extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id','payment_type','cheque_name','account_name','branch_route','account_number','biller_code','reference'
    ];
}
