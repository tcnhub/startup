<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAtraccion
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('atraccion')->check()) {
            return redirect()->route('atraccion.dashboard');
        }
        return $next($request);
    }
}
