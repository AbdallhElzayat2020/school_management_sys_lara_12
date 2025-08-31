<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAccount extends Model
{
    protected $table = 'student_accounts';

    protected $fillable = [
        'student_id',
        'grade_id',
        'classroom_id',
        'debit',
        'credit',
        'description',
    ];
}
