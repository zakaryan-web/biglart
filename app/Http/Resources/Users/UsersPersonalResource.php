<?php

namespace App\Http\Resources\Users;

use App\Models\UsersPersonal;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin UsersPersonal */
class UsersPersonalResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'avatar' => $this->avatar,
            'nick_name' => $this->nick_name,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'middle_name' => $this->middle_name,
            'age' => $this->age,
            'about' => $this->about,
            'experience' => $this->experience,
            'city' => $this->city,
            'gender' => $this->gender,
            'rating' => $this->rating,
        ];
    }
}
