<?php

namespace App\Http\Resources\Users;

use App\Models\UsersSocial;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin UsersSocial */
class UsersSocialResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'vk_id' => $this->vk_id,
            'tg_id' => $this->tg_id,
            'google_id' => $this->google_id,
            'yandex_id' => $this->yandex_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'user_id' => $this->user_id,

            'user' => new UsersResource($this->whenLoaded('user')),
        ];
    }
}
