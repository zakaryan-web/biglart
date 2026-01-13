<?php

namespace App\Http\Resources\Users;

use App\Models\UsersFavorites;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin UsersFavorites */
class UsersFavoritesResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'object_id' => $this->object_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user_id' => $this->user_id,
            'id' => $this->id,
            'type' => $this->type,
        ];
    }
}
