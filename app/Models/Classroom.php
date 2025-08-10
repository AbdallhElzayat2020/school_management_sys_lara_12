<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Classroom extends Model
{
    protected $table = 'classrooms';
    protected $fillable = [
        'class_name',
        'status',
        'grade_id',
    ];

    /* ================  Relation ships ================ */

    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
}
