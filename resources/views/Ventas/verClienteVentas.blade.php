@extends('layouts.plantilla')

@section('titulo','Clientes Ventas')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">

<link href="{{ asset('css/Ventas/verCliente.css') }}" rel="stylesheet">
@endsection


@section('content')

@include('includes.navbar')

<div class="contenedor">
<h1>Información del cliente</h1>
    <div class="contenedorInfo">
        <ul class="tabs">
            <li> <a href="#tab1"><span><i class="fas fa-user fa-lg"></i></span></a> </li>
            <li> <a href="#tab2"><span class="tab-text">Domicilio</span></a> </li>
            <li> <a href="#tab3"><span class="tab-text">Cuenta</span></a> </li>
            <li> <a href="#tab4"><span class="tab-text">Pagos</span></a> </li>
        </ul>
        <div class="secciones">
            <article id="tab1">
                <div class="DatosCliente">
                    <div class="row">
                        <div class="form-field col-lg-4">
                            @foreach($clientes as $cliente)
                                <label for="NoContrato" class="label">N° Contrato</label>
                                <input type="text" class="input-text" value="{{$cliente->cveContrato}}" id="NoContrato" readonly>
                           
                        </div>
                        <div class="form-field col-lg-4">
                            <label for="NoSolicitud" class="label">N° Solicitud</label>
                            <input type="text" class="input-text" value="{{$cliente->cveSolicitud}}" id="NoSolicitud" readonly>
                        </div>
                        <div class="form-field col-lg-4 ">
                            <label for="Estatus" class="label">Estatus</label>
                            <input type="text" class="input-text" value="{{$cliente->nomEstatusContrato}}" id="Estatus" readonly>
                        </div>
                    </div>
                    <div>
                        <div class="form-field col-lg-7">
                            <label for="Nombre" class="label">Nombre</label>
                            <input type="text" class="input-text-Nombre" id="Nombre" value="{{$cliente->nomCliente}} {{$cliente->apellidoPaternoCliente}} {{$cliente->apellidoMaternoCliente}}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-field-celular col-lg-5">
                            <label for="NoCelular" class="label">N° Celular</label>
                            <input type="text" class="input-text-celular" id="NoCelular"  value="{{$cliente->telefonoCliente}}" readonly>
                        </div>
                        <div class="form-field-celular col-lg-3">
                            <input type="text" class="input-text-celular" id="NoCelular2" value="{{$cliente->telefonoDosCliente}}" readonly>
                        </div>
                        <div class="form-field-celular col-lg-3 ">
                            <input type="text" class="input-text-celular" id="NoCelular3" value="{{$cliente->telefonoTresCliente}}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-field-DosColumnas col-lg-5">
                            <label for="EstadoCivil" class="label">Estado civil</label>
                            <input type="text" class="input-text-DosColumnas" value="{{$cliente->estadoCivilCliente}}" id="EstadoCivil" readonly> 
                        </div>
                        <div class="form-field-DosColumnas col-lg-6">
                            <label for="FechaNacimiento" class="label">Fecha nacimiento</label>
                            <input type="text" class="input-text-DosColumnas" value="{{$cliente->fechaNacimientoCliente}}" id="FechaNacimiento" readonly>
                        </div>
                    </div>
                    @endforeach
                </div>
               
            </article>
            <article id="tab2">
                <div class="domicilioCliente">
                    <center>
                        <h2>Domicilio del cliente</h2>
                    </center>
                    @foreach($clientes as $cliente)
                    <div class="row">
                        <div class="form-field-DosColumnas col-lg-5">
                            <label for="Estado" class="label">Estado</label>
                            <input type="text" class="input-text-DosColumnas" value="{{$cliente->nomEstado}}" id="Estado" readonly>
                        </div>
                        <div class="form-field-DosColumnas col-lg-6">
                            <label for="Municipio" class="label">Municipio</label>
                            <input type="text" class="input-text-DosColumnas" value="{{$cliente->nomMunicipio}}" id="Municipio" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-field-DosColumnas col-lg-6">
                            <label for="Colonia" class="label">Colonia</label>
                            <input type="text" class="input-text-DosColumnas" value="{{$cliente->nomColonia}}" id="Colonia" readonly>
                        </div>
                        <div class="form-field-DosColumnas col-lg-6">
                            <label for="Calle" class="label">Calle</label>
                            <input type="text" class="input-text-DosColumnas" value="{{$cliente->calleCliente}}" id="Calle" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-field col-lg-4">
                            <label for="NoExt" class="label">N° Ext</label>
                            <input type="text" class="input-text" value="{{$cliente->numeroExteriorCasaCliente}}" id="NoExt" readonly>
                        </div>
                        <div class="form-field col-lg-4">
                            <label for="NoInt" class="label">N° Int</label>
                            <input type="text" class="input-text" value="{{$cliente->numeroInteriorCasaCliente}}" id="NoInt" readonly>
                        </div>
                        <div class="form-field col-lg-4 ">
                            <label for="cp" class="label">C.P.</label>
                            <input type="text" class="input-text" id="cp">
                        </div>
                    </div>
                    <div>
                        <div class="form-field col-lg-9">
                            <label for="EntreCalles" class="label">Entre calles</label>
                            <input type="text" class="input-text-columna" value="{{$cliente->entreCallesCliente}}" id="EntreCalles" readonly>
                        </div>
                    </div>
                    <div>
                        <div class="form-field col-lg-9">
                            <label for="referencias" class="label">Referencias</label>
                            <input type="text" class="input-text-columna" value="{{$cliente->referenciasCasaCliente}}" id="referencias" readonly>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="domicilioClienteCobro">
                    <center>
                        <h2>Domicilio de cobro del cliente</h2>
                    </center>
                    <div class="row">
                        <div class="form-field-DosColumnas col-lg-6">
                        @foreach($cobros as $cob)
                            <label for="Municipio" class="label">Municipio</label>
                            <input type="text" class="input-text-DosColumnas" value="{{ $cob-> nomMunicipio}}" id="Municipio" readonly>
                            @endforeach
                        </div>
                    </div>
                    @foreach($clientes as $cliente)
                    <div class="row">
                        <div class="form-field-DosColumnas col-lg-6">
                            <label for="Colonia" class="label">Colonia</label>
                            <input type="text" class="input-text-DosColumnas" value="{{ $cob-> nomColonia}}" id="Colonia" readonly>
                        </div>
                        <div class="form-field-DosColumnas col-lg-6">
                            <label for="Calle" class="label">Calle</label>
                            <input type="text" class="input-text-DosColumnas" value="{{$cliente->calleClienteCobro}}" id="Calle" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-field col-lg-4">
                            <label for="NoExt" class="label">N° Ext</label>
                            <input type="text" class="input-text" value="{{$cliente->numeroExteriorCasaClienteCobro}}" id="NoExt" readonly>
                        </div>
                        <div class="form-field col-lg-4">
                            <label for="NoInt" class="label">N° Int</label>
                            <input type="text" class="input-text" value="{{$cliente->numeroInteriorCasaClienteCobro}}" id="NoInt" readonly>
                        </div>
                        <div class="form-field col-lg-4 ">
                            <label for="cp" class="label">C.P.</label>
                            <input type="text" class="input-text" id="cp">
                        </div>
                    </div>
                    <div>
                        <div class="form-field col-lg-9">
                            <label for="EntreCalles" class="label">Entre calles</label>
                            <input type="text" class="input-text-columna" value="{{$cliente->entreCallesClienteCobro}}" id="EntreCalles" readonly>
                        </div>
                    </div>
                    <div>
                        <div class="form-field col-lg-9">
                            <label for="referencias" class="label">Referencias</label>
                            <input type="text" class="input-text-columna" value="{{$cliente->referenciasCasaClienteCobro}}" id="referencias" readonly>
                        </div>
                    </div>
                    @endforeach
                </div>
            </article>
            <article id="tab3">
                <div class="datosCuenta">
                    <center>
                        <h2>Datos Cuenta</h2>
                    </center>
                    @foreach($clientes as $cliente)
                    <div class="row">
                        <div class="form-field col-lg-4">
                            <label for="NoContrato" class="label">N° Contrato</label>
                            <input type="text" class="input-text" value="{{$cliente->cveContrato}}"  id="NoContrato" readonly>
                        </div>
                        <div class="form-field col-lg-4">
                            <label for="NoSolicitud" class="label">N° Solicitud</label>
                            <input type="text" class="input-text" value="{{$cliente->cveSolicitud}}" id="NoSolicitud" readonly>
                        </div>
                        <div class="form-field col-lg-4 ">
                            <label for="Costo" class="label">Costo</label>
                            <input type="text" class="input-text" value="{{$cliente->costoPaquete}}" id="Costo" readonly>
                        </div>
                    </div>
                    <div class="row">
                    <div class="form-field col-lg-4">
                            <label for="aportacionInicial" class="label">Aportación inicial</label>
                            <input type="text" class="input-text" value="{{$cliente->aportacionInicial}}"  id="aportacionInicial" readonly>
                        </div>
                        <div class="form-field col-lg-4">
                            <label for="bonificacion" class="label">Bonificación</label>
                            <input type="text" class="input-text" value="{{$cliente->bonificacion}}" id="bonificacion" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-field col-lg-4">
                            <label for="Adeudo" class="label">Adeudo</label>
                            <input type="text" class="input-text" value="{{$cliente->restantePaquete}}" id="Adeudo" readonly>
                        </div>
                        <div class="form-field-D col-lg-5">
                            <label for="liquidado" class="label">Deuda saldada</label>
                            <input type="text" class="input-text" value="{{$cliente->totalPagado}}" id="liquidado" readonly>
                        </div>
                        <div class="form-field-f col-lg-4 ">
                            <label for="formaPago" class="label">Forma pago</label>
                            <input type="text" class="input-text" value="{{$cliente->nomFormaPago}}" id="formaPago" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-field-DosColumnas col-lg-6">
                            <label for="fechaAfilación" class="label">Fecha de afilación</label>
                            <input type="text" class="input-text-DosColumnas" value="{{$cliente->fechaEmision}}" id="fechaAfilación" readonly>
                        </div>
                        <div class="form-field-DosColumnas col-lg-6">
                            <label for="Vendedor" class="label">Vendedor</label>
                            <input type="text" class="input-text-DosColumnas" value="{{$cliente->nombreVendedor}} {{$cliente->apellidoPaternoVendedor}} {{$cliente->apellidoMaternoVendedor}}" id="Vendedor" readonly>
                        </div>
                    </div>
                    <div>
                        <div class="form-field col-lg-6">
                            <label for="Cobrador" class="label">Cobrador</label>
                            <input type="text" class="input-text-columna" value="{{$cliente->nombreCobrador}} {{$cliente->apellidoPaternoCobrador}} {{$cliente->apellidoMaternoCobrador}}" id="Cobrador" readonly>
                        </div>
                    </div>
                    @endforeach
                </div>
            </article>
            <article id="tab4">
                <div class="pagos">
                @foreach($clientes as $cliente)
                    <div class="row">
                        <div class="form-field col-lg-4">
                            <label for="NoContrato" class="label">Estatus</label>
                            <input type="text" class="input-text" value="{{$cliente->nomEstatusContrato}}" id="Estatus" readonly>
                        </div>
                        <div class="form-field col-lg-4">
                            <label for="NoSolicitud" class="label">Total pagado</label>
                            <input type="text" class="input-text" value="{{$cliente->totalPagado}}" id="TotalPagado" readonly>
                        </div>
                        <div class="form-field col-lg-4 ">
                            <label for="Estatus" class="label">Adeudo</label>
                            <input type="text" class="input-text" value="{{$cliente->restantePaquete}}" id="Adeudo" readonly>
                        </div>
                    </div>
                     @endforeach

                </div>
                <div>
                    <table id="pagos" class="display compact" style="width:100%">
                        <thead>
                            <tr>
                                <th>Folio</th>
                                <th>Fecha</th>
                                <th>Monto</th>
                                <th>cobrador</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($pagos as $pago)
                            <tr>
                                <td>{{ $pago-> cvePago}}</td>
                                <td>{{ $pago-> fechaPago}}</td>
                                <td>{{ $pago-> cantidadPago}}</td>
                                <td>{{ $pago->nombreCobrador}} {{ $pago-> apellidoPaternoCobrador}} {{ $pago-> apellidoMaternoCobrador}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </article>
        </div>

    </div>
</div>

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="{{ asset('js/Ventas/verCliente.js') }}" type="text/javascript"></script>
<script>
$(document).ready(function () {
    $('#pagos').DataTable({
    pageLength : 5,
    lengthMenu: [[5, 10], [5, 10]],
    language: {"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"}
    });
});
</script>
@endsection
@endsection