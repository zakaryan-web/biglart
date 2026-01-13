<?php

namespace App\Facades;

use App\Services\LikeService;
use Illuminate\Support\Facades\Facade;

/**
 * @see LikeService
 */
class Like extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return LikeService::class;
    }
}
