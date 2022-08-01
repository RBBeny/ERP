@extends('layouts.plantilla')

@section('titulo','Ventas')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" type="text/css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="https://cdn.datatables.net/fixedheader/3.2.4/css/fixedHeader.bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css" type="text/css" rel="stylesheet">
<link href="{{ asset('css/VentasGerente/ventas.css') }}" rel="stylesheet">
@endsection


@section('content')

@include('includes.navbarGVentas')

<div class="contenedor_ventas">
    <nav aria-label="breadcrumb" style="padding: 10px; z-index:-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/homeGVentas">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ventas</li>
        </ol>
    </nav>
    <div class="cabezera_consulta">
        <div class="contIzq">

            <h1 class="Fecha">{{$Fecha}}</h1>

        </div>
        <div class="contDer">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#miModal">Consultar ventas</button>
        </div>
    </div>

    <div class="modal fade" id="miModal" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-tittle" id="modalTitle">Modal</h5>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
    <div class="tablaclientes">
        <table id="clienteVentas" class="table display table-striped table-bordered nowrap" style="width:80%">
            <thead>
                <tr>
                    <th scope="col">Vendedor</th>
                    <th scope="col">N° Cuentas</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Ventas as $ventas)
                <tr> 
                    <td>{{$ventas->nombreVendedor}} {{$ventas->apellidoPaternoVendedor}} {{$ventas->apellidoMaternoVendedor}}</td>
                    <td>{{$ventas->Ventas}}</td>
                    <td><a data-bs-toggle="modal" onclick="Mostrar('{{$ventas->cveVendedor}}');" data-bs-target="#EditarUsuario"><i class="far fa-eye fa-lg"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div class="modal fade" id="EditarUsuario"  tabindex="-1" role="dialog"  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Cuentas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <table class="table">
        <thead>
            <th scope="col">N° Cont</th>
            <th scope="col"> N° Sol</th>
            <th scope="col"> Nombre</th>
    </thead>
        <tbody>
            <tr id="cuentas_ventas">
            
            </tr>
            
        </tbody>
     </table>
      </div>
    </div>
  </div>
</div>
    <!-- Modal -->

    {{--<div class="cards">
        @foreach($Ventas as $ventas)
        <div class="cards_fila">
            <div class="card">
                <div class="left-column background1-left-column">
                    <i class="fa-solid fa-user-tie fa-5x"></i>
                </div>
                <div class="right-column">
                    <h3>{{$ventas->nombreVendedor}} {{$ventas->apellidoPaternoVendedor}}</h3>
    <p>{{$ventas->Ventas}}</p>
    <button class="button background1-left-column">Ver cuentas</button>
</div>
</div>
</div>
@endforeach
</div>
--}}


</div>


</div>

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.4/js/dataTables.fixedHeader.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap.min.js" type="text/javascript"></script>

<script src="js/VentasGerente/estilos.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#clienteVentas').DataTable({
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            responsive: true,
            order: [
                [2, "desc"]
            ]
        });
        new $.fn.dataTable.FixedHeader('#clienteVentas');
    });
</script>


@endsection
@endsection