<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\Pago;

class RegisterPagoController extends Controller
{


    public function register(Request $request){
        //validaciones
        //fin            
        $Pago = new Pago();
        $Pago->cvePago=$request->input('cvePago');
        $Pago->fechaPago=$request->input('fechaPago');
        $Pago->cantidadPago=$request->input('cantidadPago');
        $Pago->cveContrato=$request->input('cveContrato');
        $Pago->cveCobrador=$request->input('cveCobrador');
        $Pago->save();

        return redirect('/PagosCobranza')->with('success', 'Cuenta creada');
        
    }

}
