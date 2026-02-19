<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelAuthenticate
{
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::guard('hotel')->check()) {
            return redirect()->route('hotel.login');
        }
        return $next($request);
    }
}
