<?php

namespace App\Http\Resources\Directions;

use App\Models\DirectionsProfessions;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin DirectionsProfessions */
class DirectionsProfessionsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'direction_id' => $this->direction_id,
            'specialization_id' => $this->specialization_id,
        ];
    }
}
