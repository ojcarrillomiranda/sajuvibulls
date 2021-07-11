<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospitalizacion;
use App\HistoriaClinica;
use App\User;
use App\Paciente;
use App\PermisoUser;
use App\Persona;


class HospitalizacionController extends Controller
{
   
    public function index()
    {
        $historias = HistoriaClinica::where('estado', 'hospitalizado')->get();
        $permisos = PermisoUser::all();
        $usuarioss = User::count();
        $pacientess = Paciente::count();
        $historiass = HistoriaClinica::count();
        return view('hospitalizaciones.index')->with('historias', $historias)
                                              ->with('usuarioss', $usuarioss)
                                              ->with('pacientess', $pacientess)
                                              ->with('historiass', $historiass)
                                              ->with('permisos', $permisos);
    }

   
    public function create()
    {
        $historias = Hospitalizacion::all();
        $permisos = PermisoUser::all();
        $usuarioss = User::count();
        $pacientess = Paciente::count();
        $historiass = HistoriaClinica::count();
        return view('hospitalizaciones.create')->with('historias', $historias)
                                              ->with('usuarioss', $usuarioss)
                                              ->with('pacientess', $pacientess)
                                              ->with('historiass', $historiass)
                                              ->with('permisos', $permisos);
    }

   
    public function store(Request $request)
    {
        Hospitalizacion::create($request->all());
        return redirect()->route('hospitalizaciones.index')->with('hospitalizacion', 'ok');
    }

  
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $permisos = PermisoUser::all();
        $historia = HistoriaClinica::find($id);
        $paciente = Paciente::all();
        $persona = Persona::all();
        $medico = PermisoUser::where('permiso_id', 2)->get();
        $usuarioss = User::count();
        $pacientes = Paciente::count();
        $historiass = HistoriaClinica::count();
        return view('hospitalizaciones.edit')->with('pacientes', $paciente)
                                       ->with('personas', $persona)
                                       ->with('medicos', $medico)
                                       ->with('historia', $historia)
                                       ->with('usuarioss', $usuarioss)
                                       ->with('pacientess', $pacientes)
                                       ->with('permisos', $permisos)
                                       ->with('historiass', $historiass);
    }

    public function update(Request $request, $id)
    {
        //
    }

 
    public function destroy($id)
    {
        //
    }
}
