<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        't_name','t_description', 't_picture', 'status'
    ];

    public function templateField()
    {
        return $this->hasMany(TemplateField::class, 'template_id')->orderBy('sort_no', 'ASC');
    }   
}
