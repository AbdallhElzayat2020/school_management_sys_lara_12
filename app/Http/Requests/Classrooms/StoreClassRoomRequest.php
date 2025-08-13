<?php

namespace App\Http\Requests\Classrooms;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassRoomRequest extends FormRequest
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
            'List_Classes' => ['required', 'array', 'min:1'],
            'List_Classes.*.ar' => ['required', 'string', 'max:100', 'min:3'],
            'List_Classes.*.en' => ['required', 'string', 'max:100', 'min:3'],
            'List_Classes.*.grade_id' => ['required', 'exists:grades,id'],
        ];
    }

    public function attributes(): array
    {
        return [
            'List_Classes' => __('classrooms.classes_list'),
            'List_Classes.*.ar' => __('classrooms.class_name_ar'),
            'List_Classes.*.en' => __('classrooms.class_name_en'),
            'List_Classes.*.grade_id' => __('classrooms.grade_name'),
        ];
    }
}
