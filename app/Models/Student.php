<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
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
        'student_parent_id',
        'date_birth',
        'academic_year',
    ];

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


    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
