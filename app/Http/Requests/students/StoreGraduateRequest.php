<?php

namespace App\Http\Requests\students;

use Illuminate\Foundation\Http\FormRequest;

class StoreGraduateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'grade_id' => 'required|exists:grades,id',
            'classroom_id' => 'required|exists:classrooms,id',
            'section_id' => 'required|exists:sections,id',
        ];
    }

    public function attributes(): array
    {
        return [
            'grade_id' => __('students.Grade'),
            'classroom_id' => __('students.classrooms'),
            'section_id' => __('students.section'),
        ];
    }
}
