<?php

namespace App\Http\Resources\Questions;

use App\Models\QuestionsTags;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin QuestionsTags */
class QuestionsTagsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'tag_id' => $this->tag_id,
        ];
    }
}
