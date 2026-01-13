<?php

namespace App\Http\Requests\Questions;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class newCommentRequest extends FormRequest
{
    public function rules(Request $request): array
    {
        return [
            'comment' => ['required', 'string'],
        ];
    }
}
