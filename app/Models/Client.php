<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = ['deleted_at'];

    public function comments()
    {
        return $this->hasMany(Comment::class,'data_id','id');
    }
    protected $fillable = [
        'business_name','trading_name','abn','acn','phone_number','second_number','mobile_number','fax_number','client_type','website','facebook','twitter','instagram','linkedin','comapny_id','is_prospect_client','is_direct_client','status','notes','contacted_by','client_entry_point','created_by','profile_image','client_id'
    ];

    public function createby(){
        return $this->hasOne(User::class,'id','created_by')->select('id','name');
    }




}
