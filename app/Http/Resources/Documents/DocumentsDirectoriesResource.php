<?php

namespace App\Http\Resources\Documents;

use App\Models\DocumentsDirectories;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin DocumentsDirectories */
class DocumentsDirectoriesResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'name' => $this->name,
            'description' => $this->description,
            'parent_id' => $this->parent_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
