<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
}
