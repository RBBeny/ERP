@extends('layouts.plantilla')

@section('titulo','Pagos Cobranza')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" type="text/css" rel="stylesheet">

<link href="{{ asset('css/Cobranza/PCobranza.css') }}" rel="stylesheet">

@endsection


@section('content')

@include('includes.navbarCobranza')

<div class="contenedor">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/homeCobranza">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Pagos</li>
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
            <form action="/PagosC" id="Pagos" method="POST">
              @csrf
              <div class="mb-3">
                <label for="" class="form-label">Folio Recibo</label>
                <input id="cvePago" name="cvePago" type="number" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Folio Contrato</label>
                <input id="cveContrato" name="cveContrato" type="text" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Cliente</label>
                <input id="cliente" type="text" class="form-control" value="" readonly>
              </div>
              <div class="mb-3">
                <label class="form-label">fecha del Pago</label>
                <input id="fechaPago" name="fechaPago" type="date" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">cantidad Pago</label>
                <input id="cantidadPago" name="cantidadPago" type="text" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="cveCobrador">Cobrador</label>
                <select class="form-select" name="cveCobrador" placeholder="Cobrador" name="cveCobrador" aria-label="Default select example" required>
                  <option>Cobrador</option>
                  @foreach($cobradores as $cobrador)
                  <option value="{{ $cobrador->cveCobrador}} ">{{$cobrador->nombreCobrador}} {{$cobrador->apellidoPaternoCobrador}} {{$cobrador->apellidoMaternoCobrador}}</option>
                  @endforeach
                  <!--cveCobrador, nombreCobrador, apellidoPaternoCobrador, apellidoMaternoCobrador, comisionCobrador, cveEstatus-->
                </select>
              </div>
              <button type="button" id="btn-cerrar" data-bs-dismiss="modal" aria-label="Close" class="btn btn-danger">Cancelar</button>
              <button type="submit" class="btn btn-success">Guardar</button>
            </form>
          </div>
        </div>
      </div>
    </div>


  </div>

  <table id="pagos" class="table display table-striped table-bordered nowrap" style="width:80%">
    <thead>
      <tr>
        <th scope="col">Folio</th>
        <th scope="col">N Cont</th>
        <th scope="col">Forma pago</th>
        <th scope="col">Pago</th>  
        <th scope="col">Fecha</th>
        <th scope="col">Cobrador</th>
        <th scope="col">Eliminar</th>
      </tr>
    </thead>
    <tbody>

      @foreach($pagos as $pago)
      <tr>
        <td>{{ $pago-> cvePago}}</td>
        <td>{{ $pago-> cveContrato}}</td>
        <td>{{ $pago-> nomFormaPago}}</td>
        <td>{{ $pago-> cantidadPago}}</td>
        <td>{{ $pago-> fechaPago}}</td>
        <td>{{ $pago->nombreCobrador}} {{ $pago-> apellidoPaternoCobrador}}</td>
        <td><a data-bs-toggle="modal" data-bs-target="#modal-delete-{{$pago-> cvePago}}"><i class="fas fa-trash fa-lg"></i></a></td>


      </tr>
      @include('Cobranza.PagoDelete')

      @endforeach
    </tbody>
  </table>
</div>

@section('js')

<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
<script src="{{ asset('js/Cobranza/agregarPago.js') }}" charset="utf8"type="text/javascript"></script>

<script>
  $(document).ready(function() {
    $('#pagos').DataTable({
      language: {
        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
      },
      responsive: true,
      order: [
        [1, "desc"]
      ]
    });

  });
</script>
<script>

</script>
@endsection
@endsection