<?php

namespace App\Models;

use App\Models\Base\DocumentsDirectories as BaseDocumentsDirectories;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DocumentsDirectories extends BaseDocumentsDirectories
{
    public function parent(): BelongsTo
    {
        return $this->belongsTo(DocumentsDirectories::class, 'parent_id', 'id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(DocumentsDirectories::class, 'parent_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Documents::class, 'directory_id');
    }
}
