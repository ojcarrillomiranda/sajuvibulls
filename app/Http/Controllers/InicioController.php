<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\PermisoUser;
use App\Paciente;
use App\HistoriaClinica;

class InicioController extends Controller
{
    public function inicio(){
        $permisos = PermisoUser::all();
        $usuarioss = User::count();
        $pacientes = Paciente::count();
        $historiass = HistoriaClinica::count();
        return view('inicio')->with('usuarioss', $usuarioss)
                             ->with('pacientess', $pacientes)
                             ->with('historiass', $historiass)
                             ->with('permisos', $permisos);
    }


}
