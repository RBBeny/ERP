<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class AdministradorController extends Controller
{
    //
    public function home(){
        return view('GerenteCobranza.homeGCobranza');
    }
    //
     public function homeAdmin(){
        return view('Administrador.homeAdmin');
    }
         
    public function verUsuarioAdmin(){
        return view('Administrador.verUsuarioAdmin');
    }

    public function agregarUsuarios(){
        return view('Administrador.agregarUsuarioAdmin');
    }
    public function verUsuarios(){
        //return view('Administrador.verUsuariosAdmin');
        $usuarios ["usuario"]= DB::table('tusuario')
        ->select("nombreUsuario", "nomUsuario", "ctipousuario.nomTipoUsuario")
        ->join("ctipousuario", "ctipousuario.cveTipoUsuario", "=", "tusuario.cveTipoUsuario")
        ->get();
        return view('Administrador.verUsuariosAdmin',$usuarios);
        //return response(json_encode($usuarios),200)->header('Content-type','text-plain');
    }


  public function register(RegisterRequest $request){
    $user = User::create($request->validated());
    return redirect('/verUsuarios')->with('success', 'Cuenta creada');
}
}

