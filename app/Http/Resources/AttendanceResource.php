<?php

namespace App\Http\Resources;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Attendance $this ->resource */
        return [
            'id' => $this->id,
            'student_name' => $this->student->name,
            'grade_name' => $this->grade->name,
            'classroom_name' => $this->classroom->name,
            'section_name' => $this->section->name,
            'teacher_name' => $this->teacher->name,
            'attendance_date' => $this->attendance_date,
            'status' => $this->status,
        ];
    }
}
