@extends('layouts.plantilla')

@section('titulo','Usuarios Cobranza')
@section('css')
{{-- <script src="{{ asset('js/Ventas/clientesVentas.js') }}" type="text/javascript" ></script> --}}
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" type="text/css" rel="stylesheet">


<link href="{{ asset('css/Ventas/clientesVentas.css') }}" rel="stylesheet">
@endsection


@section('content')

@include('includes.navbarGCobranza')

<div class="contenedor">
<nav aria-label="breadcrumb" style="padding: 10px;">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/homeCobranza">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ver Usuarios</li>
  </ol>
</nav>    

<div class="tablaclientes" >

        <table id="clienteVentas" class="table display table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Numero de Pago</th>
                    <th scope="col">Numero del Contrato</th>
                    <th scope="col">Forma de pago</th>
                    <th scope="col">Pago</th>
                    <th scope="col">Restante</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Cobrador</th>   
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
                </tr>
                @endforeach
            </tbody>
        </table>
      
    </div>

</div>

@section('js')
<script src="js/GerenteCobranza/agregarUsuario.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
<script type="text/javascript">
    

$(document).ready(function() {
    $('#clienteVentas').DataTable({
        language: {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
    });
    

});
    
</script>


@endsection
@endsection
