<?php

namespace App\Http\Controllers;

use App\Pago;
use App\Models\PagosCobranza;
use App\Models\Cobrador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CobranzaController extends Controller
{
    //
    public function home(){
        return view('Cobranza.homeCobranza');
    }


    public function PagosCobranza(){
        $Datos['pagos'] = DB::table('tpago')
        ->select('tcontrato.cveContrato','nomFormaPago','cvePago','fechaPago','cantidadPago','restantePaquete','nombreCobrador',"apellidoPaternoCobrador","apellidoMaternoCobrador")
        ->join('tcobrador', 'tcobrador.cveCobrador', '=', 'tpago.cveCobrador')
        ->join('tcontrato', 'tcontrato.cveContrato', '=', 'tpago.cveContrato')
        ->join('tsolicitud', 'tsolicitud.cveContrato', '=', 'tpago.cveContrato')
        ->join('cformapago', 'cformapago.cveFormaPago', '=', 'tsolicitud.cveFormaPago')
        ->get();

        $cobradores['cobradores'] = DB::table('tcobrador')
        ->select('tcobrador.cveCobrador','nombreCobrador','apellidoPaternoCobrador','apellidoMaternoCobrador')
        ->get();
        return view('Cobranza.PagosCobranza',$Datos,$cobradores);
    }    
    public function insertarPago(Request $request){
        //validaciones
        $this->validate($request, [
            'cvePago'=>'required|min:1|max:10|unique:tpago',
            'fechaPago'=>'required',
            'cantidadPago'=>'required',
            'cveContrato'=>'required',
            'cveCobrador'=>'required',
            
        ]);
        //fin
        
        $Pago = new Pago();
        $Pago->cvePago=$request->input('cvePago');
        $Pago->fechaPago=$request->input('fechaPago');
        $Pago->cantidadPago=$request->input('cantidadPago');
        $Pago->cveContrato=$request->input('cveContrato');
        $Pago->cveCobrador=$request->input('cveCobrador');
        $Pago->save();

        return back()->with('mensaje','se agrego');
        
    }
    public function Recibos(){
        return view('Cobranza.Recibos');
    }
 
    public function TablasClientesC(){
      
         $Datos['clientes'] = DB::table('tcliente')
        ->select('cveCliente','tsolicitud.cveSolicitud','tcontrato.cveContrato','nomCliente',"apellidoPaternoCliente","apellidoMaternoCliente","nomEstado","nomMunicipio","nomColonia","calleCliente","numeroExteriorCasaCliente","telefonoCliente","nomEstatusContrato")
        ->join('tcontrato', 'tcontrato.cveContrato', '=', 'tcliente.cveContrato')
        ->join('tsolicitud', 'tsolicitud.cveContrato', '=', 'tcliente.cveContrato')
        ->join('cestado', 'cestado.cveEstado', '=', 'tcliente.cveEstadoCliente')
        ->join('cmunicipio', 'cmunicipio.cveMunicipio', '=', 'tcliente.cveMunicipioClienteCobro')
        ->join('ccolonia', 'ccolonia.cveColonia', '=', 'tcliente.cveColoniaClienteCobro')
        ->join('cEstatusContrato', 'cEstatusContrato.cveEstatusContrato', '=', 'tcontrato.cveEstatusContrato')
        ->get();
        return view('Cobranza.ClienteCobranza',$Datos);
    }

    public function cliente( $cliente){
        $Datos = DB::table('tcliente')
        ->select('tcontrato.cveContrato','tsolicitud.cveSolicitud',"nomEstatusContrato",
        'nomCliente',"apellidoPaternoCliente","apellidoMaternoCliente","telefonoCliente",
        "telefonoDosCliente","telefonoTresCliente","estadoCivilCliente","fechaNacimientoCliente"
        ,"nomEstado","nomMunicipio","nomColonia","calleCliente","numeroExteriorCasaCliente",
        "numeroInteriorCasaCliente","entreCallesCliente","referenciasCasaCliente",
        "calleClienteCobro","numeroExteriorCasaClienteCobro",
        "numeroInteriorCasaClienteCobro","entreCallesClienteCobro","referenciasCasaClienteCobro",
        "costoPaquete",'restantePaquete','totalPagado','nomFormaPago','fechaEmision',
        'nombreCobrador',"apellidoPaternoCobrador","apellidoMaternoCobrador",
        'nombreVendedor',"apellidoPaternoVendedor","apellidoMaternoVendedor")
        ->join('tcontrato', 'tcontrato.cveContrato', '=', 'tcliente.cveContrato')
        ->join('tsolicitud', 'tsolicitud.cveContrato', '=', 'tcliente.cveContrato')
        ->join('cestado', 'cestado.cveEstado', '=', 'tcliente.cveEstadoCliente')
        ->join('cmunicipio', 'cmunicipio.cveMunicipio', '=', 'tcliente.cveMunicipioCliente')
        ->join('ccolonia', 'ccolonia.cveColonia', '=', 'tcliente.cveColoniaCliente')
        ->join('cEstatusContrato', 'cEstatusContrato.cveEstatusContrato', '=', 'tcontrato.cveEstatusContrato')
        ->join('cpaquete', 'cpaquete.cvePaquete', '=', 'tcontrato.cvePaquete')
        ->join('tvendedor', 'tvendedor.cveVendedor', '=', 'tsolicitud.cveVendedor')
        ->join('tcobrador', 'tcobrador.cveCobrador', '=', 'tsolicitud.cveCobrador')
        ->join('cformapago', 'cformapago.cveFormaPago', '=', 'tsolicitud.cveFormaPago')
        ->where ('tcliente.cveCliente', '=',$cliente)
        ->limit (1)
        ->get();

        $Pagos = DB::table('tpago')
        ->select('tcontrato.cveContrato','nomFormaPago','cvePago','fechaPago','cantidadPago','restantePaquete','nombreCobrador',"apellidoPaternoCobrador","apellidoMaternoCobrador")
        ->join('tcobrador', 'tcobrador.cveCobrador', '=', 'tpago.cveCobrador')
        ->join('tcontrato', 'tcontrato.cveContrato', '=', 'tpago.cveContrato')
        ->join('tsolicitud', 'tsolicitud.cveContrato', '=', 'tpago.cveContrato')
        ->join('cformapago', 'cformapago.cveFormaPago', '=', 'tsolicitud.cveFormaPago')
        ->join('tcliente', 'tcliente.cveContrato', '=', 'tcontrato.cveContrato')
        ->where ('tcliente.cveCliente', '=',$cliente)
        ->get();

        $Cobros = DB::table('tcliente')
        ->select('nomMunicipio',"nomColonia")
        ->join('cmunicipio', 'cmunicipio.cveMunicipio', '=', 'tcliente.cveMunicipioClienteCobro')
        ->join('ccolonia', 'ccolonia.cveColonia', '=', 'tcliente.cveColoniaClienteCobro')
        ->where ('tcliente.cveCliente', '=',$cliente)
        ->get();


        return view('Cobranza.ClientesCobranza',['clientes'=>$Datos,'pagos'=>$Pagos,'cobros'=>$Cobros]);
    }

    public function eliminarPago(Request $request, $cvePago){
        if($request->ajax()){
            $Pago = tpago::find($cvePago);
            $Pago->delete();


            return response()->json([
                'mensaje'=> '<strong>Se acaba de eliminar </strong> el pago('. $Pago->cvePago . ') Exitosamente'
            ]);
    
        }
    }

}
