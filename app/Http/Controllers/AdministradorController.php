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
        ->select("nombreUsuario", "nomUsuario", "ctipousuario.nomTipoUsuario", "cEstatus.nomEstatus")
        ->join("ctipousuario", "ctipousuario.cveTipoUsuario", "=", "tusuario.cveTipoUsuario")
        ->join("cEstatus", "tusuario.cveEstatus", "=", "cEstatus.cveEstatus")
        ->get();


        $roles ["rol"] = DB::table('ctipousuario')
        ->select("cveTipoUsuario", "nomTipoUsuario")
        ->get();


        return view('Administrador.verUsuariosAdmin',$usuarios, $roles);
    
    }


  public function register(RegisterRequest $request){
    $user = User::create($request->validated());
    return redirect('/verUsuarios')->with('success', 'Cuenta creada');
}
}

