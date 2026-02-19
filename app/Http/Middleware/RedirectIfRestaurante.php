<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfRestaurante
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('restaurante')->check()) {
            return redirect()->route('restaurante.dashboard');
        }
        return $next($request);
    }
}
