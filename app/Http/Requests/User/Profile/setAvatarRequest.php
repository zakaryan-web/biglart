<?php

namespace App\Http\Requests\User\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;
use App\Models\Users;

class setAvatarRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'avatar' => ['required', 'numeric', 'integer', 'min:1', 'max:23'],
        ];
    }
}
