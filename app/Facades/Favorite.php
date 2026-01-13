<?php

namespace App\Facades;

use App\Services\FavoriteService;
use Illuminate\Support\Facades\Facade;

/**
 * @see FavoriteService
 */
class Favorite extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return FavoriteService::class;
    }
}
