<?php

namespace App\Http\Controllers\Agencia;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('agencia.dashboard');
    }
}
