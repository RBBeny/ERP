<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

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
        return view('Administrador.verUsuariosAdmin');
    }

    /*
    public function Usuarios(){
        $usuario ["usuario"]= DB::table('tusuario')
        ->join("ctipousuario", "ctipousuario.cveTipoUsuario", "=", "tusuario.cveTipoUsuario")
        ->select("nombreUsuari", "nomUsuario", "ctipousuario.nomTipoUsuario")
        ->get();
        return view('Administrador.verUsuariosAdmin',$usuario);
   }
  */
}

