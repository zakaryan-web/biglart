<?php

namespace App\Models;

use App\Models\Base\Documents as BaseDocuments;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Documents extends BaseDocuments
{
    public function directory(): BelongsTo
    {
        return $this->belongsTo(DocumentsDirectories::class, 'directory_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
}
