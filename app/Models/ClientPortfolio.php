<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientPortfolio extends Model
{
    use HasFactory;

    protected $fillable = [
	 	'full_name','short_name','client_id','manager_id','geo_state_id','total_assigned','status'
    ];


    public function client(){
        return $this->hasOne(Client::class,'id','client_id')->select('id','business_name');
    }

    public function manager(){
        return $this->hasOne(User::class,'id','manager_id')->select('id','name','surname','email');
    }

    public function protfolio_manager(){
        return $this->hasOne(User::class,'id','manager_id');
    }

    public function state(){
        return $this->hasOne(GeoState::class,'id','geo_state_id')->select('id','state_name');
    }

    public function siteprotfolio(){
        return $this->hasOne(ClientPortfolioSite::class,'client_portfolio_id','id');
    }

    public function siteprotfolios(){
        return $this->hasMany(ClientPortfolioSite::class,'client_portfolio_id','id');
    }


}
