@extends('layouts.plantilla')

@section('titulo','Pagos Cobranza')
@section('css')
{{-- <script src="{{ asset('js/Ventas/clientesVentas.js') }}" type="text/javascript" ></script> --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" type="text/css" rel="stylesheet">

<link href="{{ asset('css/Ventas/clientesVentas.css') }}" rel="stylesheet">

@endsection


@section('content')

@include('includes.navbarCobranza')

<div class="contenedor">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/homeCobranza">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">CobradoresRH</li>
  </ol>
</nav>

<!-- Button trigger modal -->
<div align="right" style="padding-right: 40px;">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Agregar Pagos
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
        <h5 class="modal-title" id="staticBackdropLabel">Agregar Pago</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="/PagosC" method="POST">
        @csrf
        <div class="mb-3">
          <label for=""  class="form-label">cvePago</label>
          <input id="cvePago" name="cvePago" type="number" class="form-control"  >
        </div>
        <div class="mb-3">
          <label  class="form-label">fechaPago</label>
          <input  id="fechaPago" name="fechaPago" type="date" class="form-control" >
        </div>
        <div class="mb-3">
          <label  class="form-label">cantidadPago</label>
          <input  id="cantidadPago" name="cantidadPago" type="text" class="form-control">
        </div>
        <div class="mb-3">
          <label  class="form-label">cveContrato</label>
          <input  id="cveContrato" name="cveContrato" type="text" class="form-control" >
        </div>
        <div class="mb-3">
          <label  class="form-label">cveCobrador</label>
          <input  id="cveCobrador" name="cveCobrador" type="text" class="form-control" >
        </div>
        <button type="button"  data-bs-dismiss="modal" aria-label="Close" class="btn btn-danger">Cancelar</button>
        <button type="submit"  class="btn btn-success" >Guardar</button>


  
      </form>
      </div>
    </div>
  </div>
</div>


<table id="pagos"  class="table display table-striped table-bordered nowrap" style="width:100%">
                        <thead>
                            <tr>
                            <th scope="col">Numero de Pago</th>
                            <th scope="col">Numero del Contrato</th>
                            <th scope="col">Forma de pago</th>
                            <th scope="col">Pago</th>
                            <th scope="col">Restante</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Cobrador</th>
                            <th scope="col">Elimimar</th>

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
        $('#pagos').DataTable({
            responsive: true
        });

    });

</script>
<script>
  
</script>
@endsection
@endsection