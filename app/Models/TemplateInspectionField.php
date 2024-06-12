<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateInspectionField extends Model
{
    use HasFactory;

    protected $fillable = [
        'template_id','t_page_name','t_section_name','field_type','filed_name','is_required','sort_no'
    ];
}
