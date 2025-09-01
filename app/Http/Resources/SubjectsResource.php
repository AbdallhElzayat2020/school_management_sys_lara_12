<?php

namespace App\Http\Resources;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubjectsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Subject $this ->resource */
        return [
            'id' => $this->id,
            'subject_name' => $this->name,
            'grade_name' => $this->grade->name,
            'classroom_name' => $this->classroom->class_name,
            'teacher_name' => $this->teacher->name,
            'created_by' => $this->teacher->name,
        ];
    }
}
