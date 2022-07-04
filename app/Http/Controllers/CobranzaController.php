<?php

namespace App\Http\Controllers;

use App\Pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CobranzaController extends Controller
{
    //
    public function home(){
        return view('Cobranza.git add.');
    }
    public function clientes(){
        return view('Cobranza.ClientesCobranza');
    }

    public function PagosCobranza(){
        return view('Cobranza.PagosCobranza');
    }    
    public function insertarPago(Request $request){
        $Pago = new Pago();
        $Pago->cvePago=$request->input('cvePago');
        $Pago->fechaPago=$request->input('fechaPago');
        $Pago->cantidadPago=$request->input('cantidadPago');
        $Pago->cveContrato=$request->input('cveContrato');
        $Pago->cveCobrador=$request->input('cveCobrador');
        $Pago->save();
    }
    public function Recibos(){
        return view('Cobranza.Recibos');
    }
    public function VerClienteCobranza(){
        return view('Cobranza.VerClienteCobranza');
    }
    public function TablaClientesC(){
        return view('Cobranza.TablaClientesC');
    }

}
