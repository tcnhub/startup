<?php

namespace App\Http\Controllers\Atraccion;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::guard('atraccion')->user();
        return view('atraccion.dashboard', compact('user'));
    }
}
