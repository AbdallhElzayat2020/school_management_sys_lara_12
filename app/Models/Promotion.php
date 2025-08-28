<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotions';
    protected $fillable = [
        'student_id',
        'from_grade_id',
        'from_classroom_id',
        'from_section_id',
        'to_grade_id',
        'to_classroom_id',
        'to_section_id',
    ];
}
