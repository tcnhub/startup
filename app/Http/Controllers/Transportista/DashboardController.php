<?php

namespace App\Http\Controllers\Transportista;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::guard('transportista')->user();
        return view('transportista.dashboard', compact('user'));
    }
}
