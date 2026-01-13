<?php

use App\Http\Middleware\HandleInertiaRequests;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Middleware\AddLinkHeadersForPreloadedAssets;
use App\Http\Middleware\Base\isAdmin;
use App\Http\Middleware\Base\isUser;
use App\Http\Middleware\Base\isBan;
use App\Http\Middleware\Base\isSpecialist;
use App\Http\Middleware\Base\isClient;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Http\Request;
use Inertia\Inertia;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/Web/Web.php',
        api: __DIR__.'/../routes/Api/Api.php',
        commands: __DIR__ . '/../routes/Console/Console.php',
        channels: __DIR__ . '/../routes/Channels/Channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            HandleInertiaRequests::class,
            AddLinkHeadersForPreloadedAssets::class,
        ])->alias([
            'isAdmin' => isAdmin::class,
            'isUser' => isUser::class,
            'isBan' => isBan::class,
            'isSpecialist' => isSpecialist::class,
            'isClient' => isClient::class
        ]);
        $middleware->validateCsrfTokens(except: [
            'servers/hook',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(fn( HttpException $exception, Request $request) => Inertia::location('/errors/'.$exception->getStatusCode()));
    })->create();
