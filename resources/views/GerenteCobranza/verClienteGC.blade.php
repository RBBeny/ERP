@extends('layouts.plantilla')

@section('titulo','Clientes Ventas')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">

<link href="{{ asset('css/Ventas/verCliente.css') }}" rel="stylesheet">
@endsection


@section('content')

@include('includes.navbarGCobranza')

<div class="contenedor">
    <h1>Información del cliente </h1>
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
                            <label for="NoContrato" class="label"  >N° Contrato</label>
                            <input type="text" class="input-text" value="{{$cliente->cveContrato}}" id="NoContrato">
                            @endforeach
                        </div>
                    
                        <div class="form-field col-lg-4">
                           
                            <label for="NoSolicitud" class="label">N° Solicitud</label>
                            <input type="text" class="input-text" id="NoSolicitud" value="{{$cliente->cveSolicitud}}">
                           
                        </div>
                        <div class="form-field col-lg-4 ">
                            
                            <label for="Estatus" class="label">Estatus</label>
                            <input type="text" class="input-text" id="Estatus" value="{{$cliente->nomEstatusContrato}}">
                            
                        </div>
                    </div>
                    <div>
                        <div class="form-field col-lg-7">
                           
                            <label for="Nombre" class="label">Nombre</label>
                            <input type="text" class="input-text-Nombre" id="Nombre" value="{{$cliente->nomCliente}} {{$cliente->apellidoPaternoCliente}} {{$cliente->apellidoMaternoCliente}}">
                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-field-celular col-lg-5">
                        
                            <label for="NoCelular" class="label">N° Celular</label>
                            <input type="text" class="input-text-celular" id="NoCelular" value="{{$cliente->telefonoCliente}}">
                           
                        </div>
                        <div class="form-field-celular col-lg-3">
                           
                            <input type="text" class="input-text-celular" id="NoCelular2" value="{{$cliente->telefonoDosCliente}}">
                            
                        </div>
                        <div class="form-field-celular col-lg-3 ">
                            
                            <input type="text" class="input-text-celular" id="NoCelular3" value="{{$cliente->telefonoTresCliente}}">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-field-DosColumnas col-lg-5">
                     
                            <label for="EstadoCivil" class="label">Estado civil</label>
                            <input type="text" class="input-text-DosColumnas" id="EstadoCivil" value="{{$cliente->estadoCivilCliente}}">
                           
                        </div>
                        <div class="form-field-DosColumnas col-lg-6">
                      
                            <label for="FechaNacimiento" class="label">Fecha nacimiento</label>
                            <input type="text" class="input-text-DosColumnas" id="FechaNacimiento" value="{{$cliente->fechaNacimientoCliente}}">
                          
                        </div>
                    </div>
                </div>
            </article>
            <article id="tab2">
                <div class="domicilioCliente">
                    <center>
                        <h2>Domicilio del cliente</h2>
                    </center>
                    <div class="row">
                        <div class="form-field-DosColumnas col-lg-5">
                            <label for="Estado" class="label">Estado</label>
                            <input type="text" class="input-text-DosColumnas" id="Estado" value="{{$cliente->nomEstado}}">
                        </div>
                        <div class="form-field-DosColumnas col-lg-6">
                            <label for="Municipio" class="label">Municipio</label>
                            <input type="text" class="input-text-DosColumnas" id="Municipio" value="{{$cliente->nomMunicipio}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-field-DosColumnas col-lg-6">
                            <label for="Colonia" class="label">Colonia</label>
                            <input type="text" class="input-text-DosColumnas" id="Colonia" value="{{$cliente->nomColonia}}">
                        </div>
                        <div class="form-field-DosColumnas col-lg-6">
                            <label for="Calle" class="label">Calle</label>
                            <input type="text" class="input-text-DosColumnas" id="Calle"  value="{{$cliente->calleCliente}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-field col-lg-4">
                            <label for="NoExt" class="label">N° Ext</label>
                            <input type="text" class="input-text" id="NoExt"  value="{{$cliente->numeroExteriorCasaCliente}}">
                        </div>
                        <div class="form-field col-lg-4">
                            <label for="NoInt" class="label">N° Int</label>
                            <input type="text" class="input-text" id="NoInt"  value="{{$cliente->numeroInteriorCasaCliente}}">
                        </div>
                        <div class="form-field col-lg-4 ">
                            <label for="cp" class="label">C.P.</label>
                            <input type="text" class="input-text" id="cp">
                        </div>
                    </div>
                    <div>
                        <div class="form-field col-lg-9">
                            <label for="EntreCalles" class="label">Entre calles</label>
                            <input type="text" class="input-text-columna" id="EntreCalles" value="{{$cliente->entreCallesCliente}}">
                        </div>
                    </div>
                    <div>
                        <div class="form-field col-lg-9">
                            <label for="referencias" class="label">Referencias</label>
                            <input type="text" class="input-text-columna" id="referencias" value="{{$cliente->referenciasCasaCliente}}"> 
                        </div>
                    </div>
                </div>
                <div class="domicilioClienteCobro">
                    <center>
                        <h2>Domicilio de cobro del cliente</h2>
                    </center>
                    <div class="row">
                        <div class="form-field-DosColumnas col-lg-6">
                            <label for="Municipio" class="label">Municipio</label>
                            @foreach($cobros as $cob)
                            <input type="text" class="input-text-DosColumnas" id="Municipio" value="{{ $cob-> nomMunicipio}}" >
                            @endforeach
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-field-DosColumnas col-lg-6">
                            <label for="Colonia" class="label">Colonia</label>
                            <input type="text" class="input-text-DosColumnas" id="Colonia" value="{{ $cob-> nomColonia}}">
                        </div>
                        <div class="form-field-DosColumnas col-lg-6">
                            <label for="Calle" class="label">Calle</label>
                            <input type="text" class="input-text-DosColumnas" id="Calle" value="{{$cliente->calleClienteCobro}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-field col-lg-4">
                            <label for="NoExt" class="label">N° Ext</label>
                            <input type="text" class="input-text" id="NoExt" value="{{$cliente->numeroExteriorCasaClienteCobro}}">
                        </div>
                        <div class="form-field col-lg-4">
                            <label for="NoInt" class="label">N° Int</label>
                            <input type="text" class="input-text" id="NoInt" value="{{$cliente->numeroInteriorCasaClienteCobro}}">
                        </div>
                        <div class="form-field col-lg-4 ">
                            <label for="cp" class="label">C.P.</label>
                            <input type="text" class="input-text" id="cp">
                        </div>
                    </div>
                    <div>
                        <div class="form-field col-lg-9">
                            <label for="EntreCalles" class="label">Entre calles</label>
                            <input type="text" class="input-text-columna" id="EntreCalles" value="{{$cliente->entreCallesClienteCobro}}" >
                        </div>
                    </div>
                    <div>
                        <div class="form-field col-lg-9">
                            <label for="referencias" class="label">Referencias</label>
                            <input type="text" class="input-text-columna" id="referencias" value="{{$cliente->referenciasCasaClienteCobro}}">
                        </div>
                    </div>
                </div>
            </article>
            <article id="tab3">
                <div class="datosCuenta">
                    <center>
                        <h2>Datos Cuenta</h2>
                    </center>
                    <div class="row">
                        <div class="form-field col-lg-4">
                            <label for="NoContrato" class="label" ">N° Contrato</label>
                            <input type="text" class="input-text" value="{{$cliente->cveContrato}}" id="NoContrato">
                        </div>
                        <div class="form-field col-lg-4">
                            <label for="NoSolicitud" class="label">N° Solicitud</label>
                            <input type="text" class="input-text" id="NoSolicitud" value="{{$cliente->cveSolicitud}}">
                        </div>
                        <div class="form-field col-lg-4 ">
                            <label for="Costo" class="label">Costo</label>
                            <input type="text" class="input-text" id="Costo"  value="{{$cliente->costoPaquete}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-field col-lg-4">
                            <label for="Adeudo" class="label">Adeudo</label>
                            <input type="text" class="input-text" id="Adeudo" value="{{$cliente->restantePaquete}}">
                        </div>
                        <div class="form-field-D col-lg-5">
                            <label for="liquidado" class="label">Deuda saldada</label>
                            <input type="text" class="input-text" id="liquidado" value="{{$cliente->totalPagado}}">
                        </div>
                        <div class="form-field-f col-lg-4 ">
                            <label for="formaPago" class="label">Forma pago</label>
                            <input type="text" class="input-text" id="formaPago" value="{{$cliente->nomFormaPago}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-field-DosColumnas col-lg-6">
                            <label for="fechaAfilación" class="label">Fecha de afilación</label>
                            <input type="text" class="input-text-DosColumnas" id="fechaAfilación" value="{{$cliente->fechaEmision}}">
                        </div>
                        <div class="form-field-DosColumnas col-lg-6">
                            <label for="Vendedor" class="label">Vendedor</label>
                            <input type="text" class="input-text-DosColumnas" id="Vendedor" value="{{$cliente->nombreVendedor}} {{$cliente->apellidoPaternoVendedor}} {{$cliente->apellidoMaternoVendedor}}">
                        </div>
                    </div>
                    <div>
                        <div class="form-field col-lg-6">
                            <label for="Cobrador" class="label">Cobrador</label>
                            <input type="text" class="input-text-columna" id="Cobrador" value="{{$cliente->nombreCobrador}} {{$cliente->apellidoPaternoCobrador}} {{$cliente->apellidoMaternoCobrador}}">
                        </div>
                    </div>
                </div>
            </article>
            <article id="tab4">
                <div class="pagos">
                    <div class="row">
                        <div class="form-field col-lg-4">
                            <label for="NoContrato" class="label">Estatus</label>
                            <input type="text" class="input-text" id="Estatus" value="{{$cliente->nomEstatusContrato}}">
                        </div>
                        <div class="form-field col-lg-4">
                            <label for="NoSolicitud" class="label">Total pagado</label>
                            <input type="text" class="input-text" id="TotalPagado" value="{{$cliente->totalPagado}}">
                        </div>
                        <div class="form-field col-lg-4 ">
                            <label for="Estatus" class="label">Adeudo</label>
                            <input type="text" class="input-text" id="Adeudo" value="{{$cliente->restantePaquete}}">
                        </div>
                    </div>

                </div>
                <div>
                    <table id="pagos" class="display compact" style="width:100%">
                        <thead>
                            <tr>
                            <th scope="col">Numero de Pago</th>
                            <th scope="col">Numero del Contrato</th>
                            <th scope="col">Forma de pago</th>
                            <th scope="col">Pago</th>
                            <th scope="col">Restante</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Cobrador</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($pagos as $pago)
                            <tr>
                                <td>{{ $pago-> cvePago}}</td>
                                <td>{{ $pago-> cveContrato}}</td>
                                <td>{{ $pago-> nomFormaPago}}</td>
                                <td>{{ $pago-> cantidadPago}}</td>
                                <td>{{ $pago-> restantePaquete}}</td>
                                <td>{{ $pago-> fechaPago}}</td>
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
    lengthMenu: [[5, 10, 20], [5, 10, 20]],
    language: {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
    });
});
</script>
@endsection
@endsection