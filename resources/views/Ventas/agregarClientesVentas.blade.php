@extends('layouts.plantilla')

@section('titulo','Home Ventas')
@section('css')
<link href="{{ asset('css/Ventas/agregarClientes.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

@endsection


@section('content')
@include('includes.navbar')
<div class="contenedor">
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
                                <input type="text" class="form-control" id="inputNoSolicitud" placeholder="*N° solicitud" required>
                            </div>
                            <div class="form-group col-md-5">
                                <input type="text" class="form-control" id="inputNoContrato" placeholder="*N° contrato" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-7">
                                <input type="text" class="form-control" id="inputNombre" placeholder="*Nombre" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="inputApellidoPaterno" placeholder="*Apellido Paterno" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="inputApellidoMaterno" placeholder="*Apellido Materno" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="inputNumeroTelefono" placeholder="*N° telefono" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="inputNumeroTelefono2" placeholder="*N° telefono 2">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="inputNumeroTelefono3" placeholder="*N° telefono 3">
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="form-group col-md-5">

                                <select id="inputState" class="form-control" id="estadoCivil" name="estadoCivil">
                                    <option selected>Estado civil...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row form-inline">
                            <div class="col-md-6 mb-3">
                                <label for="fechaNacimiento">Fecha de nacimiento</label>
                                <input type="date" class="form-control" id="fechaNacimiento">
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
                                <select id="estado" class="form-control" name="estado" required>
                                    <option selected>*Estado...</option>
                                  
                                </select>
                                <button id="abrir-popupEstado" type="button" class="agregarElemento"> <i class="fa-solid fa-circle-plus fa-lg"></i></button>
                            </div>

                            <div class="col-md-6 mb-2">
                                <select id="municipio" class="form-control" name="municipio" required>
                                    <option selected>*Municipio...</option>
                                    <option>...</option>
                                </select>
                                <button id="abrir-popupMunicipio" type="button" class="agregarElemento"> <i class="fa-solid fa-circle-plus fa-lg"></i></button>
                            </div>
                        </div>
                        <div class="form-row form-inline">
                            <div class="col-md-7 mb-3">
                                <select id="colonia" name="colonia" class="form-control" required>
                                    <option selected>*Colonia...</option>
                                    <option>...</option>
                                </select>
                                <button id="abrir-popupColonia" type="button" class="agregarElemento"> <i class="fa-solid fa-circle-plus fa-lg"></i></button>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="col-md-5 mb-3">
                                <input type="text" name="calle" class="form-control" id="calle" placeholder="*Calle" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="nExt" id="nExt" placeholder="*N° ext" required>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="nInt" id="nInt" placeholder="*N° int">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-7">
                                <input type="text" class="form-control" id="inputEntreCalles" placeholder="Entre calles">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <input type="text" class="form-control" id="referenciasDomicilio" placeholder="Referencias del domicilio">
                            </div>
                        </div>

                        <div class="form-row form-inline">
                            <input type="checkbox" name="check" id="check" value="1" onchange="javascript:showContent()" />
                            <p>¿El domicilio de cobro es diferente al del cliente?</p>
                        </div>
                        <div id="clienteCobro" style="display: none;">
                            <div class="form-row form-inline">

                                <div class="col-md-6 mb-3">
                                    <select id="MunicipioCobro" name="MunicipioCobro" class="form-control" >
                                        <option selected>Municipio...</option>
                                        <option>...</option>
                                    </select>
                                    <button id="abrir-popupMunicipioCobro" type="button" class="agregarElemento"> <i class="fa-solid fa-circle-plus fa-lg"></i></button>
                                </div>
                            </div>
                            <div class="form-row form-inline">
                                <div class="col-md-5 mb-3">
                                    <select id="ColoniaCobro" class="form-control">
                                        <option selected>Colonia...</option>
                                        <option>...</option>
                                    </select>
                                    <button id="abrir-popupColoniaCobro" type="button" class="agregarElemento"> <i class="fa-solid fa-circle-plus fa-lg"></i></button>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-7">
                                    <input type="text" class="form-control" name="calleCobro" id="calleCobro" placeholder="*Calle">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="nExtCobro" name="nExtCobro" placeholder="*N° ext">
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="nIntCobro" name="nIntCobro" placeholder="*N° int">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-7">
                                    <input type="text" class="form-control" id="entreCallesCobro" placeholder="Entre calles">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control" id="referenciasDomicilioCobro" placeholder="Referencias del domicilio">
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
                        <div class="form-row form-inline">
                            <div class="col-md-8 mb-3">
                                <select  class="form-control" id="paquete" name="paquete" required>
                                    <option selected>Paquete...</option>
                                    <option>...</option>
                                </select>

                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5 ">
                                <input type="text" class="form-control " id="precio" name="precio" placeholder="*Precio" required>
                            </div>
                        </div>
                        <div class="form-row form-inline">
                            <div class="col-md-8 mb-3">
                                <select id="vendedor" name="vendedor" class="form-control" required>
                                    <option selected>*Vendedor...</option>
                                    <option>...</option>
                                </select>
                                
                            </div>
                        </div>
                        <div class="form-row form-inline">
                            <div class="col-md-6 mb-3">
                                <label for="fechaAfilacion">Fecha de afiliación</label>
                                <input type="date" class="form-control" id="fechaAfilacion">
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
                        <h4>Datos de pago</h4>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <select id="formaPago" class="form-control" required>
                                    <option selected>*Forma pago...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row form-inline">
                            <div class="col-md-8 mb-3">
                                <select id="inputState" class="form-control" id="nombreCobrador" required>
                                    <option selected>*Cobrador...</option>
                                    <option>...</option>
                                </select>
                               
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" id="inversionInicial" placeholder="Inversion incial">
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
                    <form action="">
                        <div class="form-row ">
                            <div class="form-group col-md-5">

                                <select id="nombreEstado" class="form-control" required>
                                    <option selected>Estado</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <input type="text" class="form-control" id="nombreMunicipioNew" placeholder="Nombre" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" id="btn-cerrar-popupMunicipio" class="btn btn-danger">Cancelar</button>
                            <button type="button" class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
            {{-- PopUp para agregar Colonia --}}
            <div class="overlay" id="overlayColonia">
                <div class="popup" id="popupColonia">
                    <h2>Agregar Colonia</h2>
                    <form action="" method="POST">
                        <div class="form-row ">
                            <div class="form-group col-md-5">

                                <select id="coloniaNew" class="form-control">
                                    <option selected>Colonia</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <input type="text" class="form-control" id="inputNoSolicitud" placeholder="Nombre">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" id="btn-cerrar-popupColonia" class="btn btn-danger">Cancelar</button>
                            <button type="button" class="btn btn-success">Guardar</button>
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
<script src="{{ asset('js/Ventas/AgregarClientes.js') }}" charset="utf8" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
   
    $('#btnGuardarEstado').click(function(){
       
    var nomEstado = $('#nomEstado').val();
    var _token = $("input[name=_token]").val();
  
    $.ajax({
        type:"POST",
        url:"{{ route('insertarEstado.insertarEstado') }}",
        data:{
            nomEstado:nomEstado,
            _token:_token
        },
        success:function(res){
            if(res){
               
                alert("agregado con exito");
            }else{
                alert("Se ha hecho el registro con exito");
            }            
        }
    });
    return false;
});


});
</script>

@endsection
@endsection