<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pago;
use App\Models\Cobrador;
use Illuminate\Support\Facades\DB;
use PDF;


class CobranzaGerenteController extends Controller
{
    //
    public function home(){
        return view('GerenteCobranza.homeGCobranza');
    }
    public function usuarios(){

        $usuario ["usuario"]= DB::table('tusuario')
        ->select("nombreUsuario", "apellidoPaternoUsuario", "apellidoMaternoUsuario", "nomUsuario", "ctipousuario.nomTipoUsuario", "cEstatus.nomEstatus")
        ->join("ctipousuario", "ctipousuario.cveTipoUsuario", "=", "tusuario.cveTipoUsuario")
        ->join("cEstatus", "tusuario.cveEstatus", "=", "cEstatus.cveEstatus")
        ->get();
        return view('GerenteCobranza.TablaUsuariosGC', $usuario);
    }
    public function clientes(){
        $Datos['clientes'] = DB::table('tcliente')
        ->select('cveCliente','tsolicitud.cveSolicitud','tcontrato.cveContrato','nomCliente',"apellidoPaternoCliente","apellidoMaternoCliente","nomEstado","nomMunicipio","nomColonia","calleCliente","numeroExteriorCasaCliente","telefonoCliente","nomEstatusContrato")
        ->join('tcontrato', 'tcontrato.cveContrato', '=', 'tcliente.cveContrato')
        ->join('tsolicitud', 'tsolicitud.cveContrato', '=', 'tcliente.cveContrato')
        ->join('cestado', 'cestado.cveEstado', '=', 'tcliente.cveEstadoCliente')
        ->join('cmunicipio', 'cmunicipio.cveMunicipio', '=', 'tcliente.cveMunicipioCliente')
        ->join('ccolonia', 'ccolonia.cveColonia', '=', 'tcliente.cveColoniaCliente')
        ->join('cEstatusContrato', 'cEstatusContrato.cveEstatusContrato', '=', 'tcontrato.cveEstatusContrato')
        ->get();
        return view('GerenteCobranza.TablaClienteGC',$Datos);
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
        ->leftjoin('tpago', 'tpago.cveContrato', '=', 'tcontrato.cveContrato')
        ->leftjoin('tcobrador', 'tcobrador.cveCobrador', '=', 'tpago.cveCobrador')
        ->leftjoin('tvendedor', 'tvendedor.cveVendedor', '=', 'tsolicitud.cveVendedor')
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


        return view('GerenteCobranza.verClienteGC',['clientes'=>$Datos,'pagos'=>$Pagos,'cobros'=>$Cobros]);
    }
    public function Reporte(){
        $Pagos = DB::table('tpago')
        ->select('tcontrato.cveContrato','nomFormaPago','cvePago','fechaPago','cantidadPago','restantePaquete','nombreCobrador',"apellidoPaternoCobrador","apellidoMaternoCobrador")
        ->join('tcobrador', 'tcobrador.cveCobrador', '=', 'tpago.cveCobrador')
        ->join('tcontrato', 'tcontrato.cveContrato', '=', 'tpago.cveContrato')
        ->join('tsolicitud', 'tsolicitud.cveContrato', '=', 'tpago.cveContrato')
        ->join('cformapago', 'cformapago.cveFormaPago', '=', 'tsolicitud.cveFormaPago')
        ->join('tcliente', 'tcliente.cveContrato', '=', 'tcontrato.cveContrato')
        ->get();
        return view('GerenteCobranza.GenerarReporte',['pagos'=>$Pagos]);
    }

    public function ReporteIdetallado($fechainicio,$fechafin){
        
        $Detalle= DB::table('tpago')
        ->select('nombreCobrador','apellidoPaternoCobrador','apellidoMaternoCobrador','cantidadPago','nomCliente','apellidoPaternoCliente','apellidoMaternoCliente','fechaPago')
        ->join('tcobrador','tcobrador.cveCobrador','=','tpago.cveCobrador')
        ->join('tcliente','tpago.cveContrato','=','tcliente.cveContrato')
        ->whereBetween('fechaPago',[$fechainicio,$fechafin])
        ->OrderBy('nombreCobrador','DESC')
        ->OrderBy('apellidoPaternoCobrador','DESC')
        ->OrderBy('apellidoMaternoCobrador','DESC')
        ->OrderBy('fechaPago','DESC')
        ->get();

        $Registros= DB::table('tpago')
        ->select('nombreCobrador','apellidoPaternoCobrador','apellidoMaternoCobrador',DB::raw('SUM(cantidadPago) as Subtotal'))
        ->join('tcobrador','tcobrador.cveCobrador','=','tpago.cveCobrador')
        ->whereBetween('fechaPago',[$fechainicio,$fechafin])
        ->GroupBy('tcobrador.cveCobrador','nombreCobrador','apellidoPaternoCobrador','apellidoMaternoCobrador')
        ->get();


        $count=0;

        foreach ($Registros as $Tot) {
            $count=$count+$Tot->Subtotal;
        }
        
        if ($count>0) {
            $pdf=PDF::loadView('GerenteCobranza.reporteDetallado',['registros'=>$Registros,'total'=>$count,'fechaInicio'=>$fechainicio,'fechaFin'=>$fechafin,'detalle'=>$Detalle]);
            return $pdf->download('ReporteIngresosDetallado_'.$fechainicio.'-'.$fechafin.'.pdf');
        }
        return back();
    }

    public function ReporteIngresos($fechainicio,$fechafin){

      
        $Registros= DB::table('tpago')
        ->select('nombreCobrador','apellidoPaternoCobrador','apellidoMaternoCobrador',DB::raw('SUM(cantidadPago) as Subtotal'))
        ->join('tcobrador','tcobrador.cveCobrador','=','tpago.cveCobrador')
        ->whereBetween('fechaPago',[$fechainicio,$fechafin])
        ->GroupBy('tcobrador.cveCobrador','nombreCobrador','apellidoPaternoCobrador','apellidoMaternoCobrador')
        ->get();

        $Total=DB::table('tpago')
        ->select(DB::raw('SUM(cantidadPago) as total'))
        ->whereBetween('fechaPago',[$fechainicio,$fechafin])
        ->get();
        $count=0;

        foreach ($Total as $Tot) {
            $count=$count+$Tot->total;
        }
        
        if ($count>0) {
            $pdf=PDF::loadView('GerenteCobranza.reporte',['registros'=>$Registros,'total'=>$Total,'fechaInicio'=>$fechainicio,'fechaFin'=>$fechafin]);
            return $pdf->download('ReporteIngresos_'.$fechainicio.'-'.$fechafin.'.pdf');
        }
        return back();
    }
}
