<?php

namespace App\Http\Requests\User\Questions;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class setQuestionRequest extends FormRequest
{
    public function rules(Request $request): array
    {
        return [
            'id' => ['nullable', 'numeric', 'integer'],
            'question' => ['required', 'string', 'min:5', 'max:255'],
            'description' => ['required', 'string', 'min:50'],
            'direction_id' => ['required', 'numeric', 'integer', 'min:1'],
            'specialization_id' => ['required', 'numeric', 'integer', 'min:1'],
            'award' => ['nullable', 'numeric'],
        ];
    }
}
