<?php

namespace App\Http\Resources\Tags;

use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Tags */
class TagsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
        ];
    }
}
