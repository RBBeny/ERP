<?php

namespace App\Http\Controllers;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Colonia;
use App\Models\Pago;
use App\Models\Cobrador;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class VentasController extends Controller
{
    //
    public function home(){
        return view('Ventas.homeVentas');
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
        return view('Ventas.clientesVentas',$Datos);
    }

    public function agregarClientes(){
        $Datos= DB::table('cestado')
        ->select('nomEstado')
        ->get();
        $Municipios=DB::table('cmunicipio')
        ->select('nomMunicipio')
        ->get();
        $Colonias=DB::table('ccolonia')
        ->select('nomColonia')
        ->get();
        $Vendedores=DB::table('tvendedor')
        ->select('nombreVendedor','apellidoPaternoVendedor','apellidoMaternoVendedor')
        ->get();
        $Paquetes=DB::table('cpaquete')
        ->select('nombrePaquete')
        ->get();
        $FormaPagos = DB::table('cformapago')
        ->select('nomFormaPago')
        ->get();
        $Cobradores=DB::table('tcobrador')
        ->select('nombreCobrador','apellidoPaternoCobrador','apellidoMaternoCobrador')
        ->get();
        return view('Ventas.agregarClientesVentas',
        ['estados'=>$Datos,'municipios'=>$Municipios,'colonias'=>$Colonias,'vendedores'=>$Vendedores,'paquetes'=>$Paquetes,'formaPagos'=>$FormaPagos,'cobradores'=>$Cobradores]);
    }
    public function verCliente($cliente){
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

        return view('Ventas.verClienteVentas',['clientes'=>$Datos,'pagos'=>$Pagos,'cobros'=>$Cobros]);
    }

    public function insertarEstado(Request $request){
        if($request->ajax()){
        $Estado = new Estado();
        $Estado->nomEstado=$request->input('nomEstado');
        $Estado->save();
           /* try{
                $estados = DB::table('cestado')
                ->select('nomEstado')
                ->get();
               return response()->json(['estados'=>$estados]);
            }catch(Exception $e){
                echo json_encode(array(
                    'error' => array(
                        'msg' => $e->getMessage(),
                        'code' => $e->getCode(),
                    ),
                ));*/
            }
       

     
    }
    public function insertarMunicipio(Request $request){
        
       DB::select('call sp_AgregarMunicipio(?,?)',[$request->nomEstado,$request->nomMunicipio]);
    }
    public function insertarColonia(Request $request){
        
        DB::select('call sp_AgregarColonia(?,?)',[$request->nomMunicipio,$request->nomColonia]);
    }

    public function mostrarEstadosAjax(Request $request){
       $Estado = DB::table('cestado')
       ->select('nomEstado.*')
       ->get();
       return response(json_encode($Estado),200)->header('Content-type','text-plain');

    }


}
