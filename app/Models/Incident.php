<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;
    protected $fillable = [
        // 'job_type_id','name','status'
        'creater_id','creater_name','creater_phone','place_of_incident','incident_date','incident_time','is_witness_check','witness_name','witness_phone' ,         
        'witness_doc_number','client_id','incident_address','driver_vehicle_data','is_injury_person_check',  
        'injury_person_data','is_environmental_incident','environmental_data','other_details', 'status','notifiable_incident','incident_investigated','root_cause_completed','ncr_required','review_completed','general_commented',
    ];
    public function incidentDocs()
    {
        return $this->hasMany(IncidentDocu::class, 'incident_id');
    }

    public function incident_client(){
        return $this->hasOne(ClientPortfolioSite::class, 'id','client_id')->with(['site','protfolio','protfolio.client']);
    }

    public function incident_user(){
        return $this->hasOne(User::class,'id', 'creater_id');
    }

}
