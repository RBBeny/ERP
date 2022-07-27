@extends('layouts.plantilla')

@section('titulo','Vendedores RH')
@section('css')
{{-- <script src="{{ asset('js/Ventas/clientesVentas.js') }}" type="text/javascript" ></script> --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" type="text/css" rel="stylesheet">

<link href="{{ asset('css/Ventas/clientesVentas.css') }}" rel="stylesheet">
@endsection


@section('content')

@include('includes.navbarRh')

<div class="contenedor">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/homeRh">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">VendedoresRH</li>
  </ol>
</nav>

<!-- Button trigger modal -->
<div align="right" style="padding-right: 40px;">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  agregar usuario
</button>
</div>
<!-- Modal ag_regar usuario -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">agregar usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form>
        <div class="mb-3">
          <label   class="form-label">Nombre</label>
          <input   type="text" id="ag_1" class="form-control" >
        </div>
        <div class="mb-3">
          <label  class="form-label">Apellido Paterno</label>
          <input  id="ag_2" type="text" class="form-control">
        </div>
        <div class="mb-3">
          <label  class="form-label">Apellido Materno</label>
          <input  id="ag_3" type="text" class="form-control">
        </div>

        <div class="mb-3">
          <label  class="form-label">Rol</label>
                <select id="ag_5" class="form-select" aria-label=" select example">
                      <option selected value="">Selecciona opcion</option>
                                <option value="1">Ventas</option>
                                <option value="2">Cobranza</option>
                    </select>
        </div>
        <div class="form-group">
    <label for="InputcveEstatus">Estatus</label>
  <select class="form-select" id="cveEstatus" placeholder="Esttus"  name="cveEstatus" aria-label="Default select example">
  @foreach($estados as $estado)
  <option value="{{ $estado->cveEstatus}} ">{{$estado-> nomEstatus}}</option>
  @endforeach
</select>
</div>
        <button id="btn" type="submit" class="btn btn-primary btn-block" disabled>Submit</button>
      </form>
      </div>
    </div>
  </div>
</div>


<div class="tablaclientes">

        <table id="clienteVentas" class="table display table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Status</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Kevyn Cortez</td>
                    <td>Ventas</td>
                    <td>Activo</td>
                    <td><a href="/VerClienteVentas"> <i class="far fa-eye fa-lg"></i></a></td>
                </tr>
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