<?php

namespace App\Facades;

use App\Services\ViewService;
use Illuminate\Support\Facades\Facade;

/**
 * @see ViewService
 */
class View extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ViewService::class;
    }
}
