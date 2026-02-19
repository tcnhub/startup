<?php

namespace App\Http\Controllers\Actividad;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::guard('actividad')->user();
        return view('actividad.dashboard', compact('user'));
    }
}
