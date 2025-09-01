<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable = [
        'quiz_id',
        'score',
        'right_answer',
        'answers',
        'title',
    ];

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quizze::class, 'quiz_id');
    }
}
