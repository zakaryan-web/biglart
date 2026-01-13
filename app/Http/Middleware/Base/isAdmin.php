<?php

namespace App\Http\Middleware\Base;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if($request->user() && $request->user()->hasRole(['admin.super', 'admin', 'moderator'])){
            return $next($request);
        }

        return redirect()->route('main.home.index');
    }
}
