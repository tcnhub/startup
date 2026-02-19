<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfHotel
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('hotel')->check()) {
            return redirect()->route('hotel.dashboard');
        }
        return $next($request);
    }
}
