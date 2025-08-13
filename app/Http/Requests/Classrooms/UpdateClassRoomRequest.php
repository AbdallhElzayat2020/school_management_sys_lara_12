<?php

namespace App\Http\Requests\Classrooms;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClassRoomRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'class_name.ar' => ['sometimes', 'required', 'string', 'max:100', 'min:3'],
            'class_name.en' => ['sometimes', 'required', 'string', 'max:100', 'min:3'],
            'grade_id' => ['required', 'exists:grades,id'],
            'status' => ['sometimes', 'in:active,inactive'],
        ];
    }

    public function attributes(): array
    {
        return [
            'class_name.ar' => __('classrooms.class_name_ar'),
            'class_name.en' => __('classrooms.class_name_en'),
            'grade_id' => __('classrooms.grade_name'),
            'status' => __('classrooms.status'),
        ];
    }

    /**
     * Get custom validation messages for the request.
     */
    public function messages(): array
    {
        return [
            'class_name.ar.required' => __('validation.required', ['attribute' => __('classrooms.class_name_ar')]),
            'class_name.en.required' => __('validation.required', ['attribute' => __('classrooms.class_name_en')]),
            'grade_id.required' => __('validation.required', ['attribute' => __('classrooms.grade_name')]),
            'status.in' => __('validation.in', ['attribute' => __('classrooms.status')]),
        ];
    }
}
