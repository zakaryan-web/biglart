<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use App\Services\LanguageService;

/**
 * @see \App\Services\LanguageService
 */
class Language extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return LanguageService::class;
    }
}
