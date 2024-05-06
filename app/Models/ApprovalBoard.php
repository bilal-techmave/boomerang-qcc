<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovalBoard extends Model
{
    use HasFactory;
    protected $fillable = ['client_site_shift_cleaner_submissions_id','status','description'];


    public function subbmission(){
        return $this->belongsTo(ClientSiteShiftCleanerSubmissions::class,'client_site_shift_cleaner_submissions_id','id');
    }
}
