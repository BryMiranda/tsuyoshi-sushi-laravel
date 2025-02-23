<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Muestra el dashboard para el usuario autenticado.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard', ['user' => Auth::user()]);
    }
}
