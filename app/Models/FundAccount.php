<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundAccount extends Model
{
    protected $fillable = [
        'description',
        'credit',
        'debit',
        'receipt_student_id',
        'date',
    ];
}
