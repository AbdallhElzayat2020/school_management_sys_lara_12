<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LibraryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'book_title' => $this->title,
            'file_name' => $this->file_name,
            'grade' => $this->grade->name,
            'classroom' => $this->classroom->class_name,
            'section' => $this->section->section_name,
            'created_by' => $this->teacher->name,
        ];
    }
}
