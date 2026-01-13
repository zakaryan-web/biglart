<?php

namespace App\Http\Requests\User\Files;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class deleteFileRequest extends FormRequest
{
    public function rules(Request $request): array
    {
        return [
            'id' => ['required', 'numeric', 'integer'],
        ];
    }
}
