<?php

namespace App\Http\Requests\Questions;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class newAnswerRequest extends FormRequest
{
    public function rules(Request $request): array
    {
        return [
            'answer' => ['required', 'string'],
        ];
    }
}
