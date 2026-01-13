<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;
use App\Models\Users;

class RegistrationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'type' => ['required', 'numeric', 'integer', Rule::in([1, 2])],
            'accept_doc' => ['required', 'accepted'],
            'accept_spam' => ['required', 'accepted'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Users::class],
            'password' => ['required', 'confirmed', Password::defaults()],
        ];
    }
}
