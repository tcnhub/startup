<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfActividad
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('actividad')->check()) {
            return redirect()->route('actividad.dashboard');
        }
        return $next($request);
    }
}
