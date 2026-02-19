<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuiaAuthenticate
{
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::guard('guia')->check()) {
            return redirect()->route('guia.login');
        }
        return $next($request);
    }
}
