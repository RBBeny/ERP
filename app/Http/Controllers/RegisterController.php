<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    //
    public function inicio(){
        return view('Registro.register');
    }

    public function register(Request $request){
        //User::create($request->validated());
        return redirect('/TablaUsuariosGC')->with('success', 'Cuenta creada');
        $user = new User();
        $user->nombreUsuario=$request->input('nombreUsuario');
        $user->apellidoPaternoUsuario=$request->input('apellidoPaternoUsuario');
        $user->apellidoMaternoUsuario=$request->input('apellidoMaternoUsuario');
        $user->nomUsuario=$request->input('nomUsuario');
        $user->password=$request->input('password');
        $user->password=$request->input('cveTipoUsuario');
        $user->password=$request->input('cveEstatus');
        $user->save();
        return redirect('/TablaUsuariosGC')->with('success', 'Cuenta creada');
    }

}
