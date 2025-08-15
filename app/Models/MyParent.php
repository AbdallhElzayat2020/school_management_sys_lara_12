<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MyParent extends Model
{
    use HasTranslations;

    public $translatable = ['father_name', 'father_job', 'mother_name', 'mother_job', 'father_address', 'mother_address'];

    protected $table = '';
    protected $fillable = [
        'email',
        'password',
        'father_name',
        'father_national_id',
        'father_passport_id',
        'father_phone',
        'father_job',
        'father_address',
        'father_nationality_id',
        'father_type_blood_id',
        'father_religion_id',

        'mother_name',
        'mother_national_id',
        'mother_passport_id',
        'mother_phone',
        'mother_job',
        'mother_address',
        'mother_nationality_id',
        'mother_type_blood_id',
        'mother_religion_id',
    ];
}
