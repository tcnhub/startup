<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AtraccionAuthenticate
{
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::guard('atraccion')->check()) {
            return redirect()->route('atraccion.login');
        }
        return $next($request);
    }
}
