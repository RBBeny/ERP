<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CobranzaGerenteController extends Controller
{
    //
    public function home(){
        return view('GerenteCobranza.homeGCobranza');
    }
    public function usuarios(){
        return view('GerenteCobranza.TablaUsuariosGC');
    }
    public function clientes(){
        return view('GerenteCobranza.TablaClienteGC');
    }
}
