<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientWorkOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'work_order_id','task_description','reference_number',' po_work_bill', 'invoice_number', 'sales_price', 'extra_charge'
    ];

}
