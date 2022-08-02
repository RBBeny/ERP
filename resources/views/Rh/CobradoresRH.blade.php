@extends('layouts.plantilla')

@section('titulo','Codradores RH')
@section('css')
{{-- <script src="{{ asset('js/Ventas/clientesVentas.js') }}" type="text/javascript" ></script> --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" type="text/css" rel="stylesheet">

<link href="{{ asset('css/Ventas/clientesVentas.css') }}" rel="stylesheet">
<link href="{{ asset('css/Administrador/usuariosAdmin.css') }}" rel="stylesheet">

@endsection


@section('content')

@include('includes.navbarRh')

<div class="contenedor">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/homeRh">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">CobradoresRH</li>
  </ol>
</nav>

<!-- Button trigger modal -->
<div align="right" style="padding-right: 40px;">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Agregar Cobrador
</button>
</div>
<br>
<br>
<div class="col-md-12">
@if(count($errors) > 0)
                <div class="errors">

                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" width:"200px">
                        {{ $error }}

                        
                    </div>


                    @endforeach

                </div>
                @endif
<!-- Modal ag_regar usuario -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Agregar Cobrador</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="/CjCobrador" method="POST"  class="formulario" id="formulario">
        @csrf
        <div class="mb-3">
          <label for=""  class="form-label">Nombre Cobrador</label>
          <input id="nombreCobradorr" name="nombreCobrador" type="text" class="form-control"  >
        </div>
        <div class="mb-3">
          <label  class="form-label">Apellido Paterno</label>
          <input  id="apellidoPaternoCobrador" name="apellidoPaternoCobrador" type="text" class="form-control" >
        </div>
        <div class="mb-3">
          <label  class="form-label">Apellido Materno</label>
          <input  id="apellidoMaternoCobrador" name="apellidoMaternoCobrador" type="text" class="form-control">
        </div>
        <div class="mb-3">
          <label  class="form-label">Comision Vendedor</label>
          <input  id="comisionCobrador" name="comisionCobrador" type="text" class="form-control" >
        </div>

        <div class="form-group">
    <label for="InputcveEstatus">Estatus</label>
  <select class="form-select" name="cveEstatus" placeholder="Esttus"  name="cveEstatus" aria-label="Default select example">
  @foreach($estados as $estado)
  <option value="{{ $estado->cveEstatus}} ">{{$estado-> nomEstatus}}</option>
  @endforeach
</select>
</div>
        <button type="button"  data-bs-dismiss="modal" aria-label="Close" class="btn btn-danger">Cancelar</button>
        <button type="submit"  class="btn btn-success" >Guardar</button>


  
      </form>
      </div>
    </div>
  </div>
</div>


<div class="tablaclientes">

        <table id="clienteVentas" class="table display table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Clave</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Comision</th>
                    <th scope="col">Estatus</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($cobradores as $cobrador)
                            <tr>
                                <td>{{ $cobrador-> cveCobrador}}</td>
                                <td>{{ $cobrador->nombreCobrador}} {{ $cobrador-> apellidoPaternoCobrador}} {{ $cobrador-> apellidoMaternoCobrador}}</td>
                                <td>{{ $cobrador-> comisionCobrador}}</td>
                                <td>{{ $cobrador-> nomEstatus}}</td>
                                <td>

                                </td>
                              </tr>
                            @endforeach
            </tbody>
        </table>

    </div>
</div>
@section('js')

<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('#clienteVentas').DataTable();
    });
</script>
<script>
  
</script>
@endsection
@endsection