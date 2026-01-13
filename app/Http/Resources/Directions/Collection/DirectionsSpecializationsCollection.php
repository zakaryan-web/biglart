<?php

namespace App\Http\Resources\Directions\Collection;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\Directions\DirectionsSpecializationsResource;

/** @see \App\Models\DirectionsSpecializations */
class DirectionsSpecializationsCollection extends ResourceCollection
{
    public $collects = DirectionsSpecializationsResource::class;
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
        ];
    }
}
