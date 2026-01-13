<?php

namespace App\Http\Middleware\Base;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class isClient
{
    public function handle(Request $request, Closure $next): Response
    {
        if($request->user() && $request->user()->hasRole(['client'])){
            return $next($request);
        }
        return redirect()->route('main.home.index');
    }
}
