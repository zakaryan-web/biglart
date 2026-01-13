<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\Questions\QuestionsTagsResource;

/** @see \App\Models\QuestionsTags */
class QuestionsTagsCollection extends ResourceCollection
{
    public $collects = QuestionsTagsResource::class;

    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
        ];
    }
}
