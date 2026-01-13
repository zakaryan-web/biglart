<?php

namespace App\Http\Resources\Questions;

use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Users\UsersResource;
use App\Http\Resources\Directions\DirectionsResource;
use App\Http\Resources\Directions\DirectionsSpecializationsResource;
use App\Http\Resources\QuestionsFilesCollection;
use App\Http\Resources\QuestionsAnswersCollection;
use App\Http\Resources\QuestionsTagsCollection;

/** @mixin Questions */
class QuestionsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user' => new UsersResource($this->whenLoaded('user')),
            'direction' => [
                'id' => $this->whenHas('direction_id'),
                'direction' => new DirectionsResource($this->whenLoaded('direction'))
            ],
            'specialization' => [
                'id' => $this->whenHas('specialization_id'),
                'specialization' => new DirectionsSpecializationsResource($this->whenLoaded('specialization'))
            ],
            'question' => $this->whenHas('question'),
            'description' => $this->whenHas('description'),
            'award' => $this->whenHas('award'),
            'status' => $this->whenHas('status'),
            'stat' => [
                'answers_count' => $this->whenCounted('answers'),
                'likes_count' => $this->whenCounted('likes'),
                'reposts_count' => $this->whenCounted('reposts'),
                'favorites_count' => $this->whenCounted('favorites'),
                'views_count' => $this->whenCounted('views')
            ],
            'answers' => new QuestionsAnswersCollection($this->whenLoaded('answers')),
            'files' => new QuestionsFilesCollection($this->whenLoaded('files')),
            'tags' => new QuestionsTagsCollection($this->whenLoaded('tags')),
            'publish_at' => $this->whenHas('publish_at'),
        ];
    }
}
