<?php

namespace App\Http\Resources\Documents\Collection;

use App\Http\Resources\Documents\DocumentsResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/** @see \App\Models\UsersProfessions */
class DocumentsCollection extends ResourceCollection
{
    public $collects = DocumentsResource::class;

    public function toArray(Request $request): array
    {
        return $this->collection->toArray();
    }
}
