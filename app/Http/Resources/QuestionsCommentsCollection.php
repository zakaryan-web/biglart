<?php

namespace App\Http\Resources;

use App\Http\Resources\Questions\QuestionsCommentsResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/** @see \App\Models\QuestionsComments */
class QuestionsCommentsCollection extends ResourceCollection
{
    public $collects = QuestionsCommentsResource::class;

    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
        ];
    }
}
