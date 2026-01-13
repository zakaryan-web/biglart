<?php

namespace App\Http\Resources\Questions;

use App\Http\Resources\Users\UsersResource;
use App\Models\QuestionsComments;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin QuestionsComments */
class QuestionsCommentsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user' => new UsersResource($this->whenLoaded('user')),
            'text' => $this->text,
            'updated_at' => $this->updated_at,
        ];
    }
}
