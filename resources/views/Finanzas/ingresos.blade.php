@extends('layouts.plantilla')

@section('titulo','Ingresos')
@section('css')
{{-- <script src="{{ asset('js/Ventas/clientesVentas.js') }}" type="text/javascript" ></script> --}}
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" type="text/css" rel="stylesheet">


<link href="{{ asset('css/Ventas/clientesVentas.css') }}" rel="stylesheet">
<link href="{{ asset('css/GerenteCobranza/GenerarReporte.css') }}" rel="stylesheet">
<link href="{{ asset('css/alertify.css') }}" rel="stylesheet">
@endsection


@section('content')

@include('includes.navbarFinanzas')

<div class="contenedor">
    <h1>Ingresos</h1>
    <br>
    <nav aria-label="breadcrumb" style="padding: 10px;">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/homeCobranza">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Generar Reportes</li>
    </ol>
    </nav>    
    <br>
    <div class="tablaIngresos">
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
            <div class="col-2">
                <br>
                <button type="button" onclick="reporteI()" class="btn btn-info btn_reporte">Reporte ingresos</button>
                
            </div>
        </div>
        </form>
        <hr>
        <h4>TOTAL COBROS: ${{$total}} , TOTAL COMISIONES:${{$comision}} , TOTAL FIDEICOMISO:${{$fideicomiso}} </h4>
        <hr>
        <table id="Ingresos" class="table display table-striped table-bordered nowrap" style="width:90%">
            <thead>
                <tr>
                    <th scope="col">Cobrador</th>
                    <th scope="col">Total cobrado</th>
                    <th scope="col">Comision</th>
                    <th scope="col">Fideicomiso</th>
                </tr>
            </thead>
            <tbody>
            @foreach($registros as $registros)
                <tr>
                    <td>{{ $registros-> nombreCobrador}} {{ $registros-> apellidoPaternoCobrador}} {{ $registros-> apellidoMaternoCobrador}}</td>
                    <td>{{ $registros-> Cobrado}}</td>
                    <td>{{ $registros-> Comision}}</td>
                     <td>{{ $registros-> fideicomiso}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@section('js')

<script src="js/Finanzas/validacionFecha.js"></script>
<script src="js/notificacion.js"></script>
<script type="text/javascript" src="js/alertify.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
<script>
      $(document).ready(function() {
        $('#Ingresos').DataTable({
            language: {"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"},
            responsive: true,
            order: [[1, "desc" ]]
        });
        new $.fn.dataTable.FixedHeader( '#Ingresos' );
    });
</script>
@endsection
@endsection