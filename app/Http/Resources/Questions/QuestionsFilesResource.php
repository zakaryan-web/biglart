<?php

namespace App\Http\Resources\Questions;

use App\Models\QuestionsFiles;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin QuestionsFiles */
class QuestionsFilesResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'url' => $this->url,
            'description' => $this->description,
            'mimetype' => $this->mimetype,
            'extension' => $this->extension,
            'status' => $this->status,
        ];
    }
}
