<?php

namespace App\Http\Resources\Directions;

use App\Models\DirectionsSpecializations;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin DirectionsSpecializations */
class DirectionsSpecializationsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'direction_id' => $this->direction_id,
            'direction' => new DirectionsResource($this->whenLoaded('direction'))
        ];
    }
}
