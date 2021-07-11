<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Raza;
use App\Sexo;
use App\Especie;
use App\Paciente;
use App\Persona;
use App\HistoriaClinica;
use App\User;
use App\PermisoUser;
use PDF;
use App\Http\Requests\StorePacientesFormRequest;

class PacientesController extends Controller
{

    public function index()
    {
        $permisos = PermisoUser::all();
        $paciente = Paciente::all();
        $usuarioss = User::count();
        $pacientes = Paciente::count();
        $historiass = HistoriaClinica::count();
        return view('pacientes.index')->with('pacientes', $paciente)
                             ->with('usuarioss', $usuarioss)
                             ->with('pacientess', $pacientes)
                             ->with('permisos', $permisos)
                             ->with('historiass', $historiass);
    }

    public function create()
    {
        if (Auth::user()->hasPermiso('general')) {
            return redirect()->route('pacientes.index');
        }
        $permisos = PermisoUser::all();
        $razas = Raza::all();
        $especie = Especie::all();
        $sexo = Sexo::all();
        $usuarioss = User::count();
        $pacientes = Paciente::count();
        $historiass = HistoriaClinica::count();
      return view('pacientes.create')->with('razas', $razas)
                                     ->with('especies', $especie)
                                     ->with('sexos', $sexo)
                                     ->with('usuarioss', $usuarioss)
                                     ->with('permisos', $permisos)
                             ->with('pacientess', $pacientes)
                             ->with('historiass', $historiass);
    }


    public function store(StorePacientesFormRequest $request)
    {
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $foto = time() . $file->getClientOriginalName();
            $file->move("images/pacientes", $foto);
        }
        $persona = new Persona();
        $persona->documento = $request->documento;
        $persona->primer_nombre = $request->primer_nombre;
        $persona->segundo_nombre = $request->segundo_nombre;
        $persona->primer_apellido = $request->primer_apellido;
        $persona->segundo_apellido = $request->segundo_apellido;
        $persona->telefono = $request->telefono;
        $persona->direccion = $request->direccion;
        $persona->email = $request->email;
        $personas = Persona::where('documento',$request->documento)->first();

        if ($personas == null ) {

            $persona->save();
        }

        $paciente = new Paciente();
        $paciente->nombre = $request->nombre;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->especie_id = $request->especie;
        $paciente->sexo_id = $request->sexo;
        $paciente->raza_id = $request->raza;
        $paciente->peso = $request->peso;
        $paciente->foto = $foto;
        $paciente->representante_documento = $request->documento;
        $paciente->save();


        return redirect()->route('pacientes.create')->with('guardar','bien');
    }


    public function show($id)
    {
        $permisos = PermisoUser::all();
        $paciente = Paciente::find($id);
        $usuarioss = User::count();
        $pacientes = Paciente::count();
        $historiass = HistoriaClinica::count();
        return view('pacientes.show')->with('paciente', $paciente)
        ->with('usuarioss', $usuarioss)
                             ->with('pacientess', $pacientes)
                             ->with('permisos', $permisos)
                             ->with('historiass', $historiass);
    }

    public function edit($id)
    {
        $permisos = PermisoUser::all();
        $paciente = Paciente::find($id);
         $persona = Persona::all();
         $razas = Raza::all();
         $especie = Especie::all();
         $sexo = Sexo::all();
         $usuarioss = User::count();
         $pacientes = Paciente::count();
         $historiass = HistoriaClinica::count();
        return view('pacientes.edit')->with('razas', $razas)
                                     ->with('paciente', $paciente)
                                     ->with('especies', $especie)
                                     ->with('sexos', $sexo)
                                     ->with('usuarioss', $usuarioss)
                                     ->with('permisos', $permisos)
                             ->with('pacientess', $pacientes)
                             ->with('historiass', $historiass);
    }


    public function update(Request $request, $id)
    {
        $paciente = Paciente::find($id);
        $persona = Persona::where('documento',$request->documento)->first();

        $persona->documento = $request->documento;
        $persona->primer_nombre = $request->primer_nombre;
        $persona->segundo_nombre = $request->segundo_nombre;
        $persona->primer_apellido = $request->primer_apellido;
        $persona->segundo_apellido = $request->segundo_apellido;
        $persona->telefono = $request->telefono;
        $persona->direccion = $request->direccion;
        $persona->email = $request->email;
        $persona->save();

        $paciente->nombre = $request->nombre;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->especie_id = $request->especie;
        $paciente->sexo_id = $request->sexo;
        $paciente->raza_id = $request->raza;
        $paciente->peso = $request->peso;
        $paciente->representante_documento = $request->documento;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $foto = $paciente->foto;
            $file->move("images/pacientes", $foto);
        }
        $paciente->save();

        return redirect()->route('pacientes.index')->with('actualizar-paciente','ok');
    }

    public function destroy($id)
    {
        $paciente = Paciente::find($id);
        $paciente->delete();
        File::delete('images/pacientes/'. $paciente->foto);
        return redirect()->route('pacientes.index')->with('eliminar', 'ok');
    }

    public function pacientesPDF(){
        $pacientes = Paciente::all();
        $numero = Paciente::count();
        $pdf = PDF::loadView('pacientes.pacientespdf', compact('pacientes', 'numero'));
        return $pdf->setPaper('a4','landscape')->stream('Pacientes.pdf');

    }
    public function pacientesidPDF($id){
        $paciente = Paciente::find($id);
        $pdf = PDF::loadView('pacientes.pacienteidpdf', compact('paciente'));
        return $pdf->stream('Pacientes.pdf');

    }
}
