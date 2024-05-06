<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientPortfolioSite extends Model
{
    use HasFactory;

    protected $fillable = [
	 	'client_portfolio_id','client_site_id'
    ];

    public function site(){
        return $this->hasOne(ClientSite::class,'id','client_site_id');
    }

    public function protfolio(){
        return $this->hasOne(ClientPortfolio::class,'id');
    }

}
