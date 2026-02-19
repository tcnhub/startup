<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransportistaAuthenticate
{
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::guard('transportista')->check()) {
            return redirect()->route('transportista.login');
        }
        return $next($request);
    }
}
