<?php

namespace App\Models;

use App\Models\Base\Language as BaseLanguage;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Language extends BaseLanguage
{
    public function string(): HasMany
    {
        return $this->hasMany(LanguageString::class, 'language', 'key');
    }
}
