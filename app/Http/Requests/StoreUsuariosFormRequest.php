<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreUsuariosFormRequest extends FormRequest
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
            'tipoDocumento' => 'nullable',
            'documento' => 'nullable | max:11 | min:11 | numeric',
            'nombre' => 'required',
            'apellido' => 'required',
            'usuario' => 'required | unique:users,username',
            'email' => 'required',
            'clave' => 'required',
            'rol' => 'required',

        ];
    }

    public function messages(){

        return [

           'tipoDocumento.required' => 'Seleccione tipo de documento',
           'documento.required' => 'Documento requerido',
           'documento.max' => 'Su documento debe tener 10 digitos',
           'documento.min' => 'Su documento debe tener 10 digitos',
           'documento.numeric' => 'Documento no puede contener letras',
           'nombre.required' => 'Nombre es requerido',
           'apellido.required' => 'Apellido requerido',
           'usuario.required' => 'Usuario requerido',
           'usuario.unique' => 'El usuario ya existe',
           'email.required' => 'Email requerido',
           'email.unique' => 'El email ya existe',
           'clave.required' => 'No a ingresado una contraseña',
           'rol.required' => 'Escoja un rol',

        ];
    }
}
