<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function fee(): BelongsTo
    {
        return $this->belongsTo(Fees::class, 'fee_id');
    }

    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
}
