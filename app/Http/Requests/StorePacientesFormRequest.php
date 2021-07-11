<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePacientesFormRequest extends FormRequest
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
            'nombre' => 'required',
            'fecha_nacimiento' => 'required',
            'especie' => 'required',
            'sexo' => 'required',
            'raza' => 'required',
            'peso' => 'required',
            'foto' => 'required | image',
            'documento' => 'required',
            'primer_nombre' => 'required',
            'primer_apellido' => 'required',
            'segundo_apellido' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'email' => 'required',
        ];
    }

    public function messages(){

        return [
           'nombre.required' => 'El nombre es obligatorio',
           'fecha_nacimiento.required' => 'Debe ingresar una fecha de nacimiento',
           'especie.required' => 'No ha seleccionado una especie',
           'sexo.required' => 'Escoja un sexo, por favor',
           'raza.required' => 'Seleccione una raza',
           'peso.required' => 'Ingrese peso en Kg',
           'foto.required' => 'No ha seleccionado una foto',
           'image.required' => 'La foto debe ser con formato de imagen',
           'documento.required' => 'Ingrese documento',
           'primer_nombre.required' => 'Ingrese primer nombre',
           'primer_apellido.required' => 'Ingrese su primer apellido',
           'segundo_apellido.required' => 'Ingrese su segundo apellido',
           'telefono.required' => 'No ha ingresado un telefono',
           'direccion.required' => 'No ha ingresado la direccion',
           'email.required' => 'No ha ingresado su email',
        ];
    }
}
