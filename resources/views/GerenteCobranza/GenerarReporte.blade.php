@extends('layouts.plantilla')

@section('titulo','Reportes')
@section('css')
{{-- <script src="{{ asset('js/Ventas/clientesVentas.js') }}" type="text/javascript" ></script> --}}
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" type="text/css" rel="stylesheet">


<link href="{{ asset('css/Ventas/clientesVentas.css') }}" rel="stylesheet">
<link href="{{ asset('css/GerenteCobranza/GenerarReporte.css') }}" rel="stylesheet">
<link href="{{ asset('css/alertify.css') }}" rel="stylesheet">
@endsection


@section('content')

@include('includes.navbarGCobranza')

<div class="contenedor">
<nav aria-label="breadcrumb" style="padding: 10px;">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/homeCobranza">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Generar Reportes</li>
  </ol>
</nav>    

<div class="tablaclientes" >
    
    <form action="POST" id="formulario">
        @csrf
     <div class="row row_uno" >
        <div class="col-3" id="grupo_fechaDesde"  name="grupo_fechaDesde">
            
                <label for="fechaDesde">Fecha desde:</label>
                <input type="date" class="form-control"  id="fechaDesde"  name="fechaDesde" required>
                <strong class="fecha_error">La fecha debe de ser anterior a la fecha del dia de hoy e inferior a la fecha hasta.</strong>
                
                <br>
        </div>
            <div class="col-3" id="grupo_fechaHasta">
                <label for="fechaHasta">Fecha hasta:</label>
                <input type="date" class="form-control" id="fechaHasta" name="fechaHasta" required>
                <strong class="fecha_error">La fecha debe de ser igual o anterior a la fecha actual, no debe de ser anterior a la fecha de inicio y debe seleccionar la fecha de inicio primero.</strong>
                <br>
            </div>
            <div class="col-2" >
                <br>
                <button type="submit" class="btn btn-primary btn_reporte">Filtrar</button>
                
            </div>
            <div class="col-2">
                <br>
                <button type="button" onclick="reporteI()" class="btn btn-info btn_reporte">Reporte ingresos</button>
                
            </div>
            <div class="col-2">
                <br>
                <button type="button" onclick="reporteIdetallado()" class="btn btn-info btn_reporte">Reporte detallado</button></a>
                
            </div>
        </div>
        </form>
        <hr>
        <table id="clienteVentas" class="table display table-striped table-bordered nowrap" style="width:90%">
            <thead>
                <tr>
                    <th scope="col">N° Pago</th>
                    <th scope="col">N° Cont</th>
                    <th scope="col">Forma pago</th>
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
      <br>
    </div>

</div>

@section('js')

<script src="js/GerenteCobranza/validacionFecha.js"></script>
<script src="js/notificacion.js"></script>
<script type="text/javascript" src="js/alertify.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.js"></script>
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
