<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Fees extends Model
{
    use HasTranslations;

    public $translatable = ['title'];
    protected $table = 'fees';

    protected $fillable = [
        'title',
        'amount',
        'grade_id',
        'classroom_id',
        'academic_year',
        'fee_type',
        'notes',
    ];

    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
