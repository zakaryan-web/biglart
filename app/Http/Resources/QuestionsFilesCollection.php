<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\Questions\QuestionsFilesResource;

/** @see \App\Models\QuestionsFiles */
class QuestionsFilesCollection extends ResourceCollection
{
    public $collects = QuestionsFilesResource::class;

    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
        ];
    }
}
