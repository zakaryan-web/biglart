<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RecoveryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', 'exists:App\Models\Users,email'],
        ];
    }
}
