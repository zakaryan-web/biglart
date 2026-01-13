<?php

namespace App\Http\Middleware\Base;

use Closure;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class isBan
{
    public function handle(Request $request, Closure $next)
    {
        if($request->user() && ($request->user()->hasRole(['user.ban']) && !$request->user()->hasRole(['admin.super']))){
            return Inertia::render('Ban');
        }

        return $next($request);
    }
}
