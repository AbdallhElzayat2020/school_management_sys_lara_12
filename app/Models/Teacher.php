<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Teacher extends Model
{
    protected $table = 'teachers';
    protected $fillable = [
        'gender_id',
        'specialization_id',
        'name',
        'password',
        'email',
    ];

    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }
    public function specialization(): BelongsTo
    {
        return $this->belongsTo(Specialization::class);
    }

}
