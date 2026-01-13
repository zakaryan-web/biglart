<?php

namespace App\Http\Resources\Documents;

use App\Models\Documents;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Documents */
class DocumentsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'directory_id' => $this->directory_id,
            'url' => $this->url,
            'name' => $this->name,
            'description' => $this->description,
            'mimetype' => $this->mimetype,
            'extension' => $this->extension,
            'status' => $this->status,
        ];
    }
}
