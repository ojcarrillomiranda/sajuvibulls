<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreHistoriasFormRequest;
use App\Paciente;
use App\Persona;
use App\User;
use App\PermisoUser;
use App\HistoriaClinica;
use App\TipoConsulta;
use PDF;


class HistoriasClinicasController extends Controller
{

    public function index()
    {
        $permisos = PermisoUser::all();
        $historia = HistoriaClinica::all();
        $usuarioss = User::count();
        $pacientes = Paciente::count();
        $historiass = HistoriaClinica::count();

        return view('historias.index')->with('historias',$historia)
                                      ->with('usuarioss', $usuarioss)
                                      ->with('pacientess', $pacientes)
                                      ->with('permisos', $permisos)
                                      ->with('historiass', $historiass);;
    }


    public function create()
    {
        if (Auth::user()->hasPermiso('general')) {
            return redirect()->route('historias.index');
        }
        $permisos = PermisoUser::all();
        $paciente = Paciente::all();
        $persona = Persona::all();
        $consulta = TipoConsulta::all();
        $medico = PermisoUser::where('permiso_id', 2)->get();
        $usuarioss = User::count();
        $pacientes = Paciente::count();
        $historiass = HistoriaClinica::count();

        return view('historias.create')->with('pacientes', $paciente)
                                       ->with('personas', $persona)
                                       ->with('medicos', $medico)
                                       ->with('tipo_consultas', $consulta)
                                       ->with('usuarioss', $usuarioss)
                                       ->with('permisos', $permisos)
                                       ->with('pacientess', $pacientes)
                                       ->with('historiass', $historiass);;
    }


    public function store(StoreHistoriasFormRequest $request)
    {
        HistoriaClinica::create($request->all());

        return redirect()->route('historias.create')->with('guardar', 'ok');
    }

    public function show($id)
    {
        $permisos = PermisoUser::all();
        $pacientes = Paciente::all();
        $historia = HistoriaClinica::find($id);
        $usuarioss = User::count();
        $pacientess = Paciente::count();
        $historiass = HistoriaClinica::count();

        return view('historias.show')->with('historia', $historia)
                                     ->with('pacientes', $pacientes)
                                     ->with('usuarioss', $usuarioss)
                                     ->with('permisos', $permisos)
                             ->with('pacientess', $pacientess)
                             ->with('historiass', $historiass);;

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
       return view('historias.edit')->with('pacientes', $paciente)
                                      ->with('personas', $persona)
                                      ->with('medicos', $medico)
                                      ->with('historia', $historia)
                                      ->with('usuarioss', $usuarioss)
                                      ->with('pacientess', $pacientes)
                                      ->with('permisos', $permisos)
                                      ->with('historiass', $historiass);
    }


    public function update(Request $request, HistoriaClinica $historia)
    {
        $historia->update($request->all());

        return redirect()->route('historias.index')->with('actualizar-historia',
        'ok');
    }


    public function destroy($id)
    {
        $historia = HistoriaClinica::find($id);
        $historia->delete();

        return redirect()->route('historias.index')->with('eliminar', 'ok');
    }

    public function historiasPDF(){
        $historias = HistoriaClinica::all();
        $numero = HistoriaClinica::count();
        $pdf = PDF::loadView('historias.historiasPDF', compact('historias','numero'));
        return $pdf->setPaper('a4', 'landscape')->stream('HistoriasClinicas.pdf');
    }

    public function historiaidPDF($id){
        $historia = HistoriaClinica::find($id);
        $pacientes = Paciente::all();
        $pdf = PDF::loadView('historias.historiaidpdf', compact('historia', 'pacientes'));
        return $pdf->stream('Historia Clinica.pdf');
    }

    public function informeFecha(Request $request){
        $permisos = PermisoUser::all();
        $usuarioss = User::count();
        $pacientes = Paciente::count();
        $historiass = HistoriaClinica::count();
        $tipoConsulta = HistoriaClinica::where('tipo_consulta_id', 2)->count();
        return view('historias.informes.fecha') ->with('usuarioss', $usuarioss)
        ->with('pacientess', $pacientes)
        ->with('permisos', $permisos)
        ->with('tipoConsulta',  $tipoConsulta)
        ->with('historiass', $historiass);
        $tipoConsulta = HistoriaClinica::where('tipo_consulta_id', 2)->count();
    }

    public function informeFechaPDF(Request $request){

        $permisos = PermisoUser::all();
        $informes = HistoriaClinica::whereBetween('created_at',[$request->fechai,$request->fechaf])->get();
        $numero = HistoriaClinica::whereBetween('created_at',[$request->fechai,$request->fechaf])->count();

        $pdf = PDF::loadView('historias.informes.historia-fecha', compact('informes', 'numero'));
        return $pdf->setPaper('a4','landscape')->stream('Historia fecha de ingreso.pdf');
    }

    public function tipoAtencionPDF(Request $request){

        $tipo_consulta_id = HistoriaClinica::where('tipo_consulta_id',$request->tipo_consulta)->get();
        $numero = HistoriaClinica::where('tipo_consulta_id',$request->tipo_consulta)->count();

        $pdf = PDF::loadView('historias.informes.tipo-consulta', compact('tipo_consulta_id', 'numero'));
        return $pdf->setPaper('a4','landscape')->stream('Tipo de consulta.pdf');
    }


}
