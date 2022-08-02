@extends('layouts.plantilla')

@section('titulo','Home Ventas')
@section('css')
<link href="{{ asset('css/Ventas/agregarClientes.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

@endsection


@section('content')
@inject('estados','App\Services\Estados')
@include('includes.navbar')

<div class="contenedor">
    <div class="formulario__mensaje" id="formulario__mensaje">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>LLenar los campos correctamente </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>

    <div class="formulario__mensaje-exito" id="formulario__mensaje-exito">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Se agrego el registro correctamente!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>

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

            <form class="col-12 formulario" method="POST" id="formulario" action="{{ route('insertarCliente.insertarCliente') }}">
                @csrf
                <div id="cnp1" class="contenedorN3parte1">
                    <center>
                        <h2>Datos del cliente</h1>
                    </center>
                    <div class="form-row">
                        <div class="form-group col-md-5 " id="grupo__noSolicitud">
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input form-control  @error('noSolicitud') is invalid @enderror" id="noSolicitud" name="noSolicitud" placeholder="*N° solicitud" value="{{old('noSolicitud')}}" required>
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">El Numero de solicitud tiene que ser de 1 a 8 dígitos y solo puede contener numeros</p>
                            <p class="formulario__input-error-required">Este campo es requirido</p>

                            @error('noSolicitud')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="form-group col-md-5" id="grupo__noContrato">
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control formulario__input @error('noContrato') is invalid @enderror" id="noContrato" name="noContrato" placeholder="*N° contrato" value="{{old('noContrato')}}" required>
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">El Numero de contrato tiene que ser de 1 a 8 dígitos, solo puede contener una letra y numeros</p>
                            <p class="formulario__input-error-required">Este campo es requirido</p>
                            @error('noContrato')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-7" id="grupo__nombreCliente">
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control formulario__input @error('nombreCliente') is invalid @enderror" id="nombreCliente" name="nombreCliente" value="{{old('nombreCliente')}}" placeholder="*Nombre" required>
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">El nombre del cliente tiene que ser de maximo 30 caracteres y solo puede contener letras</p>
                            <p class="formulario__input-error-required">Este campo es requirido</p>
                            @error('nombreCliente')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6" id="grupo__apellidoPaternoCliente">
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control formulario__input  @error('apellidoPaternoCliente') is invalid @enderror" id="apellidoPaternoCliente" name="apellidoPaternoCliente" value="{{old('apellidoPaternoCliente')}}" placeholder="*Apellido Paterno" required>
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">El apellido del cliente tiene que ser de maximo 30 caracteres y solo puede contener letras</p>
                            <p class="formulario__input-error-required">Este campo es requirido</p>
                            @error('apellidoPaternoCliente')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6" id="grupo__apellidoMaternoCliente">
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control formulario__input @error('apellidoMaternoCliente') is invalid @enderror" id="apellidoMaternoCliente" name="apellidoMaternoCliente" value="{{old('apellidoMaternoCliente')}}" placeholder="*Apellido Materno" required>
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">El apellido del cliente tiene que ser de maximo 30 caracteres y solo puede contener letras</p>
                            <p class="formulario__input-error-required">Este campo es requirido</p>
                            @error('apellidoMaternoCliente')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6" id="grupo__numeroTelefonoCliente">
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control formulario__input @error('numeroTelefonoCliente') is invalid @enderror" id="numeroTelefonoCliente" name="numeroTelefonoCliente" value="{{old('numeroTelefonoCliente')}}" placeholder="*N° telefono" required>
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">El Numero de telefono tiene que ser de 10 a 11 dígitos y solo puede contener numeros</p>
                            <p class="formulario__input-error-required">Este campo es requirido</p>
                            @error('numeroTelefonoCliente')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6" id="grupo__numeroTelefonoDosCliente">
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control formulario__input @error('numeroTelefonoDosCliente') is invalid @enderror" id="numeroTelefonoDosCliente" name="numeroTelefonoDosCliente" value="{{old('numeroTelefonoDosCliente')}}" placeholder="N° telefono 2">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">El Numero de telefono tiene que ser de 10 a 11 dígitos y solo puede contener numeros</p>

                            @error('numeroTelefonoDosCliente')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6" id="grupo__numeroTelefonoTresCliente">
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control formulario__input @error('numeroTelefonoTresCliente') is invalid @enderror" id="numeroTelefonoTresCliente" name="numeroTelefonoTresCliente" value="{{old('numeroTelefonoTresCliente')}}" placeholder="N° telefono 3">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">El Numero de telefono tiene que ser de 10 a 11 dígitos y solo puede contener numeros</p>

                            @error('numeroTelefonoTresCliente')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-md-5" id="grupo__estadoCivilCliente">
                            <div class="formulario__grupo-input">
                                <input class="form-control formulario__input @error('estadoCivilCliente') is invalid @enderror" id="estadoCivilCliente" name="estadoCivilCliente" value="{{old('estadoCivilCliente')}}" placeholder="Estado civil">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">Tiene que ser de maximo 12 caracteres y solo puede contener letras</p>

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
                        <button type="button" id="siguienteP2" class="btn btn-primary"><i class="fa-solid fa-circle-right"></i> Siguiente</button>
                    </div>
                </div>
                {{-- Termina el div parte 1 --}}
                <div id="cnp2" class="contenedorN3parte2">
                    <center>
                        <h2>Domicilio del cliente</h1>
                    </center>


                    <div class="form-row form-inline">
                        <div class="col-md-5 mb-3" id="grupo__cveEstadoCliente">
                            <div class="formulario__grupo-input">
                                <select id="cveEstadoCliente" class="form-control formulario__input @error('cveEstadoCliente') is invalid @enderror" name="cveEstadoCliente" value="{{old('cveEstadoCliente')}}" required>

                                    @foreach($estados->get() as $index => $estado)
                                    <option value="{{$index}}" {{ old('cveEstadoCliente')  == $index ? 'selected' :''}}>
                                        {{$estado}}
                                    </option>
                                    @endforeach
                                </select>
                            
                            </div>
                            <p class="formulario__input-error">La opción no es valida</p>

                            @error('cveEstadoCliente')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2" id="grupo__cveMunicipioCliente">

                            <select id="cveMunicipioCliente" data-old="{{old('cveMunicipioCliente')}}" class="form-control  @error('cveMunicipioCliente') is invalid @enderror" value="{{old('cveMunicipioCliente')}}" name="cveMunicipioCliente" required>

                            </select>


                            <p class="formulario__input-error">La opción no es valida</p>
                            <button id="abrir-popupMunicipio" type="button" class="agregarElemento"> <i class="fa-solid fa-circle-plus fa-lg"></i></button>
                            @error('cveMunicipioCliente')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row form-inline">
                        <div class="col-md-8 mb-4" id="grupo__cveColoniaCliente">

                            <select id="cveColoniaCliente" name="cveColoniaCliente" data-old="{{old('cveColoniaCliente')}}" value="{{old('cveColoniaCliente')}}" class="form-control  @error('cveColoniaCliente') is invalid @enderror" required>

                            </select>


                            <p class="formulario__input-error">La opción no es valida</p>
                            <button id="abrir-popupColonia" type="button" class="agregarElemento"> <i class="fa-solid fa-circle-plus fa-lg"></i></button>
                            @error('cveColoniaCliente')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-4" id="grupo__calleCliente">
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control formulario__input @error('calleCliente') is invalid @enderror" id="calleCliente" name="calleCliente" value="{{old('calleCliente')}}" placeholder="*Calle" required>
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">la calle tiene que ser de maximo 30 caracteres, solo puede contener letras y numeros</p>
                            <p class="formulario__input-error-required">Este campo es requirido</p>
                        </div>
                        @error('calleCliente')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4" id="grupo__numeroExteriorCasaCliente">
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control formulario__input @error('numeroExteriorCasaCliente') is invalid @enderror" name="numeroExteriorCasaCliente" value="{{old('numeroExteriorCasaCliente')}}" id="numeroExteriorCasaCliente" placeholder="*N° ext" required>
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">El Numero de la casa tiene que ser de maximo 10 dígitos, solo puede contener numeros y letras</p>
                            <p class="formulario__input-error-required">Este campo es requirido</p>
                            @foreach ($errors->get('numeroExteriorCasaCliente') as $error)
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $error }}</strong>
                            </span>
                            @endforeach
                        </div>
                        <div class="form-group col-md-4" id="grupo__numeroInteriorCasaCliente">
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control formulario__input @error('numeroInteriorCasaCliente') is invalid @enderror" name="numeroInteriorCasaCliente" value="{{old('numeroInteriorCasaCliente')}}" id="numeroInteriorCasaCliente" placeholder="N° int">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">El Numero de la casa tiene que ser de maximo 10 dígitos, solo puede contener numeros y letras</p>

                            @error('numeroInteriorCasaCliente')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-9" id="grupo__entreCallesCliente">
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control formulario__input @error('entreCallesCliente') is invalid @enderror" value="{{old('entreCallesCliente')}}" name="entreCallesCliente" id="entreCallesCliente" placeholder="Entre calles">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">Tiene que ser de maximo 50 caracteres, solo puede contener letras y numeros</p>
                            @error('entreCallesCliente')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-9" id="grupo__referenciasCasaCliente">
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control formulario__input @error('referenciasCasaCliente') is invalid @enderror" value="{{old('referenciasCasaCliente')}}" name="referenciasCasaCliente" id="referenciasCasaCliente" placeholder="Referencias del domicilio">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">Tiene que ser de maximo 50 caracteres y solo puede contener letras</p>

                            @error('referenciasCasaCliente')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row form-inline">
                        <input type="checkbox" id="check" value="1" onchange="javascript:showContent()" />
                        <p> ¿El domicilio de cobro es diferente al del cliente?</p>
                    </div>
                    <div id="clienteCobro" style="display: none;">
                        <div class="form-row form-inline">

                            <div class="col-md-6 mb-3" id="grupo__cveMunicipioClienteCobro">
                                <div class="formulario__grupo-input">
                                    <select id="cveMunicipioClienteCobro" name="cveMunicipioClienteCobro" value="{{old('cveMunicipioClienteCobro')}}" data-old="{{old('cveMunicipioClienteCobro')}}" class="form-control formulario__input @error('cveMunicipioClienteCobro') is invalid @enderror">
                                        <option value="">Municipio...</option>
                                    </select>
                                   
                                </div>
                                <p class="formulario__input-error">La opción no es valida</p>
                                @error('cveMunicipioClienteCobro')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row form-inline">
                            <div class="col-md-5 mb-3" id="grupo__cveColoniaClienteCobro">
                                <div class="formulario__grupo-input">
                                    <select id="cveColoniaClienteCobro" name="cveColoniaClienteCobro" value="{{old('cveColoniaClienteCobro')}} " data-old="{{old('cveColoniaClienteCobro')}}" class="form-control formulario__input @error('cveColoniaClienteCobro') is invalid @enderror">
                                        <option value="">Colonia...</option>
                                    </select>
                    
                                </div>
                                <p class="formulario__input-error">La opción no es valida</p>
                                @error('cveColoniaClienteCobro')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-7" id="grupo__calleClienteCobro">
                                <div class="formulario__grupo-input">
                                    <input type="text" class="form-control formulario__input  @error('calleClienteCobro') is invalid @enderror" name="calleClienteCobro" value="{{old('calleClienteCobro')}}" id="calleClienteCobro" placeholder="*Calle">
                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                </div>
                                <p class="formulario__input-error">la calle tiene que ser de maximo 30 caracteres, solo puede contener letras y numeros</p>

                                @error('calleClienteCobro')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4" id="grupo__numeroExteriorCasaClienteCobro">
                                <div class="formulario__grupo-input">
                                    <input type="text" class="form-control formulario__input  @error('numeroExteriorCasaClienteCobro') is invalid @enderror" id="numeroExteriorCasaClienteCobro" value="{{old('numeroExteriorCasaClienteCobro')}}" name="numeroExteriorCasaClienteCobro" placeholder="*N° ext">
                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                </div>
                                <p class="formulario__input-error">El Numero de la casa tiene que ser de maximo 10 dígitos, solo puede contener numeros y letras</p>

                                @error('numeroExteriorCasaClienteCobro')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4" id="grupo__numeroInteriorCasaClienteCobro">
                                <div class="formulario__grupo-input">
                                    <input type="text" class="form-control formulario__input  @error('numeroInteriorCasaClienteCobro') is invalid @enderror" value="{{old('numeroInteriorCasaClienteCobro')}}" id="numeroInteriorCasaClienteCobro" name="numeroInteriorCasaClienteCobro" placeholder="*N° int">
                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                </div>
                                <p class="formulario__input-error">El Numero de la casa tiene que ser de maximo 10 dígitos, solo puede contener numeros y letras</p>

                                @error('numeroInteriorCasaClienteCobro')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-7" id="grupo__entreCallesClienteCobro">
                                <div class="formulario__grupo-input">
                                    <input type="text" class="form-control formulario__input @error('entreCallesClienteCobro') is invalid @enderror" id="entreCallesClienteCobro" value="{{old('entreCallesClienteCobro')}}" name="entreCallesClienteCobro" placeholder="Entre calles">
                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                </div>
                                <p class="formulario__input-error">Tiene que ser de maximo 50 caracteres, solo puede contener letras y numeros</p>

                                @error('entreCallesClienteCobro')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8" id="grupo__referenciasCasaClienteCobro">
                                <div class="formulario__grupo-input">
                                    <input type="text" class="form-control formulario__input @error('referenciasCasaClienteCobro') is invalid @enderror" id="referenciasCasaClienteCobro" name="referenciasCasaClienteCobro" value="{{old('referenciasCasaClienteCobro')}}" placeholder="Referencias del domicilio">
                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                </div>
                                <p class="formulario__input-error">Tiene que ser de maximo 50 caracteres y solo puede contener letras</p>

                                @error('referenciasCasaClienteCobro')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" id="atrasP1" class="btn btn-secondary"><i class="fa-solid fa-circle-left fa-lg"></i> Atras</button>
                        <button type="button" id="siguienteP3" class="btn btn-primary"><i class="fa-solid fa-circle-right"></i> Siguiente</button>
                    </div>

                </div>
                {{-- Termina el div parte 2 --}}
                <div id="cnp3" class="contenedorN3parte3">
                    <center>
                        <h2>Datos del paquete</h1>
                    </center>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <input type="text" class="form-control" id="nSolicitudRe" value="" readonly>

                        </div>
                        <div class="col-md-4 mb-3">
                            <input type="text" class="form-control " id="nContratoRe" value="" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-5 mb-3" id="grupo__cvePaquete">
                            <div class="formulario__grupo-input">
                                <select id="cvePaquete" class="form-control formulario__input @error('cvePaquete') is invalid @enderror"  value="{{old('cvePaquete')}}" name="cvePaquete" required>
                                    <option selected>Paquete...</option>
                                    @foreach($paquetes as $paquete)
                                    <option value="{{$paquete->cvePaquete}}">{{$paquete->nombrePaquete}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <p class="formulario__input-error">La opción no es valida</p>
                            @error('cvePaquete')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="col-md-3 mb-3 " id="grupo__costoPaquete">
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control formulario__input @error('costoPaquete') is invalid @enderror" name="costoPaquete" id="precio" value="{{old('costoPaquete')}}" readonly>
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            @error('costoPaquete')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4 " id="grupo__extraPaquete">
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control formulario__input @error('extraPaquete') is invalid @enderror" id="costoAdicional" value="{{old('extraPaquete')}}" name="extraPaquete" placeholder="$$ adicional">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">solo puede tener maximo 8 digitos. El campo debe de tener el siguiente formato 5000.00, solo puede contener numeros y un punto</p>

                            @error('extraPaquete')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row form-inline">
                        <div class="col-md-8 mb-3" id="grupo__cveVendedor">
                            <div class="formulario__grupo-input">
                                <select id="cveVendedor" name="cveVendedor" class="form-control formulario__input @error('cveVendedor') is invalid @enderror" value="{{old('cveVendedor')}}" required>
                                    <option selected>*Vendedor...</option>
                                    @foreach($vendedores as $vendedor)
                                    <option value="{{ $vendedor->cveVendedor}}">{{ $vendedor->nombreVendedor}} {{ $vendedor-> apellidoPaternoVendedor}} {{ $vendedor-> apellidoMaternoVendedor}}</option>
                                    @endforeach
                                </select>
    
                            </div>
                            <p class="formulario__input-error">La opción no es valida</p>
                            @error('cveVendedor')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>
                    <div class="form-row form-inline">
                        <div class="col-md-6 mb-3">
                            <label for="fechaSolicitud">* Fecha de afiliación</label>
                            <input type="date" class="form-control @error('fechaSolicitud') is invalid @enderror" name="fechaSolicitud" value="{{old('fechaSolicitud')}}" id="v" required>
                            @error('fechaSolicitud')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" id="atrasP2" class="btn btn-secondary"><i class="fa-solid fa-circle-left fa-lg"></i> Atras</button>
                        <button type="button" id="siguienteP4" class="btn btn-primary"><i class="fa-solid fa-circle-right"></i> Siguiente</button>
                    </div>
                </div>
                {{-- Termina el div parte 3 --}}
                <div id="cnp4" class="contenedorN3parte4">
                    <center>
                        <h2>Datos del pago</h1>
                    </center>
                    <div class="form-row">
                        <div class="form-group col-md-4" id="grupo__cveFormaPago">
                            <div class="formulario__grupo-input">
                                <select id="cveFormaPago" name="cveFormaPago" value="{{old('cveFormaPago')}}" class="form-control formulario__input @error('cveFormaPago') is invalid @enderror" required>
                                    <option selected>*Forma pago...</option>
                                    @foreach($formaPagos as $formaPago)
                                    <option value="{{ $formaPago->cveFormaPago}}">{{ $formaPago->nomFormaPago}} </option>
                                    @endforeach
                                </select>

                            </div>
                            <p class="formulario__input-error">La opción no es valida</p>
                            @error('cveFormaPago')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4" id="grupo__cveCobrador">
                            <div class="formulario__grupo-input">
                                <select class="form-control formulario__input @error('cveCobrador') is invalid @enderror" name="cveCobrador" value="{{old('cveCobrador')}}" id="cveCobrador" required>
                                    <option selected>*Cobrador...</option>
                                    @foreach($cobradores as $cobrador)
                                    <option value="{{ $cobrador->cveCobrador}}">{{ $cobrador->nombreCobrador}} {{ $cobrador-> apellidoPaternoCobrador}} {{ $cobrador-> apellidoMaternoCobrador}} </option>
                                    @endforeach
                                </select>

                            </div>
                            <p class="formulario__input-error">La opción no es valida</p>
                            @error('cveCobrador')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3" id="grupo__bonificacion">
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control formulario__input @error('bonificacion') is invalid @enderror" value="{{old('bonificacion')}}" name="bonificacion" id="bonificacion" placeholder="Bonificación">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">solo puede tener maximo 8 digitos. El campo debe de tener el siguiente formato 5000.00, solo puede contener numeros y un punto</p>

                            @error('bonificacion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3" id="grupo__inversionInicial">
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control formulario__input @error('inversionInicial') is invalid @enderror" name="inversionInicial" id="inversionInicial" value="{{old('inversionInicial')}}" placeholder="Inversion incial">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">solo puede tener maximo 8 digitos. El campo debe de tener el siguiente formato 5000.00, solo puede contener numeros y un punto</p>

                            @error('inversionInicial')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">

                        <button type="button" id="atrasP3" class="btn btn-secondary"><i class="fa-solid fa-circle-left fa-lg"></i> Atras</button>
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
                <form action="" id="AgregarMunicipio" method="post">
                    @csrf
                    <div class="form-row ">
                        <div class="form-group col-md-5">
                            <select id="cveEstadoNew" class="form-control" required>

                                @foreach($estados->get() as $index => $estado)
                                <option value="{{$index}}">
                                    {{$estado}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="nombreMunicipioNew" id="nombreMunicipioNew" placeholder="Nombre" required>
                        </div>
                    </div>
                    <div class="form-group botones-popup">
                        <button type="button" id="btn-cerrar-popupMunicipio" class="btn btn-danger boton-cerrar">Cancelar</button>
                        <button type="submit" id="guardarMunicipio" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- PopUp para agregar Colonia --}}
        <div class="overlay" id="overlayColonia">
            <div class="popup" id="popupColonia">
                <h2>Agregar Colonia</h2>
                <form action="" id="AgregarColonia" method="POST">
                    @csrf
                    <div class="form-row ">
                        <div class="form-group col-md-8">

                            <select id="cveMunicipioColoniaNew" name="municipioColoniaNew" class="form-control">
                                <option>Municipio...</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" name="nomColoniaNew" id="nomColoniaNew" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="form-group botones-popup">
                        <button type="button" id="btn-cerrar-popupColonia" class="btn btn-danger boton-cerrar">Cancelar</button>
                        <button type="submit" id="guardarColonia" class="btn btn-success">Guardar</button>
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
<script src="{{ asset('js/Ventas/AgregarClientesEstilos.js') }}" charset="utf8" type="text/javascript"></script>
<script src="{{ asset('js/Ventas/AgregarClienteAjax.js') }}" charset="utf8" type="text/javascript"></script>
<script src="{{ asset('js/Ventas/AgregarClienteValidaciones.js') }}" charset="utf8" type="text/javascript"></script>

@endsection
@endsection