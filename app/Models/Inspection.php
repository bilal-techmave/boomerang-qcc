<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    use HasFactory;

    protected $fillable = [
        'template_id','score','conducted','completed','status'
    ];

    public function templateInspection()
    {
        return $this->hasOne(TemplateInspection::class, 'id', 'template_id');
    }

}
