<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\Questions\QuestionsAnswersResource;

/** @see \App\Models\QuestionsAnswers */
class QuestionsAnswersCollection extends ResourceCollection
{
    public $collects = QuestionsAnswersResource::class;

    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
        ];
    }
}
