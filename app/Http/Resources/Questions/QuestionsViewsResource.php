<?php

namespace App\Http\Resources\Questions;

use App\Models\QuestionsViews;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin QuestionsViews */
class QuestionsViewsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'question_id' => $this->question_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user_id' => $this->user_id,
            'id' => $this->id,
        ];
    }
}
