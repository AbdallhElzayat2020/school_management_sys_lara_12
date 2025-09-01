<?php

namespace App\Http\Requests\Sections;

use Illuminate\Foundation\Http\FormRequest;

class StoreSectionRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'section_name.ar' => ['required', 'string', 'min:1', 'max:255'],
            'section_name.en' => ['required', 'string', 'min:1', 'max:255'],
            'grade_id' => ['required', 'exists:grades,id'],
            'classroom_id' => ['required', 'exists:classrooms,id'],
            'teacher_id' => ['nullable', 'exists:teachers,id'],
        ];
    }

    public function attributes(): array
    {
        return [
            'section_name.ar' => __('sections.Section_name_ar'),
            'section_name.en' => __('sections.Section_name_en'),
            'grade_id' => __('grades.grade_name'),
            'classroom_id' => __('classrooms.class_name'),
            'teacher_id' => __('teachers.Name_Teacher'),
        ];
    }
}
