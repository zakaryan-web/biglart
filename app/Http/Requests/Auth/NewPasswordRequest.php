<?php

namespace App\Http\Requests\Auth;
use Illuminate\Validation\Rules\Password;

use Illuminate\Foundation\Http\FormRequest;

class NewPasswordRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'token' => ['required'],
            'email' => ['required', 'email', 'exists:App\Models\Users,email'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ];
    }
}
