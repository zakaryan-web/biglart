<?php

namespace App\Http\Requests\User\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;
use App\Models\Users;

class setPasswordRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'password' => ['required', 'confirmed', Password::defaults()],
        ];
    }
}
