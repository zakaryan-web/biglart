<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use App\Services\SettingService;

/**
 * @see \App\Services\SettingService
 */
class Setting extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return SettingService::class;
    }
}
