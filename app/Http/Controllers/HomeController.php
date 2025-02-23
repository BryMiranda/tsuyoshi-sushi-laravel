<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Muestra la página principal (Home) para usuarios autenticados.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Puedes pasar datos a la vista si lo necesitas
        return view('home', [
            'user' => Auth::user(),
        ]);
    }
}
