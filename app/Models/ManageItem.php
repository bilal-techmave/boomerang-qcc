<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','type','serial','supplier_id','manufacturer','price_cost','barcode','product_code','expire_date','is_unique','description','observation','attachment','status','company_id','website'
    ];

    public function getItemQty(){
        return $this->hasOne(MovementStorage::class,'item_id','id');
    }

    public function supplier(){
        return $this->hasOne(Supplier::class,'id','supplier_id');
    }

    public function company(){
        return $this->hasOne(MainCompany::class,'id','company_id');
    }

}