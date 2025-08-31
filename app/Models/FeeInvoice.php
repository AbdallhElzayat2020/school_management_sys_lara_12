<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeInvoice extends Model
{
    protected $table = 'fee_invoices';
    protected $fillable = [
        'description',
        'amount',
        'fee_id',
        'classroom_id',
        'grade_id',
        'student_id',
        'invoice_date',
    ];
}
