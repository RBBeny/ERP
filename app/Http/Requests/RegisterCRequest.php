<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterCRequest extends FormRequest
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
            'nombreCobrador'=> 'required',
            'apellidoPaternoCobrador'=> 'required',
            'apellidoMaternoCobrador'=> 'required',
            'comisionCobrador'=> 'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
            'cveEstatus'=> 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'nombreCobrador.required' => 'El Nombre es obligatorio.',
            'apellidoPaternoCobrador.required' => 'El Apellido Paterno  es obligatorio.',
            'apellidoMaternoCobrador.required' => 'El Apellido Materno es obligatorio.',
            'comisionCobrador.required' => 'La Comision es obligatorio.',
            'comisionCobrador.numeric' => 'La Comision debe ser numerica.',
            'cveEstatus.required' => 'El Estatus es obligatorio.',
            

        ];
    }
}    