<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestauranteAuthenticate
{
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::guard('restaurante')->check()) {
            return redirect()->route('restaurante.login');
        }
        return $next($request);
    }
}
