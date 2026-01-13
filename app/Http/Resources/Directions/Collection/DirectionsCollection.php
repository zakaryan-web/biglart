<?php

namespace App\Http\Resources\Directions\Collection;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\Directions\DirectionsResource;

/** @see \App\Models\Directions */
class DirectionsCollection extends ResourceCollection
{
    public $collects = DirectionsResource::class;
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
        ];
    }
}
