<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentasGerenteController extends Controller
{
    // 
    public function home(){
        return view('GerenteVentas.homeGVentas');
    }
    public function usuarios(){
        $usuario = DB::table('tusuario')
        ->select('nombreUsuario','apellidoPaternoUsuario','apellidoMaternoUsuario','nomUsuario','ctipousuario.nomTipoUsuario','cEstatus.nomEstatus')
        ->join('ctipousuario','ctipousuario.cveTipoUsuario','=','tusuario.cveTipoUsuario')
        ->join('cEstatus','cEstatus.cveEstatus','=','tusuario.cveEstatus')
        ->where('ctipousuario.nomTipoUsuario','=','Ventas')
        ->get();

        $rols=DB::table('ctipousuario')
        ->select('cveTipoUsuario','nomTipoUsuario')
        ->where('ctipousuario.nomTipoUsuario','=','Ventas')
        ->get();

        return view('GerenteVentas.TablaUsuariosGV',['usuario'=>$usuario,'rols'=>$rols]);
    }
    public function clientes(){
        $Datos['clientes'] = DB::table('tcliente')
        ->select('cveCliente','tsolicitud.cveSolicitud','tcontrato.cveContrato','nomCliente',"apellidoPaternoCliente","apellidoMaternoCliente","nomEstado","nomMunicipio","nomColonia","numeroExteriorCasaClienteCobro","numeroInteriorCasaClienteCobro","telefonoCliente","nomEstatusContrato")
        ->join('tcontrato', 'tcontrato.cveContrato', '=', 'tcliente.cveContrato')
        ->join('tsolicitud', 'tsolicitud.cveContrato', '=', 'tcliente.cveContrato')
        ->join('cestado', 'cestado.cveEstado', '=', 'tcliente.cveEstadoCliente')
        ->join('cmunicipio', 'cmunicipio.cveMunicipio', '=', 'tcliente.cveMunicipioClienteCobro')
        ->join('ccolonia', 'ccolonia.cveColonia', '=', 'tcliente.cveColoniaClienteCobro')
        ->join('cEstatusContrato', 'cEstatusContrato.cveEstatusContrato', '=', 'tcontrato.cveEstatusContrato')
        ->get();
         return view('GerenteVentas.TablaClienteGV',$Datos);
     
    }
    public function cliente($cliente){
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
        'cvePago','fechaPago','cantidadPago','restantePaquete','nombreCobrador',
        "apellidoPaternoCobrador","apellidoMaternoCobrador",
        'nombreVendedor',"apellidoPaternoVendedor","apellidoMaternoVendedor")
        ->join('tcontrato', 'tcontrato.cveContrato', '=', 'tcliente.cveContrato')
        ->join('tsolicitud', 'tsolicitud.cveContrato', '=', 'tcliente.cveContrato')
        ->join('cestado', 'cestado.cveEstado', '=', 'tcliente.cveEstadoCliente')
        ->join('cmunicipio', 'cmunicipio.cveMunicipio', '=', 'tcliente.cveMunicipioCliente')
        ->join('ccolonia', 'ccolonia.cveColonia', '=', 'tcliente.cveColoniaCliente')
        ->join('cEstatusContrato', 'cEstatusContrato.cveEstatusContrato', '=', 'tcontrato.cveEstatusContrato')
        ->join('cpaquete', 'cpaquete.cvePaquete', '=', 'tcontrato.cvePaquete')
        ->join('tpago', 'tpago.cveContrato', '=', 'tcontrato.cveContrato')
        ->join('tcobrador', 'tcobrador.cveCobrador', '=', 'tpago.cveCobrador')
        ->join('tvendedor', 'tvendedor.cveVendedor', '=', 'tsolicitud.cveVendedor')
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
        return view('GerenteVentas.verClienteGV',['clientes'=>$Datos,'pagos'=>$Pagos,'cobros'=>$Cobros]);

        
    }
    public function Reporte(){
       $Datos['pagos'] = DB::table('tpago')
       ->select('tcontrato.cveContrato','nomFormaPago','cvePago','fechaPago','cantidadPago','restantePaquete','nombreCobrador',"apellidoPaternoCobrador","apellidoMaternoCobrador")
       ->join('tcobrador', 'tcobrador.cveCobrador', '=', 'tpago.cveCobrador')
       ->join('tcontrato', 'tcontrato.cveContrato', '=', 'tpago.cveContrato')
       ->join('tsolicitud', 'tsolicitud.cveContrato', '=', 'tpago.cveContrato')
       ->join('cformapago', 'cformapago.cveFormaPago', '=', 'tsolicitud.cveFormaPago')
       ->get();
        return view('GerenteVentas.GenerarReporte',$Datos);
       
    }
    public function insertarUsuario(Request $request){
        if($request->ajax()){
           
             
                }

    }

}
