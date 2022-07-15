@extends('layouts.plantilla')

@section('titulo','Home Ventas')
@section('css')
<link href="{{ asset('css/Ventas/agregarClientes.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

@endsection


@section('content')
@inject('estados','App\Services\Estados')
@include('includes.navbar')

<div class="contenedor">
   <div id="alerts">
   </div>
   <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item "><a id="url" href="/HomeVentas">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Agregar cliente</li>
        </ol>
    </nav>
    <div class="contenedorN2">
        <div class="col-lg-6 col-12 mx-auto">
            @if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
            </div>
            @endif
        </div>
        <div class="contenedorStep">
       
            <div class="step-row">
                <div id="progress"></div>
                <div class="step-col"><small>Parte 1</small></div>
                <div class="step-col"><small>Parte 2</small></div>
                <div class="step-col"><small>Parte 3</small></div>
                <div class="step-col"><small>Parte 4</small></div>
            </div>
            <div class="contenedorN3">

                <form class="col-12" method="POST" action="{{ route('insertarCliente.insertarCliente') }}">
                @csrf
                    <div id="cnp1" class="contenedorN3parte1">
                        <center>
                            <h2>Datos del cliente</h1>
                        </center>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <input type="text" class="form-control  @error('noSolicitud') is invalid @enderror" id="noSolicitud" name="noSolicitud" placeholder="*N° solicitud" value="{{old('noSolicitud')}}" required>
                                @error('noSolicitud')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror 
                            </div>
                            <div class="form-group col-md-5">
                                <input type="text" class="form-control @error('noContrato') is invalid @enderror" id="noContrato"  name="noContrato" placeholder="*N° contrato" value="{{old('noContrato')}}" required>
                                @error('noContrato')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror 
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-7">
                                <input type="text" class="form-control @error('nombreCliente') is invalid @enderror" id="nombreCliente"  name="nombreCliente" value="{{old('nombreCliente')}}" placeholder="*Nombre"  required>
                                @error('nombreCliente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror 
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control  @error('apellidoPaternoCliente') is invalid @enderror" id="apellidoPaternoCliente"  name="apellidoPaternoCliente" value="{{old('apellidoPaternoCliente')}}" placeholder="*Apellido Paterno" required>
                                @error('apellidoPaternoCliente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror 
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control @error('apellidoMaternoCliente') is invalid @enderror" id="apellidoMaternoCliente"  name="apellidoMaternoCliente" value="{{old('apellidoMaternoCliente')}}" placeholder="*Apellido Materno" required>
                                @error('apellidoMaternoCliente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror 
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control @error('apellidoMaternoCliente') is invalid @enderror" id="numeroTelefonoCliente"  name="numeroTelefonoCliente" value="{{old('numeroTelefonoCliente')}}" placeholder="*N° telefono" required>
                                @error('numeroTelefonoCliente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror 
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control @error('numeroTelefonoDosCliente') is invalid @enderror" id="numeroTelefonoDosCliente"  name="numeroTelefonoDosCliente" value="{{old('numeroTelefonoDosCliente')}}" placeholder="N° telefono 2">
                                @error('numeroTelefonoDosCliente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror 
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control @error('numeroTelefonoTresCliente') is invalid @enderror" id="numeroTelefonoTresCliente"  name="numeroTelefonoTresCliente" value="{{old('numeroTelefonoTresCliente')}}" placeholder="N° telefono 3">
                                @error('numeroTelefonoTresCliente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror 
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="form-group col-md-5">

                                <input  class="form-control  @error('estadoCivilCliente') is invalid @enderror" id="estadoCivilCliente" name="estadoCivilCliente" value="{{old('estadoCivilCliente')}}" placeholder="Estado civil">
                                @error('estadoCivilCliente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror 
                            </div>
                        </div>
                        <div class="form-row form-inline">
                            <div class="col-md-6 mb-3">
                                <label for="fechaNacimiento">Fecha de nacimiento</label>
                                <input type="date" class="form-control @error('fechaNacimientoCliente') is invalid @enderror" id="fechaNacimientoCliente" value="{{old('fechaNacimientoCliente')}}" name="fechaNacimientoCliente">
                                @error('fechaNacimientoCliente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror 
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" id="siguienteP2" class="btn btn-primary"><i class="fa-solid fa-circle-right"></i>Siguiente</button>
                        </div>
                    </div>
                    {{-- Termina el div parte 1 --}}
                    <div id="cnp2" class="contenedorN3parte2">
                        <center>
                            <h2>Domicilio del cliente</h1>
                        </center>


                        <div class="form-row form-inline">
                            <div class="col-md-5 mb-3">
                                <select id="estado" class="form-control @error('cveEstadoCliente') is invalid @enderror" name="cveEstadoCliente" value="{{old('cveEstadoCliente')}}" required>                                    
                               
                                @foreach($estados->get() as $index => $estado)
                                <option value="{{$index}}"{{ old('cveEstadoCliente')  == $index ? 'selected' :''}} >
                                  {{$estado}}  
                                </option> 
                                @endforeach
                                </select>
                                 @error('cveEstadoCliente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror 
                            </div>

                            <div class="col-md-6 mb-2">
                                <select id="municipio" data-old="{{old('cveMunicipioCliente')}}" class="form-control @error('cveMuncipioCliente') is invalid @enderror" value="{{old('cveMuncipioCliente')}}" name="cveMuncipioCliente"  required>
                                    
                                </select>
                                <button id="abrir-popupMunicipio" type="button" class="agregarElemento"> <i class="fa-solid fa-circle-plus fa-lg"></i></button>
                                @error('cveMunicipioCliente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror 
                            </div>
                        </div>
                        <div class="form-row form-inline">
                            <div class="col-md-7 mb-3">
                                <select id="colonia" name="cveColoniaCliente" data-old="{{old('cveColoniaCliente')}}" value="{{old('cveColoniaCliente')}}"  class="form-control @error('cveColoniaCliente') is invalid @enderror" required>
                                   
                                </select>
                                <button id="abrir-popupColonia" type="button" class="agregarElemento"> <i class="fa-solid fa-circle-plus fa-lg"></i></button>
                                @error('cveColoniaCliente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror 
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="col-md-5 mb-3">
                                <input type="text" class="form-control @error('calleCliente') is invalid @enderror" id="calle" name="calleCliente" value="{{old('calleCliente')}}" placeholder="*Calle" required>
                            
                            </div>
                            @error('calleCliente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{message}}</strong>
                                </span>
                                @enderror 
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control @error('numeroExteriorCasaCliente') is invalid @enderror" name="numeroExteriorCasaCliente" value="{{old('numeroExteriorCasaCliente')}}" id="nExt" placeholder="*N° ext" required>
                                @error('numeroExteriorCasaCliente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror  
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control @error('cveMuncipioCliente') is invalid @enderror" name="numeroInteriorCasaCliente" value="{{old('numeroInteriorCasaCliente')}}" id="nInt" placeholder="N° int">
                                @error('numeroInteriorCasaCliente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror 
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-7">
                                <input type="text" class="form-control @error('entreCallesCliente') is invalid @enderror" value="{{old('entreCallesCliente')}}" name="entreCallesCliente"  id="inputEntreCalles" placeholder="Entre calles">
                                @error('entreCallesCliente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror 
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <input type="text" class="form-control @error('referenciasCasaCliente') is invalid @enderror" value="{{old('referenciasCasaCliente')}}" name="referenciasCasaCliente" id="referenciasDomicilio" placeholder="Referencias del domicilio">
                                @error('referenciasCasaCliente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror  
                            </div>
                        </div>

                        <div class="form-row form-inline">
                            <input type="checkbox" name="check" id="check" value="1" onchange="javascript:showContent()" />
                            <p>¿El domicilio de cobro es diferente al del cliente?</p>
                        </div>
                        <div id="clienteCobro" style="display: none;">
                            <div class="form-row form-inline">

                                <div class="col-md-6 mb-3">
                                    <select id="municipioCobro" name="cveMunicipioClienteCobro" value="{{old('cveMunicipioClienteCobro')}}" data-old="{{old('cveMunicipioClienteCobro')}}" class="form-control @error('cveMunicipioClienteCobro') is invalid @enderror" >
                                        
                                    </select>
                                    @error('cveMunicipioClienteCobro')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror  
                                </div>
                            </div>
                            <div class="form-row form-inline">
                                <div class="col-md-5 mb-3">
                                    <select id="coloniaCobro" name="cveColoniaClienteCobro" value="{{old('cveColoniaClienteCobro')}}" data-old="{{old('cveColoniaClienteCobro')}}"   class="form-control @error('cveColoniaClienteCobro') is invalid @enderror">
                                       
                                    </select>
                                    @error('cveColoniaClienteCobro')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror 
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-7">
                                    <input type="text" class="form-control @error('calleClienteCobro') is invalid @enderror" name="calleClienteCobro" value="{{old('calleClienteCobro')}}"  id="calleCobro" placeholder="*Calle">
                                    @error('calleClienteCobro')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror 
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control @error('numeroExteriorCasaClienteCobro') is invalid @enderror" id="numeroExteriorCasaClienteCobro" value="{{old('numeroExteriorCasaClienteCobro')}}"  name="numeroExteriorCasaClienteCobro" placeholder="*N° ext">
                                    @error('numeroExteriorCasaClienteCobro')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror 
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control @error('numeroInteriorCasaClienteCobro') is invalid @enderror" value="{{old('numeroInteriorCasaClienteCobro')}}" id="numeroInteriorCasaClienteCobro" name="numeroInteriorCasaClienteCobro" placeholder="*N° int">
                                    @error('numeroInteriorCasaClienteCobro')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror 
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-7">
                                    <input type="text" class="form-control @error('entreCallesClienteCobro') is invalid @enderror" id="entreCallesClienteCobro" value="{{old('entreCallesClienteCobro')}}" name="entreCallesClienteCobro" placeholder="Entre calles">
                                    @error('entreCallesClienteCobro')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror 
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control @error('referenciasCasaClienteCobro') is invalid @enderror" id="referenciasCasaClienteCobro" name="referenciasCasaClienteCobro" value="{{old('referenciasCasaClienteCobro')}}" placeholder="Referencias del domicilio">
                                    @error('referenciasCasaClienteCobro')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" id="atrasP1" class="btn btn-secondary"><i class="fa-solid fa-circle-left fa-lg"></i>Atras</button>
                            <button type="button" id="siguienteP3" class="btn btn-primary"><i class="fa-solid fa-circle-right"></i>Siguiente</button>
                        </div>

                    </div>
                    {{-- Termina el div parte 2 --}}
                    <div id="cnp3" class="contenedorN3parte3">
                        <center>
                            <h2>Datos del paquete</h1>
                        </center>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control" id="nSolicitudRe" value=""  readonly>
                            
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control " id="nContratoRe" value="" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-5 mb-3">
                                <select  class="form-control @error('cvePaquete') is invalid @enderror" id="paquete" value="{{old('cvePaquete')}}" name="cvePaquete" required>
                                    <option selected>Paquete...</option>
                                    @foreach($paquetes as $paquete)
                                <option value="{{$paquete->cvePaquete}}">{{$paquete->nombrePaquete}}</option> 
                                @endforeach
                                </select>
                                @error('cvePaquete')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                                
                            </div>
                            <div class="col-md-3 mb-3 ">
                                <input type="text" class="form-control @error('costoPaquete') is invalid @enderror" name="costoPaquete"  id="precio" value="{{old('costoPaquete')}}"  readonly>
                                @error('costoPaquete')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4 ">
                                <input type="text" class="form-control @error('extraPaquete') is invalid @enderror" id="costoAdicional" value="{{old('extraPaquete')}}" name="extraPaquete" placeholder="$$ adicional" >
                                @error('extraPaquete')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row form-inline">
                            <div class="col-md-8 mb-3">
                                <select id="vendedor" name="cveVendedor" class="form-control @error('cveVendedor') is invalid @enderror" value="{{old('cveVendedor')}}" required>
                                    <option selected>*Vendedor...</option>
                                    @foreach($vendedores as $vendedor)
                                <option value="{{ $vendedor->cveVendedor}}">{{ $vendedor->nombreVendedor}} {{ $vendedor-> apellidoPaternoVendedor}} {{ $vendedor-> apellidoMaternoVendedor}}</option> 
                                @endforeach
                                </select>
                                @error('cveVendedor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                                
                            </div>
                        </div>
                        <div class="form-row form-inline">
                            <div class="col-md-6 mb-3">
                                <label for="fechaAfilacion">Fecha de afiliación</label>
                                <input type="date" class="form-control @error('fechaSolicitud') is invalid @enderror" name="fechaSolicitud" value="{{old('fechaSolicitud')}}" id="fechaSolicitud">
                                @error('fechaSolicitud')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" id="atrasP2" class="btn btn-secondary"><i class="fa-solid fa-circle-left fa-lg"></i>Atras</button>
                            <button type="button" id="siguienteP4" class="btn btn-primary"><i class="fa-solid fa-circle-right"></i>Siguiente</button>
                        </div>
                    </div>
                    {{-- Termina el div parte 3 --}}
                    <div id="cnp4" class="contenedorN3parte4">
                        <center>
                            <h2>Datos del pago</h1>
                        </center>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <select id="formaPago" name="cveFormaPago" value="{{old('cveFormaPago')}}" class="form-control @error('cveFormaPago') is invalid @enderror" required>
                                    <option selected>*Forma pago...</option>
                                    @foreach($formaPagos as $formaPago)
                                <option value="{{ $formaPago->cveFormaPago}}">{{ $formaPago->nomFormaPago}} </option> 
                                @endforeach
                                </select>
                                @error('cveFormaPago')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row form-inline">
                            <div class="col-md-8 mb-5">
                                <select class="form-control @error('cveCobrador') is invalid @enderror" name="cveCobrador" value="{{old('cveCobrador')}}" id="nombreCobrador" required>
                                    <option selected>*Cobrador...</option>
                                    @foreach($cobradores as $cobrador)
                                <option value="{{ $cobrador->cveCobrador}}">{{ $cobrador->nombreCobrador}} {{ $cobrador-> apellidoPaternoCobrador}} {{ $cobrador-> apellidoMaternoCobrador}} </option> 
                                @endforeach
                                </select>
                                @error('cveCobrador')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                        <div class="col-md-4 mb-3">
                                <input type="text" class="form-control @error('bonificacion') is invalid @enderror" value="{{old('bonificacion')}}" name="bonificación" id="bonificación" placeholder="Bonificación">
                                @error('bonificacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control @error('inversionInicial') is invalid @enderror" name="inversionInicial" id="inversionInicial" value="{{old('inversionInicial')}}" placeholder="Inversion incial">
                                @error('inversionInicial')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4 ">
                                <label for="staticEmail2">Fecha termino</label>
                                <input type="text" class="form-control"  id="fechaTermino" readonly>
                            </div>
                        </div>
                        <div class="form-group">

                            <button type="button" id="atrasP3" class="btn btn-secondary"><i class="fa-solid fa-circle-left fa-lg"></i>Atras</button>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </div>
                </form>

            </div>
            {{-- PopUp para agregar Estado --}}
            <div class="overlay" id="overlayEstado">
                <div class="popup" id="popupEstado">
                    <h2>Agregar Estado</h2>
                    <form id="formGuardarEstado" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <input type="text" class="form-control" id="nomEstado" name="nomEstado" placeholder="Nombre" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" id="btn-cerrar-popup" class="btn btn-danger">Cancelar</button>
                            <button type="button" id="btnGuardarEstado" class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
            {{-- PopUp para agregar Municipio --}}
            <div class="overlay" id="overlayMunicipio">
                <div class="popup" id="popupMunicipio">
                    <h2>Agregar Municipio</h2>
                    <form action="" method="post">
                    @csrf
                        <div class="form-row ">
                            <div class="form-group col-md-5">
                                <select id="nombreEstadoNew" class="form-control" required>
                                    <option selected>Estado....</option>
                                    @foreach($estados->get() as $index => $estado)
                                <option value="{{$index}}" >
                                  {{$estado}}  
                                </option> 
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <input type="text" class="form-control" name="nombreMunicipioNew" id="nombreMunicipioNew" placeholder="Nombre" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" id="btn-cerrar-popupMunicipio" class="btn btn-danger">Cancelar</button>
                            <button type="button" id="guardarMunicipio" class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
            {{-- PopUp para agregar Colonia --}}
            <div class="overlay" id="overlayColonia">
                <div class="popup" id="popupColonia">
                    <h2>Agregar Colonia</h2>
                    <form action="" method="POST">
                    @csrf
                        <div class="form-row ">
                            <div class="form-group col-md-5">

                                <select id="municipioColoniaNew" name="municipioColoniaNew" class="form-control">
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <input type="text" class="form-control" name="nomColoniaNew" id="nomColoniaNew" placeholder="Nombre">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" id="btn-cerrar-popupColonia" class="btn btn-danger">Cancelar</button>
                            <button type="button" id="guardarColonia" class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
           
        </div>
    </div>

</div>

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
<script src="{{ asset('js/Ventas/AgregarClientes.js') }}" charset="utf8" type="text/javascript"></script>
<script src="{{ asset('js/components/alerts.js') }}" charset="utf8" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#btnGuardarEstado').click(function(e){    
    e.preventDefault();
    var cveEstado = $('#nomEstado').val();
    var _token = $("input[name=_token]").val();
    console.log(cveEstado);
    $.ajax({
        type:"POST",
        url:"{{ route('insertarEstado.insertarEstado') }}",
        data:{
            cveEstado:cveEstado,
            _token:_token
        },
        success:function(res){
               console.log('Se ha creado un registro correctamente');
               alertSucces("Se agrego el estado");
               $('#nomEstado')[0].reset();
              /* var html = '';
               $(res.estados).each(function(key,value){
                html =+ '<option>'+value.nomEstado+'<option>';

               });*/
            },
        error:function(res){
            alertDanger("No se agrego el estado")
            console.log("No se ha hecho el registro");
        }            
        
    });
    return false;
});
$('#guardarMunicipio').click(function(e){    
    e.preventDefault();
    var cveEstado = $('#nombreEstadoNew').val();
    var nomMunicipio = $('#nombreMunicipioNew').val();
    var _token = $("input[name=_token]").val();
    console.log(nomMunicipio);
    $.ajax({
        type:"POST",
        url:"{{ route('insertarMunicipio.insertarMunicipio') }}",
        data:{
            cveEstado:cveEstado,
            nomMunicipio:nomMunicipio,
            _token:_token
        },
        success:function(res){
               console.log('Se ha creado un registro correctamente');
               alertSucces("Se agrego el Municipio");
               $('#nombreEstadoNew')[0].reset();
               $('#nombreMunicipioNew')[0].reset();
              /* var html = '';
               $(res.estados).each(function(key,value){
                html =+ '<option>'+value.nomEstado+'<option>';

               });*/
            },
        error:function(res){
            alertDanger("No se agrego el Municipio")
            console.log("No se ha hecho el registro");
        }            
        
    });
    return false;
});  
$('#guardarColonia').click(function(e){    
    e.preventDefault();
    var cveMunicipio = $('#municipioColoniaNew').val();
    var nomColonia = $('#nomColoniaNew').val();
    var _token = $("input[name=_token]").val();
    console.log(cveMunicipio);
    $.ajax({
        type:"POST",
        url:"{{ route('insertarColonia.insertarColonia') }}",
        data:{
            cveMunicipio:cveMunicipio,
            nomColonia:nomColonia,
            _token:_token
        },
        success:function(res){
               console.log('Se ha creado un registro correctamente');
               alertSucces("Se agrego la colonia");
               $('#municipioColoniaNew')[0].reset();
               $('#nomColoniaNew')[0].reset();
              /* var html = '';
               $(res.estados).each(function(key,value){
                html =+ '<option>'+value.nomEstado+'<option>';

               });*/
            },
        error:function(res){
            alertDanger("No se agrego la colonia")
            console.log("No se ha hecho el registro");
        }            
        
    });
    return false;
}); 
$("#estado").on('change',function(){
var cveEstado = $(this).val();
console.log(cveEstado);
if ($.trim(cveEstado)!=''){
$.get('consultarMunicipio',{cveEstado : cveEstado},function(municipios){
    console.log(municipios);
       $('#municipio').empty();
       $('#municipio').append("<option value=''> Municipios..</option>");
       $('#municipioCobro').append("<option value=''> Municipios..</option>");
       $('#municipioColoniaNew').append("<option value=''> Municipios..</option>");
        $.each(municipios,function(index,value){
            $('#municipio').append("<option value= '" + index + "' >"+value+"</option>");
            $('#municipioCobro').append("<option value= '" + index + "' >"+value+"</option>");
            $('#municipioColoniaNew').append("<option value= '" + index + "' >"+value+"</option>");
        })
        }           
);
}
});

$("#municipio").on('change',function(){
var cveMunicipio = $(this).val();
console.log(cveMunicipio);
if ($.trim(cveMunicipio)!=''){
$.get('consultarColonia',{cveMunicipio : cveMunicipio},function(colonias){
       $('#colonia').empty();
        $('#colonia').append("<option value=''> Colonias..</option>");
        $.each(colonias,function(index,value){
            $('#colonia').append("<option value= '" + index + "' >"+value+"</option>");
        })
        }           
);
}
});

$("#municipioCobro").on('change',function(){
var cveMunicipio = $(this).val();
console.log(cveMunicipio);
if ($.trim(cveMunicipio)!=''){
$.get('consultarColonia',{cveMunicipio : cveMunicipio},function(colonias){
       $('#coloniaCobro').empty();
        $('#coloniaCobro').append("<option value=''> Colonias..</option>");
        $.each(colonias,function(index,value){
            $('#coloniaCobro').append("<option value= '" + index + "' >"+value+"</option>");
        })
        }           
);
}
});

$("#paquete").on('change',function(){
var cvePaquete = $("#paquete").val();
console.log(cvePaquete);
if ($.trim(cvePaquete)!=''){
$.get('consultarPaquete',{cvePaquete : cvePaquete},function(paquetes){
       $('#precio').empty();
       $.each(paquetes,function(cvePaquete,costoPaquete){
        $('#precio').val(costoPaquete);
        console.log(costoPaquete);
        }) 
                 
    });
}
});
$("#noSolicitud").on('change',function(){
    var noSolicitud = $("#noSolicitud").val();
    $('#nSolicitudRe').val(noSolicitud);
});
$("#noContrato").on('change',function(){
    var noContrato = $("#noContrato").val();
    console.log(noContrato);
    $('#nContratoRe').val(noContrato);
});

});
</script>

@endsection
@endsection