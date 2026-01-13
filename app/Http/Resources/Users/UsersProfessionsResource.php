<?php

namespace App\Http\Resources\Users;

use App\Http\Resources\Directions\DirectionsSpecializationsResource;
use App\Models\UsersProfessions;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin UsersProfessions */
class UsersProfessionsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'specialization' => new DirectionsSpecializationsResource($this->whenLoaded('specialization'))
        ];
    }
}
