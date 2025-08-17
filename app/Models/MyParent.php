<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MyParent extends Model
{
    use HasTranslations;
    // fields are defined in the migration and used by the Livewire component with names like "name_father"
    public $translatable = [
        'name_father',
        'job_father',
        'name_mother',
        'job_mother',
        'address_father',
        'address_mother',
    ];

    // explicitly set the table name to match the migration
    protected $table = 'my_parents';

    protected $fillable = [
        'email',
        'password',

        // father
        'name_father',
        'national_id_father',
        'passport_id_father',
        'phone_father',
        'job_father',
        'address_father',
        'nationality_father_id',
        'blood_type_father_id',
        'religion_father_id',

        // mother
        'name_mother',
        'national_id_mother',
        'passport_id_mother',
        'phone_mother',
        'job_mother',
        'address_mother',
        'nationality_mother_id',
        'blood_type_mother_id',
        'religion_mother_id',
    ];
}
