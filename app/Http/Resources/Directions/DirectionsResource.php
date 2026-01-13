<?php

namespace App\Http\Resources\Directions;

use App\Models\Directions;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Directions */
class DirectionsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'images' => $this->images,
            'specialisations' => DirectionsSpecializationsResource::collection($this->whenLoaded('specialisations')) ,
            'professions' => DirectionsProfessionsResource::collection($this->whenLoaded('professions')) ,
        ];
    }
}
