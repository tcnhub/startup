<?php

namespace App\Http\Controllers\Restaurante;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::guard('restaurante')->user();
        return view('restaurante.dashboard', compact('user'));
    }
}
