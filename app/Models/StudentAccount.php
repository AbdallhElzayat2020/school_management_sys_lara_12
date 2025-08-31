<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAccount extends Model
{
    protected $table = 'student_accounts';

    protected $fillable = [
        'student_id',
        'fee_id',
        'fee_invoice_id',
        'debit',
        'credit',
        'description',
        'type',
        'date',
        'receipt_student_id'
    ];
}
