<?php

namespace App\Http\Requests\students;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'name.ar' => ['required', 'string', 'max:255'],
            'name.en' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:students,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender_id' => ['required', 'exists:genders,id'],
            'nationality_id' => ['required', 'exists:nationalities,id'],
            'blood_type_id' => ['required', 'exists:type_bloods,id'],
            'date_birth' => ['required', 'date'],
            'grade_id' => ['required', 'exists:grades,id'],
            'classroom_id' => ['required', 'exists:classrooms,id'],
            'section_id' => ['required', 'exists:sections,id'],
            'parent_id' => ['required', 'exists:my_parents,id'],
            'academic_year' => ['required', 'integer'],
            'photos.*' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ];
    }


    public function attributes(): array
    {
        return [
            'name.ar' => __('students.name_ar'),
            'name.en' => __('students.name_en'),
            'email' => __('students.email'),
            'password' => __('students.password'),
            'gender_id' => __('students.gender'),
            'nationality_id' => __('students.Nationality'),
            'blood_type_id' => __('students.blood_type'),
            'date_birth' => __('students.Date_of_Birth'),
            'grade_id' => __('students.Grade'),
            'classroom_id' => __('students.classrooms'),
            'section_id' => __('students.section'),
            'parent_id' => __('students.parent'),
            'academic_year' => __('students.academic_year'),
            'photos.*' => 'الصور',
        ];
    }
}
