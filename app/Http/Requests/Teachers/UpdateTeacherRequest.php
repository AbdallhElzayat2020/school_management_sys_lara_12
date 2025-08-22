<?php

namespace App\Http\Requests\Teachers;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherRequest extends FormRequest
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
        $id = $this->route('teacher');
        return [
            'email' => ['required', 'unique:teachers,email,' . $id, 'email', 'max:255'],
            'name.ar' => ['required', 'string', 'min:3', 'max:255'],
            'name.en' => ['required', 'string', 'min:3', 'max:255'],
            'password' => ['nullable', 'min:8', 'confirmed', 'max:255'],
            'password_confirmation' => ['nullable', 'required_with::password', 'min:8', 'max:255'],
            'join_date' => ['required', 'date'],
            'specialization_id' => ['required', 'exists:specializations,id'],
            'gender_id' => ['required', 'exists:genders,id'],
            'address' => ['required', 'string'],
        ];
    }


    /*
    * Get the custom attributes for the request.
    */
    public function attributes(): array
    {
        return [
            'join_date' => trans('teachers.Joining_Date'),
            'specialization_id' => trans('teachers.specialization'),
            'gender_id' => trans('teachers.Gender'),
            'address' => trans('teachers.Address'),
            'password' => trans('teachers.Password'),
            'password_confirmation' => trans('teachers.password_confirmation'),
            'name.ar' => trans('teachers.Name_ar'),
            'name.en' => trans('teachers.Name_en'),
            'email' => trans('teachers.Email'),
        ];
    }
}
