<?php

namespace App\Http\Resources\Users\Collection;

use App\Http\Resources\Users\UsersProfessionsResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/** @see \App\Models\UsersProfessions */
class UsersProfessionsCollection extends ResourceCollection
{
    public $collects = UsersProfessionsResource::class;

    public function toArray(Request $request): array
    {
        return $this->collection->toArray();
    }
}
