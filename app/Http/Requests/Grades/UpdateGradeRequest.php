<?php

namespace App\Http\Requests\Grades;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateGradeRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name.ar' => ['required', 'string', 'max:255', 'min:2', UniqueTranslationRule::for('grades')->ignore($this->route('grade'))],
            'name.en' => ['required', 'string', 'max:255', 'min:2', UniqueTranslationRule::for('grades')->ignore($this->route('grade'))],
            'status' => ['required', 'in:active,inactive'],
            'notes.ar' => ['nullable', 'string', 'max:4000'],
            'notes.en' => ['nullable', 'string', 'max:4000'],
        ];
    }
}
