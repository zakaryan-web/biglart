<?php

namespace App\Http\Requests\Questions;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class awardRequest extends FormRequest
{
    public function rules(Request $request): array
    {
        return [
            'answer' => ['required', 'numeric', 'integer'],
            'liked' => ['sometimes', 'nullable', 'string', 'max:255'],
            'disliked' => ['sometimes', 'nullable', 'string', 'max:255'],
            'rating' => ['required', 'numeric', 'integer', Rule::in([1, 2, 3, 4, 5])],
        ];
    }
}
