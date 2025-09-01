<?php

namespace App\Http\Resources;

use App\Models\Quizze;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuizzesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Quizze $this ->resource */
        return [
            'quiz_name' => $this->name,
            'subject_name' => $this->subject->name,
            'grade_name' => $this->grade->name,
            'classroom_name' => $this->classroom->class_name,
            'section_name' => $this->section->section_name,
            'teacher_name' => $this->teacher->name,
            'created_by' => $this->teacher->name,
        ];
    }
}
