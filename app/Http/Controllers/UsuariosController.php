<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUsuariosFormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Permiso;
use App\PermisoUser;
use App\User;
use App\Paciente;
use App\HistoriaClinica;
use PDF;


class UsuariosController extends Controller
{


    public function index(){
      $permisos = PermisoUser::all();
      $usuarios = PermisoUser::all();
      $usuarioss = User::count();
      $pacientes = Paciente::count();
      $historiass = HistoriaClinica::count();
       return view('usuarios.index')->with('usuarios', $usuarios)
                                    ->with('usuarioss', $usuarioss)
                                    ->with('pacientess', $pacientes)
                                    ->with('permisos', $permisos)
                                    ->with('historiass', $historiass);
    }


    public function create()
    {
        if (Auth::user()->hasPermiso('medico') || Auth::user()->hasPermiso('general') ) {
            return redirect()->route('usuarios.index');
        }
        $permisos = PermisoUser::all();
        $usuarioss = User::count();
        $pacientes = Paciente::count();
        $historiass = HistoriaClinica::count();
        $rol = Permiso::all();
        return view('usuarios.create')->with('roles', $rol)
                                    ->with('usuarioss', $usuarioss)
                                    ->with('pacientess', $pacientes)
                                    ->with('permisos', $permisos)
                                    ->with('historiass', $historiass);
    }


    public function store(StoreUsuariosFormRequest $request)
    {
        $usuario = new User();
        $usuario->tipo_documento = $request->tipoDocumento;
        $usuario->documento = $request->documento;
        $usuario->name = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->username = $request->usuario;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->clave);
        $usuario->save();
        $insertedId = $usuario->id;

        $permiso_usuario = new PermisoUser();
        $permiso_usuario->user_id = $insertedId;
        $permiso_usuario->permiso_id = $request->rol;
        $permiso_usuario->save();
        return redirect()->route('usuarios.create')->with('usuario', 'ok');
    }


    public function show($id)
    {
        $permisos = PermisoUser::all();
        $usuario = PermisoUser::find($id);
        $usuarioss = User::count();
        $pacientes = Paciente::count();
        $historiass = HistoriaClinica::count();

        return view('usuarios.show')->with('usuario', $usuario)
                                    ->with('usuarioss', $usuarioss)
                                    ->with('pacientess', $pacientes)
                                    ->with('permisos', $permisos)
                                    ->with('historiass', $historiass);
    }


    public function edit($id)
    {
        $permisos = PermisoUser::all();
        $usuario = PermisoUser::find($id);
        $permisos = Permiso::all();
        $usuarioss = User::count();
        $pacientes = Paciente::count();
        $historiass = HistoriaClinica::count();
        return view('usuarios.edit')->with('usuario',$usuario)
                                    ->with('permisos', $permisos)
                                    ->with('usuarioss', $usuarioss)
                                    ->with('pacientess', $pacientes)
                                    ->with('permisos', $permisos)
                                    ->with('historiass', $historiass);
    }


    public function update(Request $request,$id)
    {
       $permiso_usuario = PermisoUser::find($id);
       $usuario = User::where('id', $request->id)->first();
       $usuario->tipo_documento = $request->tipo_documento;
       $usuario->documento = $request->documento;
       $usuario->name = $request->name;
       $usuario->apellido = $request->apellido;
       $usuario->username = $request->username;
       $usuario->email = $request->email;
       $usuario->password = bcrypt($request->password);
       $usuario->save();

       $permiso_usuario->user_id = $permiso_usuario->user_id;
       $permiso_usuario->permiso_id = $request->rol;
       $permiso_usuario->save();


       return redirect()->route('usuarios.index')->with('usuario-actualizar', 'ok');
    }


    public function destroy($id)
    {
        $usuario = User::find($id);
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('usuario-eliminar', 'ok');
    }

    public function usuariosPDF(){

        $usuarios = PermisoUser::all();
        $numero = PermisoUser::count();
        $pdf = PDF::loadView('usuarios.usuariospdf', compact('usuarios', 'numero'));
        return $pdf->setPaper('a4', 'landscape')->stream('Usuarios.pdf');
    }
}
