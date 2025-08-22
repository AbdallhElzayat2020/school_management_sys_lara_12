<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Translatable\HasTranslations;

class Teacher extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    protected $table = 'teachers';
    protected $fillable = [
        'gender_id',
        'specialization_id',
        'join_date',
        'address',
        'password',
        'email',
        'name',
    ];


    /*
     *=================== relation ships ===================
     * */
    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    public function specialization(): BelongsTo
    {
        return $this->belongsTo(Specialization::class);
    }

    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Section::class, 'teacher_section');
    }

}
