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

<div class="contenedor_ventas">
    <nav aria-label="breadcrumb" style="padding: 10px;">
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
            <button type="button" class="btn btn-primary" id="abrir-popupReporte">
                Consultar ventas
            </button>

        </div>
    </div>
    <div class="cards">
        <div class="cards_fila">
            <div class="card">
                <div class="left-column background1-left-column">
                    <i class="fa-solid fa-user-tie fa-5x"></i>
                </div>

                <div class="right-column">
                    <h3>Nombre del vendedor</h3>
                    <p>Cuentas vendidas</p>
                    <button class="button background1-left-column">Ver cuentas</button>
                </div>

            </div>

            <div class="card">
                <div class="left-column background2-left-column">
                    <i class="fa-solid fa-user-tie fa-5x"></i>
                </div>

                <div class="right-column">
                    <h3>Nombre del vendedor</h3>
                    <p>Cuentas vendidas</p>
                    <button class="button background2-left-column">Ver Cuentas</button>
                </div>

            </div>
            <div class="card">
                <div class="left-column background1-left-column">
                    <i class="fa-solid fa-user-tie fa-5x"></i>
                </div>

                <div class="right-column">
                    <h3>Nombre del vendedor</h3>
                    <p>Cuentas vendidas</p>
                    <button class="button background1-left-column">Ver cuentas</button>
                </div>

            </div>
        </div>
        <div class="cards_fila">
            <div class="card">
                <div class="left-column background1-left-column">
                    <i class="fa-solid fa-user-tie fa-5x"></i>
                </div>

                <div class="right-column">
                    <h3>Nombre del vendedor</h3>
                    <p>Cuentas vendidas</p>
                    <button class="button background1-left-column">Ver cuentas</button>
                </div>

            </div>

            <div class="card">
                <div class="left-column background2-left-column">
                    <i class="fa-solid fa-user-tie fa-5x"></i>
                </div>

                <div class="right-column">
                    <h3>Nombre del vendedor</h3>
                    <p>Cuentas vendidas</p>
                    <button class="button background2-left-column">Ver Cuentas</button>
                </div>

            </div>
            <div class="card">
                <div class="left-column background1-left-column">
                    <i class="fa-solid fa-user-tie fa-5x"></i>
                </div>

                <div class="right-column">
                    <h3>Nombre del vendedor</h3>
                    <p>Cuentas vendidas</p>
                    <button class="button background1-left-column">Ver cuentas</button>
                </div>

            </div>
        </div>
        <div class="cards_fila">
            <div class="card">
                <div class="left-column background1-left-column">
                    <i class="fa-solid fa-user-tie fa-5x"></i>
                </div>

                <div class="right-column">
                    <h3>Nombre del vendedor</h3>
                    <p>Cuentas vendidas</p>
                    <button class="button background1-left-column">Ver cuentas</button>
                </div>

            </div>

            <div class="card">
                <div class="left-column background2-left-column">
                    <i class="fa-solid fa-user-tie fa-5x"></i>
                </div>

                <div class="right-column">
                    <h3>Nombre del vendedor</h3>
                    <p>Cuentas vendidas</p>
                    <button class="button background2-left-column">Ver Cuentas</button>
                </div>

            </div>
            <div class="card">
                <div class="left-column background1-left-column">
                    <i class="fa-solid fa-user-tie fa-5x"></i>
                </div>

                <div class="right-column">
                    <h3>Nombre del vendedor</h3>
                    <p>Cuentas vendidas</p>
                    <button class="button background1-left-column">Ver cuentas</button>
                </div>

            </div>
        </div>
        <div class="cards_fila">
            <div class="card">
                <div class="left-column background1-left-column">
                    <i class="fa-solid fa-user-tie fa-5x"></i>
                </div>

                <div class="right-column">
                    <h3>Nombre del vendedor</h3>
                    <p>Cuentas vendidas</p>
                    <button class="button background1-left-column">Ver cuentas</button>
                </div>

            </div>

            <div class="card">
                <div class="left-column background2-left-column">
                    <i class="fa-solid fa-user-tie fa-5x"></i>
                </div>

                <div class="right-column">
                    <h3>Nombre del vendedor</h3>
                    <p>Cuentas vendidas</p>
                    <button class="button background2-left-column">Ver Cuentas</button>
                </div>

            </div>
            <div class="card">
                <div class="left-column background1-left-column">
                    <i class="fa-solid fa-user-tie fa-5x"></i>
                </div>

                <div class="right-column">
                    <h3>Nombre del vendedor</h3>
                    <p>Cuentas vendidas</p>
                    <button class="button background1-left-column">Ver cuentas</button>
                </div>

            </div>
        </div>
        <div class="cards_fila">
            <div class="card">
                <div class="left-column background1-left-column">
                    <i class="fa-solid fa-user-tie fa-5x"></i>
                </div>

                <div class="right-column">
                    <h3>Nombre del vendedor</h3>
                    <p>Cuentas vendidas</p>
                    <button class="button background1-left-column">Ver cuentas</button>
                </div>

            </div>

            <div class="card">
                <div class="left-column background2-left-column">
                    <i class="fa-solid fa-user-tie fa-5x"></i>
                </div>

                <div class="right-column">
                    <h3>Nombre del vendedor</h3>
                    <p>Cuentas vendidas</p>
                    <button class="button background2-left-column">Ver Cuentas</button>
                </div>

            </div>
            <div class="card">
                <div class="left-column background1-left-column">
                    <i class="fa-solid fa-user-tie fa-5x"></i>
                </div>

                <div class="right-column">
                    <h3>Nombre del vendedor</h3>
                    <p>Cuentas vendidas</p>
                    <button class="button background1-left-column">Ver cuentas</button>
                </div>

            </div>
        </div>

    </div>



</div>
<div class="overlay" id="overlayReporte">
    <div class="popup" id="popupReporte">
        <h2>Generar reporte</h2>
        <div class="form-group">
            <button type="button" id="btn-cerrar-popupReporte" class="btn btn-danger">Cancelar</button>
            <button type="button" id="guardarReporte" class="btn btn-success">Guardar</button>
        </div>
    </div>
</div>

</div>

@section('js')
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
<script src="js/VentasGerente/estilos.js"></script>
<script type="text/javascript">

</script>


@endsection
@endsection