<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cobrador;
use App\Models\Vendedor;
use App\Http\Requests\RegisterCRequest;
use App\Http\Requests\RegisterVRequest;

use DB;

class RHController extends Controller
{
    //
    public function homeRh(){
        return view('Rh.homeRh');
    }
    public function cobradoredit(){
        return view('Rh.cobradoredit');
    }
    
    public function VendedoresRH(){
        $Datos['vendedores'] = DB::table('tvendedor')
        ->select('tvendedor.cveVendedor','nombreVendedor','apellidoPaternoVendedor','apellidoMaternoVendedor','comisionVendedor','cEstatus.cveEstatus','cEstatus.nomEstatus')
        ->join('cEstatus', 'tvendedor.cveEstatus', '=','cEstatus.cveEstatus')
        ->get();
        
        $Estados['estados'] = DB::table('cEstatus')
        ->select('cEstatus.cveEstatus','nomEstatus')
        ->get();
        
        
        return view('Rh.VendedoresRH',$Datos,$Estados);


    }

    
    public function CobradoresRH(){
        $Datos['cobradores'] = DB::table('tcobrador')
        ->select('tcobrador.cveCobrador','nombreCobrador','apellidoPaternoCobrador','apellidoMaternoCobrador','comisionCobrador','cEstatus.cveEstatus','cEstatus.nomEstatus')
        ->join('cEstatus', 'tcobrador.cveEstatus', '=','cEstatus.cveEstatus')
        ->get();
        
        $Estados['estados'] = DB::table('cEstatus')
        ->select('cEstatus.cveEstatus','nomEstatus')
        ->get();
        return view('Rh.CobradoresRH',$Datos,$Estados);
        
    }    
    public function register(RegisterCRequest $request){
        $cobrador = Cobrador::create($request->validated());
        return redirect('/CobradoresRH')->with('success', 'Cuenta creada');
    }

    public function registerV(RegisterVRequest $request){
        $vendedor = Vendedor::create($request->validated());
        return redirect('/VendedoresRH')->with('success', 'Cuenta creada');
    }
    public function UpdateV(Request $request,$cveVendedor){
        //validaciones
        $Datos = Vendedor:: findOrfail($cveVendedor);
        $Datos->nombreVendedor=$request->nombreVendedor;
        $Datos->apellidoPaternoVendedor=$request->apellidoPaternoVendedor;
        $Datos->apellidoMaternoVendedor=$request->apellidoMaternoVendedor;
        $Datos->comisionVendedor=$request->comisionVendedor;
        $Datos->cveEstatus=$request->cveEstatus;
        $Datos->save();
        return redirect('/CobradoresdoresRH')->with('success', 'Cuenta creada');

    }
    public function CjCobrador(Request $request){
        //validaciones
        $Cobrador = new Pago();
        $Cobrador->nombreCobrador=$request->input('nombreCobrador');
        $Cobrador->apellidoPaternoCobrador=$request->input('apellidoPaternoCobrador');
        $Cobrador->apellidoMaternoCobrador=$request->input('apellidoMaternoCobrador');
        $Cobrador->comisionCobrador=$request->input('comisionCobrador');
        $Cobrador->cveEstatus=$request->input('cveEstatus');
        $Cobrador->save();
        
    }
    public function update($cveCobrador)
    {
    	$Cobrador = Cobrador::find($cveCobrador);

	    return response()->json([
	      'data' => $Cobrador
	    ]);
    }

    public function edit(Request $request, $cveCobrador)
    {
        Cobrador::updateOrCreate(
       [
        'cveCobrador' => $cveCobrador
       ],
       [
        'nombreCobrador' => $request->nombreCobrador,
       ],
       [
        'apellidoPaternoCobrador' => $request->apellidoPaternoCobrador,
       ],
       [
        'apellidoMaternoCobrador' => $request->apellidoMaternoCobrador,
       ],
       [
        'comisionCobrador' => $request->comisionCobrador,
       ],
       [
        'cveEstatus' => $request->cveEstatus
       ]
      );

      return response()->json([ 'success' => true ]);

    }
}