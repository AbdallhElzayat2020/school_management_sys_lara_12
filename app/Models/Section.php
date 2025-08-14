<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{

    use HasTranslations;

    public $translatable = ['section_name'];

    protected $table = 'sections';
    protected $fillable = [
        'section_name',
        'status',
        'grade_id',
        'classroom_id',
    ];


    /* ================  Relation ships ================ */
    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

}
