<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{
    use HasTranslations;

    public $translatable = ['name', 'notes'];

    protected $table = 'grades';
    protected $fillable = [
        'name',
        'status',
        'notes',
    ];


    /* ================  Relation ships ================ */

    public function classrooms(): HasMany
    {
        return $this->hasMany(Classroom::class, 'grade_id');
    }
}
