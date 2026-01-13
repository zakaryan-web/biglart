<?php

namespace App\Http\Resources\Questions;

use App\Models\QuestionsAnswers;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Users\UsersResource;
use App\Http\Resources\QuestionsCommentsCollection;

/** @mixin QuestionsAnswers */
class QuestionsAnswersResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->whenHas('id'),
            'selected' => $this->whenHas('selected'),
            'answer' => $this->whenHas('answer'),
            'user' => new UsersResource($this->whenLoaded('user')),
            'updated_at' => $this->whenHas('created_at'),
            'stat' => [
                'likes_count' => $this->whenCounted('likes'),
                'comments_count' => $this->whenCounted('comments'),
            ],
            'comments' => new QuestionsCommentsCollection($this->whenLoaded('comments')),
        ];
    }
}
