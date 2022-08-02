@extends('layouts.plantilla')

@section('titulo','Clientes Cobranza')
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
      <li class="breadcrumb-item active" aria-current="page">Clientes</li>
    </ol>
  </nav>
    <div class="tablaclientes">

        <table id="clienteVentas" class="table display table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">N°Sol</th>
                    <th scope="col">N°Cont</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Estatus</th>
                    <th scope="col">Ver Cliente</th>
                </tr>
            </thead>
            <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente-> cveSolicitud}}</td>
                    <td>{{ $cliente-> cveContrato}}</td>
                    <td>{{ $cliente->nomCliente}} {{ $cliente-> apellidoPaternoCliente}} {{ $cliente-> apellidoMaternoCliente}}</td>
                    <td>{{ $cliente-> telefonoCliente}}</td>
                    <td>{{ $cliente-> nomEstatusContrato}}</td>
                    <td ><a href="/VerClienteCobranza/{{$cliente-> cveCliente}}"> <i class="far fa-eye fa-lg"></i></a></td>
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
@endsection
@endsection