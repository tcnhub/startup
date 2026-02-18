<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgenciaAuthenticate
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('agencia')->check()) {
            return redirect()->route('agencia.login');
        }

        return $next($request);
    }
}
