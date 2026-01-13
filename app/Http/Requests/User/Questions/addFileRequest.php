<?php

namespace App\Http\Requests\User\Questions;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class addFileRequest extends FormRequest
{
    public function rules(Request $request): array
    {
        return [
            'id' => ['sometimes', 'nullable', 'numeric', 'integer'],
            'file' => ['required', 'file', 'extensions:jpg,jpeg,png,txt,pdf,doc,docx,xls,xlsx', 'mimes:jpg,jpeg,png,txt,pdf,doc,docx,xls,xlsx', 'max:4096'],
        ];
    }
}
