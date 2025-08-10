<?php

namespace App\Http\Requests\Grades;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateGradeReuest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            //  UniqueTranslationRule::for('roles')->ignore($this->route('role'))
            'name.ar' => ['required', 'string', 'max:255', 'min:2', UniqueTranslationRule::for('grades')->ignore($this->route('grade'))],
            'name.en' => ['required', 'string', 'max:255', 'min:2', UniqueTranslationRule::for('grades')->ignore($this->route('grade'))],
            'status' => ['required', 'in:active,inactive'],
            'notes.ar' => ['nullable', 'string', 'max:4000'],
            'notes.en' => ['nullable', 'string', 'max:4000'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.ar.required' => __('grades.grade_name_ar_required'),
            'name.en.required' => __('grades.grade_name_en_required'),
            'name.ar.string' => __('grades.grade_name_ar_string'),
            'name.en.string' => __('grades.grade_name_en_string'),
            'name.ar.min' => __('grades.grade_name_ar_min'),
            'name.en.min' => __('grades.grade_name_en_min'),
            'name.ar.max' => __('grades.grade_name_ar_max'),
            'name.en.max' => __('grades.grade_name_en_max'),
            'status.required' => __('grades.grade_status_required'),
            'status.in' => __('grades.grade_status_in'),
            'notes.ar.string' => __('grades.grade_notes_ar_string'),
            'notes.en.string' => __('grades.grade_notes_en_string'),
            'notes.ar.max' => __('grades.grade_notes_ar_max'),
            'notes.en.max' => __('grades.grade_notes_en_max'),
            'name.ar.unique' => __('grades.grade_name_ar_unique'),
            'name.en.unique' => __('grades.grade_name_en_unique'),
        ];
    }

    public function attributes(): array
    {
        return [
            'name.ar' => 'اسم المرحلة الدراسية بالعربية',
            'name.en' => 'اسم المرحلة الدراسية بالإنجليزية',
            'status' => 'حالة المرحلة الدراسية',
            'notes.ar' => 'ملاحظات المرحلة الدراسية بالعربية',
            'notes.en' => 'ملاحظات المرحلة الدراسية بالإنجليزية',
        ];
    }
}
