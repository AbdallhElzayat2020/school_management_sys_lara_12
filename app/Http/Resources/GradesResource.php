<?php

namespace App\Http\Resources;

use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GradesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Grade $this ->resource */
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
