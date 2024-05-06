<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    use HasFactory;

    protected $fillable = ['client_id','client_portfolio_id','client_site_id','job_type_id','job_sub_type_id','reference_number','requester','completion_date','start_time','schedule_date','priority','department_id','sales_price','budget','time_allocated','invoice_number','po_work_bill','description','history','internal_communication','attachment','is_change_client','is_quote_work_order','created_by'];

    public function department(){
        return $this->hasOne(Department::class,'id','department_id');
    }

    public function jobtype(){
        return $this->hasOne(JobType::class,'id','job_type_id');
    }

    public function subjobtype(){
        return $this->hasOne(JobsubType::class,'id','job_sub_type_id');
    }

    public function portfolio(){
        return $this->hasOne(ClientPortfolio::class,'id','client_portfolio_id');
    }

    public function site(){
        return $this->hasOne(ClientSite::class,'id','client_site_id');
    }

    public function client(){
        return $this->hasOne(Client::class,'id','client_id');
    }

    public function createdby(){
        return $this->hasOne(User::class,'id','created_by');
    }

    public function assign_cleaner(){
        return $this->hasMany(WorkOrderCleaner::class,'work_order_id','id');
    }

    public function today_work(){
        return $this->hasMany(WorkOrderSubmission::class,'work_order_id','id')->where('status','started');
    }

    public function work_order_submit(){
        return $this->hasOne(WorkOrderSubmission::class,'work_order_id','id')->where('status','submitted');
    }

    public function work_order_submit_time(){
        return $this->hasMany(WorkOrderSubmission::class,'work_order_id','id');
    }

    public function cleaner_work(){
        return $this->hasMany(WorkOrderCleaner::class,'work_order_id','id');
    }

    public function client_work(){
        return $this->hasMany(ClientWorkOrder::class,'work_order_id','id');
    }

}
