<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ncr extends Model
{
    use HasFactory;

    protected $table = 'ncrs';

    protected $fillable = [
        'creator_name', 'creator_phone', 'incident_id', 'responsible', 'client_portfolio_site', 'non_conformance_type', 'non_conformity_details', 
    ];

    public function protfolioSite(){
        return $this->hasOne(ClientPortfolioSite::class,'id','client_portfolio_site');
    }
}