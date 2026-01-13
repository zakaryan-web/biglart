<?php

namespace App\Models;

use App\Models\Base\LanguageString as BaseLanguageString;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LanguageString extends BaseLanguageString
{

    public function language(): BelongsTo
    {
        return $this->BelongsTo(Language::class, 'language', 'key');
    }

    public function field(): BelongsTo
    {
        return $this->BelongsTo(LanguageFields::class, 'field_id', 'id');
    }
}
