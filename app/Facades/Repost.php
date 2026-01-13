<?php

namespace App\Facades;

use App\Services\RepostService;
use Illuminate\Support\Facades\Facade;

/**
 * @see RepostService
 */
class Repost extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return RepostService::class;
    }
}
