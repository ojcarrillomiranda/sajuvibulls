<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;
use Carbon\Carbon;

class AjaxController extends Controller
{
   public function buscarPaciente(Request $request){

    $term = $request->get('term');

    $consulta = Paciente::where('nombre', 'like', '%' .  $term . '%')->get();
    $datos = [];
    foreach ($consulta as $con) {
        $datos [] = [
            'label' => $con->nombre,
            'id' => $con->id,
            'documento' => $con->representante->documento,
            'especie' => $con->especie->id,
            'raza' => $con->raza->id,
            'especies' => $con->especie->especie,
            'razas' => $con->raza->raza,
            'representante' => $con->representante->primer_nombre . " " . $con->representante->primer_apellido,
            'contacto' => $con->representante->telefono
        ];
    }
    return $datos;
 }
}
