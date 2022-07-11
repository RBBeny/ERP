<?php

namespace App\Http\Controllers;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Colonia;
use App\Models\Pago;
use App\Models\FormaPago;
use App\Models\Vendedor;
use App\Models\Paquete;
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
        ->select('cveEstado','nomEstado')
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
        ->select('cvePaquete','nombrePaquete')
        ->get();
        $FormaPagos = DB::table('cformapago')
        ->select('cveFormaPago','nomFormaPago')
        ->get();
        $Cobradores=DB::table('tcobrador')
        ->select('nombreCobrador','apellidoPaternoCobrador','apellidoMaternoCobrador')
        ->get();
        return view('Ventas.agregarClientesVentas',
        ['estados'=>$Datos,'municipios'=>$Municipios,'colonias'=>$Colonias,
        'vendedores'=>$Vendedores,'paquetes'=>$Paquetes,'formaPagos'=>$FormaPagos,
        'cobradores'=>$Cobradores]);
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
    public function insertarCliente(Request $request){
        $request->validate([
            'noSolicitud'=>'required|unique:tsolicitud,cveSolicitud|numeric|integer|max:8|min:1',
            'noContrato'=>'required|unique:tcontrato,cveContrato|regex:/^[0-9,A-Z][0-9]+|max:8|min:1',
            'nombreCliente'=>'required|regex:/^[A-Z][A-Z,a-z]+|max:30',
            'apellidoPaternoCliente'=>'required|regex:/^[A-Z][A-Z,a-z]+|max:30',
            'apellidoMaternoCliente'=>'required|regex:/^[A-Z][A-Z,a-z]+|max:30',
            'numeroTelefonoCliente'=>'required|regex:/^[0-9]+|max:11',
            'numeroTelefonoDosCliente'=>'nullable|regex:/^[0-9]+|max:11',
            'numeroTelefonoTresCliente'=>'nullable|regex:/^[0-9]+|max:11',
            'estadoCivilCliente'=>'nullable|regex:/^[A-Z][A-Z,a-z]+|max:12',
            'fechaNacimientoCliente'=>'nullable|max:20',
            'estadoCliente'=>'required|regex:/^[A-Z][A-Z,a-z]+|max:15|exists: cestado,cveEstado',
            'municipioCliente'=>'required|regex:/^[A-Z][A-Z,a-z]+|max:30|exists:cmunicipio,cveMunicipio',
            'coloniaCliente'=>'required|regex:/^[A-Z][A-Z,a-z]+|max:30|exists:ccolonia,cveColonia',
            'calleCliente'=>'required|regex:/^[0-9,A-Z][A-Z,a-z,0-9]+|max:30',
            'numeroExteriorCasaCliente'=>'required|regex:/^[A-Z][A-Z,a-z]+|max:10',
            'numeroInteriorCasaCliente'=>'nullable|regex:/^[A-Z][A-Z,a-z]+|max:10',
            'entreCallesCliente'=>'nullable|regex:/^[0-9,A-Z][A-Z,a-z,0-9]+|max:50',
            'referenciasCasaCliente'=>'nullable|regex:/^[A-Z][A-Z,a-z]+|max:50',
            'municipioClienteCobro'=>'nullable|regex:/^[A-Z][A-Z,a-z]+|max:30|exists:cmunicipio,cveMunicipio',
            'coloniaClienteCobro'=>'nullable|regex:/^[A-Z][A-Z,a-z]+|max:30|exists:ccolonia,cveColonia',
            'calleClienteCobro'=>'nullable|regex:/^[0-9,A-Z][A-Z,a-z,0-9]+|max:30',
            'numeroExteriorCasaClienteCobro'=>'nullable|regex:/^[0-9,A-Z][0-9,A-Z]+|max:10',
            'numeroInteriorCasaClienteCobro'=>'nullable|regex:/^[A-Z][A-Z,a-z]+|max:10',
            'entreCallesClienteCobro'=>'nullable|regex:/^[0-9,A-Z][A-Z,a-z,0-9]+|max:50',
            'referenciasCasaClienteCobro'=>'nullable|regex:/^[A-Z][A-Z,a-z]+|max:50',
            'nomPaquete'=>'required|max:15|exists:cpaquete,cvePaquete',
            'extraPaquete'=>'nullable|regex:/^[0-9]+[.][0-9]{2}+|max:11',
            'nombreVendedor'=>'required|regex:/^[A-Z][A-Z,a-z]+|max:30',
            'fechaSolicitud'=>'nullable',
            'formaPago'=>'required|regex:/^[A-Z][A-Z,a-z]+|max:15|exists:cformapago,cveFormaPago',
            'nombreCobrador'=>'required|regex:/^[A-Z][A-Z,a-z]+|max:30',
            'bonificación'=>'nullable|regex:/^[0-9]+[.][0-9]{2}+|max:11',
            'inversionInicial'=>'nullable|regex:/^[0-9]+[.][0-9]{2}+|max:11'

        ]);
        DB::select('call sp_AgregarCliente(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', 
        [$request->noSolicitud,$request->noContrato,$request->nombreCliente,$request->apellidoPaternoCliente,$request->apellidoMaternoCliente,$request->numeroTelefonoCliente,$request->numeroTelefonoDosCliente,$request->numeroTelefonoTresCliente,$request->estadoCivilCliente,$request->fechaNacimientoCliente,$request->estadoCliente,$request->municipioCliente,$request->coloniaCliente,$request->calleCliente,$request->numeroExteriorCasaCliente,$request->numeroInteriorCasaCliente,$request->entreCallesCliente,$request->referenciasCasaCliente,$request->municipioClienteCobro,$request->coloniaClienteCobro, $request->calleClienteCobro,$request->numeroExteriorCasaClienteCobro,$request->numeroInteriorCasaClienteCobro, $request->entreCallesClienteCobro,$request->referenciasCasaClienteCobro, $request->nomPaquete,$request->extraPaquete,$request->nombreVendedor,$request->fechaSolicitud,$request->formaPago,$request->nombreCobrador,$request->bonificación,$request->inversionInicial]);
        
        $Datos= DB::table('cestado')
        ->select('cveEstado','nomEstado')
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
        ->select('cvePaquete','nombrePaquete')
        ->get();
        $FormaPagos = DB::table('cformapago')
        ->select('cveFormaPago','nomFormaPago')
        ->get();
        $Cobradores=DB::table('tcobrador')
        ->select('nombreCobrador','apellidoPaternoCobrador','apellidoMaternoCobrador')
        ->get();
        return view('Ventas.agregarClientesVentas',
        ['estados'=>$Datos,'municipios'=>$Municipios,'colonias'=>$Colonias,
        'vendedores'=>$Vendedores,'paquetes'=>$Paquetes,'formaPagos'=>$FormaPagos,
        'cobradores'=>$Cobradores]);
    }

    
    public function getConsultarMunicipio(Request $request){
        if($request->ajax()){
        $municipios = DB::table('cmunicipio')
        -> select ('cveMunicipio','nomMunicipio')
        ->where ('cveEstado','=',$request->cveEstado)
        ->get();
    
        foreach($municipios as $municipio){
            $municipiosArray[$municipio->cveMunicipio]=$municipio->nomMunicipio;
        }
        }
        return response()->json($municipiosArray);
    }

    public function getConsultarColonia(Request $request){
        if($request->ajax()){
        $colonias = DB::table('ccolonia')
        -> select ('cveColonia','nomColonia')
        ->where ('cveMunicipio','=',$request->cveMunicipio)
        ->get();
    
        foreach($colonias as $colonia){
            $coloniaArray[$colonia->cveColonia]=$colonia->nomColonia;
        }
        }
        return response()->json($coloniaArray);
    }
    public function getConsultarPaquete(Request $request){
        if($request->ajax()){
        $paquetes = DB::table('cpaquete')
        -> select ('costoPaquete')
        ->where ('cvePaquete','=',$request->cvePaquete)
        ->get();
    
        }
        return response()->json($paquetes);
    }
    
    
}
    

