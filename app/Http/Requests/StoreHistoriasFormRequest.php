<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHistoriasFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'paciente_id' => 'required',
            'tipo_consulta_id' => 'required',
            'observaciones' => 'required',
            'medicamentos' => 'required',
            'medico_id' => 'required',
            'estado' => 'required',

        ];
    }

    public function messages(){

      return [
           'paciente_id.required' => 'No ha seleccionado un paciente',
           'tipo_consulta_id.required' => 'Seleccione un tipo de consulta',
           'observaciones.required' => 'No ha escrito una observacion',
           'medicamentos.required' => 'Especifique los medicamentos',
           'medico_id.required' => 'No ha seleccionado un medico',
           'estado.required' => 'la historia clinica no tiene un estado definido',
        ];

    }
}
