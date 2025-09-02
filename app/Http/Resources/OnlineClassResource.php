<?php

namespace App\Http\Resources;

use App\Models\OnlineClass;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OnlineClassResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var OnlineClass $this ->resource */

        return [
            'id' => $this->id,
            'grade_name' => $this->grade->name,
            'classroom_name' => $this->classroom->class_name,
            'section_name' => $this->section->section_name,
        ];
    }
}
