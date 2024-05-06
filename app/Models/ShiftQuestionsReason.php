<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShiftQuestionsReason extends Model
{
    use HasFactory;
    protected $fillable = ['shift_question_id','reson_option'];
}
