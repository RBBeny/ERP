@extends('layouts.plantilla')

@section('titulo','Usuarios Ventas')
@section('css')
{{-- <script src="{{ asset('js/Ventas/clientesVentas.js') }}" type="text/javascript" ></script> --}}
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" type="text/css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{ asset('css/VentasGerente/ventas.css') }}" rel="stylesheet">
@endsection


@section('content')

@include('includes.navbarGVentas')

<div class="contenedor">
    <nav aria-label="breadcrumb" style="padding: 10px;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/homeGVentas">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ventas</li>
        </ol>
    </nav>
    <div class="cards">
    <div class="card">
        <div class="left-column background1-left-column">
        <i class="fa-solid fa-user-tie fa-5x"></i>
        </div>

        <div class="right-column">
            
            <button class="button background1-left-column">Empezar</button>
        </div>

    </div>

    <div class="card">
        <div class="left-column background2-left-column">
        <i class="fa-solid fa-user-tie fa-5x"></i>
        </div>

        <div class="right-column">
            
            <button class="button background2-left-column">Empezar</button>
        </div>

    </div>
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