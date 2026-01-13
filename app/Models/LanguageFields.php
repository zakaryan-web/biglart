<?php

namespace App\Models;

use App\Models\Base\LanguageFields as BaseLanguageFields;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LanguageFields extends BaseLanguageFields
{
    public function string(): HasMany
    {
        return $this->hasMany(LanguageString::class, 'field_id', 'id');
    }
}
