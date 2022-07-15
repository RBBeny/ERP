<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            //
            'nomUsuario' => 'required|max:15|min:4',
            'password' => 'required'
        ];
    }

    public function getCredentials()
    {
        return [
            'nomUsuario' => $this->get('nomUsuario'),
            'password' => $this->get('password')
        ];
    }

    public function messages()
    {
        return [
            'nomUsuario.required' => 'El Usuario es obligatorio.',
            'password.required' => 'El password es obligatorio',
            'nomUsuario.min' => 'El minimo en el usuario es 4 caracteres',
            'nomUsuario.max' => 'El maximo es el usuario es 15 caracteres',
        ];
    }
}
