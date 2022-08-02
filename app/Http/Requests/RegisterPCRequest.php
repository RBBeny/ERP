<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterPCRequest extends FormRequest
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
            'cvePago'=> 'required',
            'fechaPago'=> 'required',
            'cantidadPago'=> 'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
            'cveContrato'=> 'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
            'cveCobrador'=> 'required',
        ];
    }

    public function messages()
    {
        return [
            'cvePago.required' => 'El Nombre es obligatorio.',
            'fechaPago.required' => 'El Apellido Paterno  es obligatorio.',
            'cantidadPago.required' => 'El Apellido Materno es obligatorio.',
            'cveContrato.required' => 'La Comision es obligatorio.',
            'cveCobrador.numeric' => 'La Comision debe ser numerica.',                    
        ];
        } 
    }   
