<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        $request->user()->authorizePermisos(['user', 'administrador', 'medico', 'general']);
        return view('/');
    }
}
