@extends('layouts.plantilla')

@section('titulo','Home Ventas')
@section('css')
<link href="{{ asset('css/Ventas/agregarClientes.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

@endsection


@section('content')
@include('includes.navbar')
<div class="contenedor">
   <div id="alerts">
   </div>
    <div class="contenedorN2">

        <div class="contenedorStep">
            <h1>Agregar Cliente</h1>
            <div class="step-row">
                <div id="progress"></div>
                <div class="step-col"><small>Parte 1</small></div>
                <div class="step-col"><small>Parte 2</small></div>
                <div class="step-col"><small>Parte 3</small></div>
                <div class="step-col"><small>Parte 4</small></div>
            </div>
            <div class="contenedorN3">

                <form class="col-12" method="POST" action="/agregarUsuario">
                    <div id="cnp1" class="contenedorN3parte1">
                        <center>
                            <h2>Datos del cliente</h1>
                        </center>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <input type="text" class="form-control" id="inputNoSolicitud" name="noSolicitud" placeholder="*N° solicitud" required>
                            </div>
                            <div class="form-group col-md-5">
                                <input type="text" class="form-control" id="inputNoContrato"  name="noContrato" placeholder="*N° contrato" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-7">
                                <input type="text" class="form-control" id="inputNombre"  name="nombreCliente" placeholder="*Nombre" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="inputApellidoPaterno"  name="apellidoPaternoCliente" placeholder="*Apellido Paterno" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="inputApellidoMaterno"  name="apellidoMaternoCliente" placeholder="*Apellido Materno" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="inputNumeroTelefono"  name="numeroTelefonoCliente" placeholder="*N° telefono" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="inputNumeroTelefono2"  name="numeroTelefonoDosCliente" placeholder="*N° telefono 2">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="inputNumeroTelefono3"  name="numeroTelefonoTresCliente" placeholder="*N° telefono 3">
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="form-group col-md-5">

                                <select id="inputState" class="form-control" id="estadoCivil" name="estadoCivilCliente">
                                    <option selected>Estado civil...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row form-inline">
                            <div class="col-md-6 mb-3">
                                <label for="fechaNacimiento">Fecha de nacimiento</label>
                                <input type="date" class="form-control" id="fechaNacimiento"  name="fechaNacimientoCliente">
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
                                <select id="estado" class="form-control" name="estadoCliente"  required>                                    
                                <option selected>*Estado...</option>
                                @foreach($estados as $estado)
                                <option>{{$estado->nomEstado}}</option> 
                                @endforeach
                                </select>
                                <button id="abrir-popupEstado" type="button" class="agregarElemento"> <i class="fa-solid fa-circle-plus fa-lg"></i></button>
                            </div>

                            <div class="col-md-6 mb-2">
                                <select id="municipio" class="form-control" name="municipioCliente"  required>
                                    <option selected>*Municipio...</option>
                                    @foreach($municipios as $municipio)
                                <option>{{$municipio->nomMunicipio}}</option> 
                                @endforeach
                                </select>
                                <button id="abrir-popupMunicipio" type="button" class="agregarElemento"> <i class="fa-solid fa-circle-plus fa-lg"></i></button>
                            </div>
                        </div>
                        <div class="form-row form-inline">
                            <div class="col-md-7 mb-3">
                                <select id="colonia" name="coloniaCliente"   class="form-control" required>
                                    <option selected>*Colonia...</option>
                                    @foreach($colonias as $colonia)
                                <option>{{$colonia->nomColonia}}</option> 
                                @endforeach
                                </select>
                                <button id="abrir-popupColonia" type="button" class="agregarElemento"> <i class="fa-solid fa-circle-plus fa-lg"></i></button>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="col-md-5 mb-3">
                                <input type="text" class="form-control" id="calle" name="calleCliente"  placeholder="*Calle" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="numeroExteriorCasaCliente"  id="nExt" placeholder="*N° ext" required>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="numeroInteriorCasaCliente"  id="nInt" placeholder="*N° int">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-7">
                                <input type="text" class="form-control"  name="entreCallesCliente"  id="inputEntreCalles" placeholder="Entre calles">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <input type="text" class="form-control" name="referenciasCasaCliente" id="referenciasDomicilio" placeholder="Referencias del domicilio">
                            </div>
                        </div>

                        <div class="form-row form-inline">
                            <input type="checkbox" name="check" id="check" value="1" onchange="javascript:showContent()" />
                            <p>¿El domicilio de cobro es diferente al del cliente?</p>
                        </div>
                        <div id="clienteCobro" style="display: none;">
                            <div class="form-row form-inline">

                                <div class="col-md-6 mb-3">
                                    <select id="MunicipioCobro" name="municipioClienteCobro"  class="form-control" >
                                        <option selected>Municipio...</option>
                                        @foreach($municipios as $municipio)
                                <option>{{$municipio->nomMunicipio}}</option> 
                                @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="form-row form-inline">
                                <div class="col-md-5 mb-3">
                                    <select id="ColoniaCobro" name="coloniaClienteCobro"   class="form-control">
                                        <option selected>Colonia...</option>
                                        @foreach($colonias as $colonia)
                                <option>{{$colonia->nomColonia}}</option> 
                                @endforeach
                                    </select>
                                   
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-7">
                                    <input type="text" class="form-control" name="calleClienteCobro"  id="calleCobro" placeholder="*Calle">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="numeroExteriorCasaClienteCobro" name="numeroExteriorCasaClienteCobro" placeholder="*N° ext">
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="numeroInteriorCasaClienteCobro" name="numeroInteriorCasaClienteCobro" placeholder="*N° int">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-7">
                                    <input type="text" class="form-control" id="entreCallesClienteCobro" name="entreCallesClienteCobro" placeholder="Entre calles">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control" id="referenciasCasaClienteCobro" name="referenciasCasaClienteCobro" placeholder="Referencias del domicilio">
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
                                <input type="text" class="form-control" id="nSolicitudRe" placeholder="N° solicitud" readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control " id="nContratoRe" placeholder="N° contrato" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-5 mb-3">
                                <select  class="form-control" id="paquete" name="nomPaquete" required>
                                    <option selected>Paquete...</option>
                                    @foreach($paquetes as $paquete)
                                <option>{{$paquete->nombrePaquete}}</option> 
                                @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mb-3 ">
                                <input type="text" class="form-control " id="precio" name="precio" placeholder="*Precio" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3 ">
                                <input type="text" class="form-control " id="costoAdicional" name="extraPaquete" placeholder="$$ adicional" >
                            </div>
                        </div>
                        <div class="form-row form-inline">
                            <div class="col-md-8 mb-3">
                                <select id="vendedor" name="nombreVendedor" class="form-control" required>
                                    <option selected>*Vendedor...</option>
                                    @foreach($vendedores as $vendedor)
                                <option>{{ $vendedor->nombreVendedor}} {{ $vendedor-> apellidoPaternoVendedor}} {{ $vendedor-> apellidoMaternoVendedor}}</option> 
                                @endforeach
                                </select>
                                
                            </div>
                        </div>
                        <div class="form-row form-inline">
                            <div class="col-md-6 mb-3">
                                <label for="fechaAfilacion">Fecha de afiliación</label>
                                <input type="date" class="form-control" name="fechaSolicitud" id="fechaSolicitud">
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
                                <select id="formaPago" name="formaPago" class="form-control" required>
                                    <option selected>*Forma pago...</option>
                                    @foreach($formaPagos as $formaPago)
                                <option>{{ $formaPago->nomFormaPago}} </option> 
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row form-inline">
                            <div class="col-md-8 mb-5">
                                <select class="form-control" name="nombreCobrador" id="nombreCobrador" required>
                                    <option selected>*Cobrador...</option>
                                    @foreach($cobradores as $cobrador)
                                <option>{{ $cobrador->nombreCobrador}} {{ $cobrador-> apellidoPaternoCobrador}} {{ $cobrador-> apellidoMaternoCobrador}} </option> 
                                @endforeach
                                </select>
                               
                            </div>
                        </div>
                        <div class="form-row">
                        <div class="col-md-4 mb-3">
                                <input type="text" class="form-control" name="bonificación" id="bonificación" placeholder="Bonificación">
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control" name="inversionInicial" id="inversionInicial" placeholder="Inversion incial">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4 ">
                                <label for="staticEmail2">Fecha termino</label>
                                <input type="text" class="form-control" id="fechaTermino" readonly>
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
                                    <option selected>Estado</option>
                                    @foreach($estados as $estado)
                                <option>{{$estado->nomEstado}}</option> 
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

                                <select id="municipioColoniaNew" class="form-control">
                                    <option selected>Municipio</option>
                                    @foreach($municipios as $municipio)
                                <option>{{$municipio->nomMunicipio}}</option> 
                                @endforeach
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
    var nomEstado = $('#nomEstado').val();
    var _token = $("input[name=_token]").val();
    console.log(nomEstado);
    $.ajax({
        type:"POST",
        url:"{{ route('insertarEstado.insertarEstado') }}",
        data:{
            nomEstado:nomEstado,
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
    var nomEstado = $('#nombreEstadoNew').val();
    var nomMunicipio = $('#nombreMunicipioNew').val();
    var _token = $("input[name=_token]").val();
    console.log(nomMunicipio);
    $.ajax({
        type:"POST",
        url:"{{ route('insertarMunicipio.insertarMunicipio') }}",
        data:{
            nomEstado:nomEstado,
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
    var nomMunicipio = $('#municipioColoniaNew').val();
    var nomColonia = $('#nomColoniaNew').val();
    var _token = $("input[name=_token]").val();
    console.log(nomColonia);
    $.ajax({
        type:"POST",
        url:"{{ route('insertarColonia.insertarColonia') }}",
        data:{
            nomMunicipio:nomMunicipio,
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
});
</script>

@endsection
@endsection