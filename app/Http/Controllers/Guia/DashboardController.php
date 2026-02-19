<?php

namespace App\Http\Controllers\Guia;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::guard('guia')->user();
        return view('guia.dashboard', compact('user'));
    }
}
