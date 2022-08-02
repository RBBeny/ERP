<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterVRequest extends FormRequest
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
            'nombreVendedor'=> 'required',
            'apellidoPaternoVendedor'=> 'required',
            'apellidoMaternoVendedor'=> 'required',
            'comisionVendedor'=> 'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
            'cveEstatus'=> 'required',
        ];
    }
    public function messages()
    {
        return [
            'nombreVendedor.required' => 'El Nombre es obligatorio.',
            'apellidoPaternoVendedor.required' => 'El Apellido Paterno  es obligatorio.',
            'apellidoMaternoVendedor.required' => 'El Apellido Materno es obligatorio.',
            'comisionVendedor.required' => 'La Comision es obligatorio.',
            'comisionVendedor.numeric' => 'La Comision debe ser numerica.',
            'cveEstatus.required' => 'El Estatus es obligatorio.',
            

        ];
    }
    
}    
