<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class AdministradorController extends Controller
{
    //
    
     public function homeAdmin(){
        return view('Administrador.homeAdmin');
    }
         
    
    public function verUsuarios(){
        //return view('Administrador.verUsuariosAdmin');
        $usuarios ["usuario"]= DB::table('tusuario')
        ->select("id","nombreUsuario", "nomUsuario","apellidoPaternoUsuario","apellidoMaternoUsuario","ctipousuario.nomTipoUsuario", "cEstatus.nomEstatus","tusuario.cveTipoUsuario")
        ->join("ctipousuario", "ctipousuario.cveTipoUsuario", "=", "tusuario.cveTipoUsuario")
        ->join("cEstatus", "tusuario.cveEstatus", "=", "cEstatus.cveEstatus")
        ->get();

        $rol ["rol"]= DB::table('ctipousuario')
        ->select("cveTipoUsuario", "nomTipoUsuario")
        ->get();

        
        return view('Administrador.verUsuariosAdmin',$usuarios, $rol);
    }
 

    //Update
    public function update (Request $request, $id){
        $usuario= User::findOrFail($id);
        $usuario->nombreUsuario = $request -> input('nombre');
        $usuario->apellidoPaternoUsuario = $request -> input('apellidoPaterno');
        $usuario->apellidoMaternoUsuario = $request -> input('apellidoMaterno');
        $usuario->nomUsuario = $request -> input('nomUsuario');
        $usuario->cveTipoUsuario = $request -> input('rol');
        $usuario->save();
        return redirect('/verUsuarios')->with('success', 'Usuario editado');

    }

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario -> delete();
        return redirect()->route('verUsuarios');
    }

  public function register(RegisterRequest $request){
    $user = User::create($request->validated());
    return redirect('/verUsuarios')->with('success', 'Cuenta creada');
}


public function registerAdmin(RegisterRequest $request){
    $user = User::create($request->validated());
    return redirect('/verUsuarios')->with('success', 'Cuenta creada');
}

public function registerGC(RegisterRequest $request){
    $user = User::create($request->validated());
    return redirect('/verUsuarios')->with('success', 'Cuenta creada');
}
}

