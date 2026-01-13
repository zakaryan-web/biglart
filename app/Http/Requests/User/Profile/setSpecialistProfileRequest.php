<?php

namespace App\Http\Requests\User\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Users;

class setSpecialistProfileRequest extends FormRequest
{
    public function rules(Request $request): array
    {
        return [
            'age' => ['nullable', 'numeric', 'integer', 'min:18', 'max:100'],
            'experience' => ['nullable', 'numeric', 'integer', 'min:0', 'max:100'],
            'gender' => ['nullable', 'numeric', 'integer', Rule::in([0, 1, 2])],
            'first_name' => ['required', 'string', 'min:2', 'max:255', 'regex:/^[\p{Cyrillic}][\p{Cyrillic}0-9 \#]*$/u'],
            'last_name' => ['required', 'string', 'min:2', 'max:255', 'regex:/^[\p{Cyrillic}][\p{Cyrillic}0-9 \#]*$/u'],
            'middle_name' => ['required', 'string', 'min:2', 'max:255', 'regex:/^[\p{Cyrillic}][\p{Cyrillic}0-9 \#]*$/u'],
            'city' => ['sometimes', 'nullable', 'string', 'min:2', 'max:255', 'regex:/^[\p{Cyrillic}][\p{Cyrillic}0-9 \#]*$/u'],
            'about' => ['sometimes', 'nullable', 'string'],
            'specializations.*' => ['numeric', 'integer'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Users::class.',email,'.$request->user()->id],
        ];
    }
}
