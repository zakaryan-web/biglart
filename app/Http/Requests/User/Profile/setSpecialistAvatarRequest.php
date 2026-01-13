<?php

namespace App\Http\Requests\User\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;
use App\Models\Users;

class setSpecialistAvatarRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'avatar' => ['required', 'file', 'extensions:jpg,jpeg,png', 'mimes:jpg,jpeg,png', 'max:4096'],
        ];
    }
}
