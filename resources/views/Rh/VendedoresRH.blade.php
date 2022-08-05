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
  Agregar Vendedor
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
        <h5 class="modal-title" id="staticBackdropLabel">Agregar Vendedor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="/FVendedores" method="POST">
        @csrf
        <div class="mb-3">
          <label for=""  class="form-label">Nombre Vendedor</label>
          <input id="nombreVendedor" name="nombreVendedor" type="text" class="form-control" required >
        </div>
        <div class="mb-3">
          <label  class="form-label">Apellido Paterno</label>
          <input  id="apellidoPaternoVendedor" name="apellidoPaternoVendedor" type="text" class="form-control" required>
        </div>
        <div class="mb-3">
          <label  class="form-label">Apellido Materno</label>
          <input  id="apellidoMaternoVendedor" name="apellidoMaternoVendedor" type="text" class="form-control"required>
        </div>
        <div class="mb-3">
          <label  class="form-label">Comision Vendedor</label>
          <input  id="comisionVendedor" name="comisionVendedor" type="text" class="form-control" required>
        </div>

        <div class="form-group">
    <label for="InputcveEstatus">Estatus</label>
  <select class="form-select" name="cveEstatus" placeholder="Esttus"  name="cveEstatus" aria-label="Default select example"required>
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
                </tr>
            </thead>
            <tbody>
            @foreach($vendedores as $vendedor)
                            <tr>
                                <td>{{ $vendedor-> cveVendedor}}</td>
                                <td>{{ $vendedor->nombreVendedor}} {{ $vendedor-> apellidoPaternoVendedor}} {{ $vendedor-> apellidoMaternoVendedor}}</td>
                                <td>{{ $vendedor-> comisionVendedor}}</td>
                                <td>{{ $vendedor-> nomEstatus}}</td>
                                  
                                <!-- Button trigger modal -->
<!--<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop2/{{$vendedor-> cveVendedor}}">
  Editar
</button> -->
</div>

                                </td>
                              </tr>
                              @include('Rh.agregarVendedor')
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