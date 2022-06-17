<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CobranzaController extends Controller
{
    //
    public function home(){
        return view('Cobranza.homeCobranza');
    }
    public function clientes(){
        return view('Cobranza.clientesCobranza');
    }
    public function VerPagosCobranza(){
        return view('Cobranza.VerPagosCobranza');
    }
    public function VerRecibos(){
        return view('Cobranza.VerRecibos');
    }
    public function VerClienteCobranza(){
        return view('Cobranza.VerClienteCobranza');
    }
    public function TablaClientesC(){
        return view('Cobranza.TablaClientesC');
    }
}
