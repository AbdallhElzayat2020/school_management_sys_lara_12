<?php

namespace App\Http\Resources;

use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExamsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Exam $this ->resource */
        return [
            'exam_name' => $this->name,
            'term' => $this->term,
            'academic_date' => $this->academic_date,
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
