<?php

namespace App\Http\Resources\Users;

use App\Http\Resources\Documents\Collection\DocumentsCollection;
use App\Models\Users;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Users\Collection\UsersProfessionsCollection;

/** @mixin Users */
class UsersResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'online' => $this->actions_at && Carbon::parse($this->actions_at) >= Carbon::now()->subMinute(5),
            'personal' => new UsersPersonalResource($this->whenLoaded('personal')),
            'professions' => new UsersProfessionsCollection($this->whenLoaded('professions')),
            'documents' => $this->when($this->hasRole('specialist'), new DocumentsCollection($this->whenLoaded('documents'))),
            'email' => $this->when(($request->user() && $request->user()->id == $this->id), $this->email),
            'actions_at' => $this->actions_at,
        ];
    }
}
