<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\Questions\QuestionsResource;

/** @see \App\Models\Questions */
class QuestionsCollection extends ResourceCollection
{
    public $collects = QuestionsResource::class;

    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
        ];
    }
}
