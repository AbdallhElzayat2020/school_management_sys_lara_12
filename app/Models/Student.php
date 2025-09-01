<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\MorphMany;


class Student extends Model
{
    use HasTranslations, SoftDeletes;

    public $translatable = ['name'];

    protected $table = 'students';
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender_id',
        'blood_type_id',
        'nationality_id',
        'grade_id',
        'classroom_id',
        'section_id',
        'parent_id',
        'date_birth',
        'academic_year',
    ];


    /* ================= relation ships =================  */
    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    public function bloodType(): BelongsTo
    {
        return $this->belongsTo(TypeBlood::class);
    }

    public function nationality(): BelongsTo
    {
        return $this->belongsTo(Nationalitie::class);
    }

    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }

    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(MyParent::class);
    }

    public function attendance(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

}
