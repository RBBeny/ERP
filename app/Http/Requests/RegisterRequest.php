<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'nombreUsuario'=> 'required|max:30|min:1',
            'apellidoPaternoUsuario'=> 'required|max:30|min:1',
            'apellidoMaternoUsuario'=> 'required|max:30|min:1',
            'nomUsuario'=> 'required|max:15|min:4|unique:tusuario,nomUsuario',
            'password'=> 'required|max:15|min:4',
            'cveTipoUsuario'=> 'required',
            'cveEstatus'=> 'required',
        ];
    }

    public function messages()
    {
        return [
            'nomUsuario.required' => 'El Usuario es obligatorio.',
            'nomUsuario.unique' => 'El Nombre del usuario no se puede repetir.',
            'password.required' => 'El password es obligatorio',
        ];
    }
}
