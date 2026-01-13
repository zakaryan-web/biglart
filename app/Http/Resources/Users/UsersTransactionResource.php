<?php

namespace App\Http\Resources\Users;

use App\Models\UsersTransaction;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin UsersTransaction */
class UsersTransactionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'sum' => $this->sum,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user_id' => $this->user_id,
            'status' => $this->status,
            'id' => $this->id,
            'type' => $this->type,
        ];
    }
}
