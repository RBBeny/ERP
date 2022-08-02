<?php

namespace App\Http\Controllers;


use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Colonia;
use App\Models\Contrato;
use App\Models\Solicitud;
use App\Models\Cliente;
use App\Models\Pago;
use App\Models\FormaPago;
use App\Models\Vendedor;
use App\Models\Paquete;
use App\Models\Cobrador;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class VentasController extends Controller
{
    //
    public function home()
    {
        return view('Ventas.homeVentas');
    }

    public function clientes()
    {
        $Datos['clientes'] = DB::table('tcliente')
            ->select('cveCliente', 'tsolicitud.cveSolicitud', 'tcontrato.cveContrato', 'nomCliente', "apellidoPaternoCliente", "apellidoMaternoCliente", "nomEstado", "nomMunicipio", "nomColonia", "numeroExteriorCasaCliente", "telefonoCliente", "nomEstatusContrato")
            ->join('tcontrato', 'tcontrato.cveContrato', '=', 'tcliente.cveContrato')
            ->join('tsolicitud', 'tsolicitud.cveContrato', '=', 'tcliente.cveContrato')
            ->join('cestado', 'cestado.cveEstado', '=', 'tcliente.cveEstadoCliente')
            ->join('cmunicipio', 'cmunicipio.cveMunicipio', '=', 'tcliente.cveMunicipioCliente')
            ->join('ccolonia', 'ccolonia.cveColonia', '=', 'tcliente.cveColoniaCliente')
            ->join('cEstatusContrato', 'cEstatusContrato.cveEstatusContrato', '=', 'tcontrato.cveEstatusContrato')
            ->get();
        return view('Ventas.clientesVentas', $Datos);
    }

    public function agregarClientes()
    {
        $Estados = DB::table('cestado')
            ->select('cveEstado', 'nomEstado')
            ->get();

        $Vendedores = DB::table('tvendedor')
            ->select('cveVendedor', 'nombreVendedor', 'apellidoPaternoVendedor', 'apellidoMaternoVendedor')
            ->where('cveEstatus', '=', '3')
            ->get();
        $Paquetes = DB::table('cpaquete')
            ->select('cvePaquete', 'nombrePaquete')
            ->get();
        $FormaPagos = DB::table('cformapago')
            ->select('cveFormaPago', 'nomFormaPago')
            ->get();
        $Cobradores = DB::table('tcobrador')
            ->select('cveCobrador', 'nombreCobrador', 'apellidoPaternoCobrador', 'apellidoMaternoCobrador')
            ->where('cveEstatus', '=', '3')
            ->get();

        return view(
            'Ventas.agregarClientesVentas',
            [
                'estados' => $Estados,
                'vendedores' => $Vendedores, 'paquetes' => $Paquetes, 'formaPagos' => $FormaPagos,
                'cobradores' => $Cobradores
            ]
        );
    }
    public function verCliente($cliente)
    {
        $Datos = DB::table('tcliente')
            ->select(
                'tcontrato.cveContrato',
                'tsolicitud.cveSolicitud',
                "nomEstatusContrato",
                'nomCliente',
                "apellidoPaternoCliente",
                "apellidoMaternoCliente",
                "telefonoCliente",
                "telefonoDosCliente",
                "telefonoTresCliente",
                "estadoCivilCliente",
                "fechaNacimientoCliente",
                "nomEstado",
                "nomMunicipio",
                "nomColonia",
                "calleCliente",
                "numeroExteriorCasaCliente",
                "numeroInteriorCasaCliente",
                "entreCallesCliente",
                "referenciasCasaCliente",
                "calleClienteCobro",
                "numeroExteriorCasaClienteCobro",
                "numeroInteriorCasaClienteCobro",
                "entreCallesClienteCobro",
                "referenciasCasaClienteCobro",
                "costoPaquete",
                "aportacionInicial",
                "bonificacion",
                'restantePaquete',
                'totalPagado',
                'nomFormaPago',
                'fechaEmision',
                'nombreCobrador',
                "apellidoPaternoCobrador",
                "apellidoMaternoCobrador",
                'nombreVendedor',
                "apellidoPaternoVendedor",
                "apellidoMaternoVendedor"
            )
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
            ->where('tcliente.cveCliente', '=', $cliente)
            ->limit(1)
            ->get();

        $Pagos = DB::table('tpago')
            ->select('tcontrato.cveContrato', 'nomFormaPago', 'cvePago', 'fechaPago', 'cantidadPago', 'restantePaquete', 'nombreCobrador', "apellidoPaternoCobrador", "apellidoMaternoCobrador")
            ->join('tcobrador', 'tcobrador.cveCobrador', '=', 'tpago.cveCobrador')
            ->join('tcontrato', 'tcontrato.cveContrato', '=', 'tpago.cveContrato')
            ->join('tsolicitud', 'tsolicitud.cveContrato', '=', 'tpago.cveContrato')
            ->join('cformapago', 'cformapago.cveFormaPago', '=', 'tsolicitud.cveFormaPago')
            ->join('tcliente', 'tcliente.cveContrato', '=', 'tcontrato.cveContrato')
            ->where('tcliente.cveCliente', '=', $cliente)
            ->get();

        $Cobros = DB::table('tcliente')
            ->select('nomMunicipio', "nomColonia")
            ->join('cmunicipio', 'cmunicipio.cveMunicipio', '=', 'tcliente.cveMunicipioCliente')
            ->join('ccolonia', 'ccolonia.cveColonia', '=', 'tcliente.cveColoniaCliente')
            ->where('tcliente.cveCliente', '=', $cliente)
            ->get();


        return view('Ventas.verClienteVentas', ['clientes' => $Datos, 'pagos' => $Pagos, 'cobros' => $Cobros]);
    }

    public function insertarEstado(Request $request)
    {
        if ($request->ajax()) {
            $Estado = new Estado();
            $Estado->nomEstado = $request->input('nomEstado');
            $Estado->save();
        }
    }
    public function insertarMunicipio(Request $request)
    {
        if ($request->ajax()) {
            $Municipio = new Municipio();
            $Municipio->nomMunicipio = $request->input('nomMunicipio');
            $Municipio->cveEstado = $request->input('cveEstado');
            $Municipio->save();
        }
    }
    public function insertarColonia(Request $request)
    {
        if ($request->ajax()) {
            $Colonia = new Colonia();
            $Colonia->nomColonia = $request->input('nomColonia');
            $Colonia->cveMunicipio = $request->input('cveMunicipio');
            $Colonia->save();
        }
    }
    public function insertarCliente(Request $request)
    {
        /*$request->validate([
            'noSolicitud'=>'required|unique:tsolicitud,cveSolicitud|numeric|integer|max:8|min:1',
            'noContrato'=>'required|unique:tcontrato,cveContrato|regex:/^[0-9,A-Z][0-9]+/|max:8|min:1',
            'nombreCliente'=>'required|regex:/^[A-Z][A-Z,a-z]+/|max:30',
            'apellidoPaternoCliente'=>'required|regex:/^[A-Z][A-Z,a-z]+/|max:30',
            'apellidoMaternoCliente'=>'required|regex:/^[A-Z][A-Z,a-z]+/|max:30',
            'numeroTelefonoCliente'=>'required|regex:/^[0-9]+/|max:11',
            'numeroTelefonoDosCliente'=>'nullable|regex:/^[0-9]+/|max:11',
            'numeroTelefonoTresCliente'=>'nullable|regex:/^[0-9]+/|max:11',
            'estadoCivilCliente'=>'nullable|regex:/^[A-Z][A-Z,a-z]+/|max:12',
            'fechaNacimientoCliente'=>'nullable|max:20',
            'cveEstadoCliente'=>'required|numeric|integer|max:2|exists: cestado,cveEstado',
            'cveMunicipioCliente'=>'required|numeric|integer|max:2|exists:cmunicipio,cveMunicipio',
            'cveColoniaCliente'=>'required|numeric|integer|max:4|exists:ccolonia,cveColonia',
            'calleCliente'=>'required|regex:/^[0-9,A-Z][A-Z,a-z,0-9]+/|max:30',
            'numeroExteriorCasaCliente'=>'required|regex:/^[0-9,A-Z][0-9,A-Z]+/|max:10',
            'numeroInteriorCasaCliente'=>'nullable|regex:/^[0-9,A-Z][0-9,A-Z]+/|max:10',
            'entreCallesCliente'=>'nullable|regex:/^[0-9,A-Z][A-Z,a-z,0-9]+/|max:50',
            'referenciasCasaCliente'=>'nullable|regex:/^[A-Z][A-Z,a-z]+/|max:50',
            'cveMunicipioClienteCobro'=>'nullable|numeric|integer|max:2|exists:cmunicipio,cveMunicipio',
            'cveColoniaClienteCobro'=>'nullable|numeric|integer|max:4|exists:ccolonia,cveColonia',
            'calleClienteCobro'=>'nullable|regex:/^[0-9,A-Z][A-Z,a-z,0-9]+/|max:30',
            'numeroExteriorCasaClienteCobro'=>'nullable|regex:/^[0-9,A-Z][0-9,A-Z]+/|max:10',
            'numeroInteriorCasaClienteCobro'=>'nullable|regex:/^[A-Z][A-Z,a-z]+/|max:10',
            'entreCallesClienteCobro'=>'nullable|regex:/^[0-9,A-Z][A-Z,a-z,0-9]+/|max:50',
            'referenciasCasaClienteCobro'=>'nullable|regex:/^[A-Z][A-Z,a-z]+/|max:50',
            'cvePaquete'=>'required|numeric|integer|max:3|exists:cpaquete,cvePaquete',
            'extraPaquete'=>'nullable|regex:/^[0-9]+[.][0-9]{2}+/|max:11',
            'cveVendedor'=>'required|numeric|integer|max:8|exists:tvendedor,cveVendedor',
            'fechaSolicitud'=>'nullable',
            'cveFormaPago'=>'required|numeric|integer|max:2|exists:cformapago,cveFormaPago',
            'cveCobrador'=>'required|numeric|integer|max:8|exists:tcobrador,cveCobrador',
            'bonificacion'=>'nullable|regex:/^[0-9]+[.][0-9]{2}+/|max:11',
            'inversionInicial'=>'nullable|regex:/^[0-9]+[.][0-9]{2}+/|max:11'

        ]);
      */
        if ($request->ajax()) {
            $request->validate([
                'cveSolicitud' => 'required|unique:tsolicitud,cveSolicitud|max:8|min:1',
                'cveContrato' => 'required|unique:tcontrato,cveContrato|max:8|min:1',
                'cveEstadoCliente' => 'required|max:2|exists:cestado,cveEstado',
                'cveMunicipioCliente' => 'required|max:2|exists:cmunicipio,cveMunicipio',
                'cveColoniaCliente' => 'required|max:4|exists:ccolonia,cveColonia',
                'cveMunicipioClienteCobro' => 'nullable|max:2|exists:cmunicipio,cveMunicipio',
                'cveColoniaClienteCobro' => 'nullable|max:4|exists:ccolonia,cveColonia',
                'cvePaquete' => 'required|max:3|exists:cpaquete,cvePaquete',
                'cveVendedor' => 'required|max:8|exists:tvendedor,cveVendedor',
                'cveFormaPago' => 'required|max:2|exists:cformapago,cveFormaPago',
                'cveCobrador' => 'required|max:8|exists:tcobrador,cveCobrador'

            ]);
                $Contrato = new Contrato();
                $Contrato->cveContrato = $request->input('cveContrato');
                $Contrato->fechaEmision = $request->input('fechaEmision');
                $Contrato->cvePaquete = $request->input('cvePaquete');
                $Contrato->ExtraPaquete = $request->input('ExtraPaquete');
                $Contrato->totalPagado = $request->input('totalPagado');
                $Contrato->restantePaquete = $request->input('restantePaquete');
                $Contrato->cveEstatusContrato = $request->input('cveEstatusContrato');
                $Contrato->save();
                $Solicitud = new Solicitud();
                $Solicitud->cveSolicitud = $request->input('cveSolicitud');
                $Solicitud->cveFormaPago = $request->input('cveFormaPago');
                $Solicitud->aportacionInicial = $request->input('aportacionInicial');
                $Solicitud->fechaSolicitud = $request->input('fechaSolicitud');
                $Solicitud->cveContrato = $request->input('cveContrato');
                $Solicitud->bonificacion = $request->input('bonificacion');
                $Solicitud->comentarioPaquete = $request->input('comentarioPaquete');
                $Solicitud->cveVendedor = $request->input('cveVendedor');
                $Solicitud->cveCobrador = $request->input('cveCobrador');
                $Solicitud->save();
                $Cliente = new Cliente();
                $Cliente->nomCliente = $request->input('nomCliente');
                $Cliente->apellidoPaternoCliente = $request->input('apellidoPaternoCliente');
                $Cliente->apellidoMaternoCliente = $request->input('apellidoMaternoCliente');
                $Cliente->cveEstadoCliente = $request->input('cveEstadoCliente');
                $Cliente->cveMunicipioCliente = $request->input('cveMunicipioCliente');
                $Cliente->cveColoniaCliente = $request->input('cveColoniaCliente');
                $Cliente->numeroExteriorCasaCliente = $request->input('numeroExteriorCasaCliente');
                $Cliente->numeroInteriorCasaCliente = $request->input('numeroInteriorCasaCliente');
                $Cliente->calleCliente = $request->input('calleCliente');
                $Cliente->entreCallesCliente = $request->input('entreCallesCliente');
                $Cliente->referenciasCasaCliente = $request->input('referenciasCasaCliente');
                $Cliente->cveMunicipioClienteCobro = $request->input('cveMunicipioClienteCobro');
                $Cliente->cveColoniaClienteCobro = $request->input('cveColoniaClienteCobro');
                $Cliente->numeroExteriorCasaClienteCobro = $request->input('numeroExteriorCasaClienteCobro');
                $Cliente->numeroInteriorCasaClienteCobro = $request->input('numeroInteriorCasaClienteCobro');
                $Cliente->calleClienteCobro = $request->input('calleClienteCobro');
                $Cliente->entreCallesClienteCobro = $request->input('entreCallesClienteCobro');
                $Cliente->telefonoCliente = $request->input('telefonoCliente');
                $Cliente->telefonoDosCliente = $request->input('telefonoDosCliente');
                $Cliente->telefonoTresCliente = $request->input('telefonoTresCliente');
                $Cliente->estadoCivilCliente = $request->input('estadoCivilCliente');
                $Cliente->fechaNacimientoCliente = $request->input('fechaNacimientoCliente');
                $Cliente->cveSolicitud = $request->input('cveSolicitud');
                $Cliente->cveContrato = $request->input('cveContrato');
                $Cliente->save();
            
        }
        return back()->with('success', '¡Formulario validado exitosamente');
    }

    public function getConsultarMunicipio(Request $request)
    {
        if ($request->ajax()) {
            $municipios = DB::table('cmunicipio')
                ->select('cveMunicipio', 'nomMunicipio')
                ->where('cveEstado', '=', $request->cveEstado)
                ->get();

            foreach ($municipios as $municipio) {
                $municipiosArray[$municipio->cveMunicipio] = $municipio->nomMunicipio;
            }
        }
        return response()->json($municipiosArray);
    }

    public function getConsultarColonia(Request $request)
    {
        if ($request->ajax()) {
            $colonias = DB::table('ccolonia')
                ->select('cveColonia', 'nomColonia')
                ->where('cveMunicipio', '=', $request->cveMunicipio)
                ->get();

            foreach ($colonias as $colonia) {
                $coloniaArray[$colonia->cveColonia] = $colonia->nomColonia;
            }
        }
        return response()->json($coloniaArray);
    }

    public function getConsultarPaquete(Request $request)
    {
        if ($request->ajax()) {
            $paquetes = DB::table('cpaquete')
                ->select('cvePaquete', 'costoPaquete')
                ->where('cvePaquete', '=', $request->cvePaquete)
                ->get();
            foreach ($paquetes as $paquete) {
                $paqueteArray[$paquete->cvePaquete] = $paquete->costoPaquete;
            }
        }
        return response()->json($paqueteArray);
    }
    public function getConsultarSolicitud(Request $request)
    {
        if ($request->ajax()) {
            $solicitudes = DB::table('tsolicitud')
                ->select('cveSolicitud')
                ->where('cveSolicitud', '=', $request->cveSolicitud)
                ->get();
            foreach ($solicitudes as $solicitud) {
                $solicitudArray[$solicitud->cveSolicitud] = $solicitud->cveSolicitud;
            }
        }
        return response()->json($solicitudArray);
    }
    public function getConsultarContrato(Request $request)
    {
        if ($request->ajax()) {
            $solicitudes = DB::table('tsolicitud')
                ->select('cveSolicitud')
                ->where('cveSolicitud', '=', $request->cveSolicitud)
                ->get();
            foreach ($solicitudes as $solicitud) {
                $solicitudArray[$solicitud->cveSolicitud] = $solicitud->cveSolicitud;
            }
        }
        return response()->json($solicitudArray);
    }
}
