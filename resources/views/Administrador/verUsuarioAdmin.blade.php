@extends('layouts.plantilla')

@section('titulo','Usuarios')
@section('css')
{{-- <script src="{{ asset('js/Ventas/clientesVentas.js') }}" type="text/javascript" ></script> --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" type="text/css" rel="stylesheet">

<link href="{{ asset('css/Administrador/usuariosAdmin.css') }}" rel="stylesheet">
@endsection


@section('content')

@include('includes.navbarAdministrador')

<div class="contenedor">
   
<h1>Usuarios</h1> 
    <div class="row">
    <div class="col-12">
        <div class="btn-group">
         <a href="#" class="btn btn-primary active" aria-current="page">Administrador</a>
         <a href="#" class="btn btn-primary">Gerente de ventas</a>
         <a href="#" class="btn btn-primary">Gerente de cobranza</a>
         <a href="#" class="btn btn-primary">Ventas</a>
         <a href="#" class="btn btn-primary">Cobranza</a>
         <a href="#" class="btn btn-primary">RH</a>
         <a href="#" class="btn btn-primary">Finanzas</a>
        </div>
    </div>
    <div class="col-12">
        <br>
    </div>
        <div class="col-12">
<div class="tablausuarios">
        <table id="clienteVentas" class="table display table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Detalle</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Dulce Silva</td>
                    <td>05/07/2022</td>
                    <td>04:04</td>
                    <td>Inicio sesión</td>
                    
                </tr>
                <tr>
                    <td>Adrian Villanueva </td>
                    <td>01/07/2022</td>
                    <td>06:04</td>
                    <td>Inicio sesión</td>
                    
                </tr>
                <tr>
                    <td>Benjamin Ramirez</td>
                    <td>07/2022</td>
                    <td>12:04</td>
                    <td>Inicio sesión</td>
                    
                </tr>
                <tr>
                    <td>KEvyn Cortez</td>
                    <td>01/07/2022</td>
                    <td>03:04</td>
                    <td>Inicio sesión</td>
                    
                </tr>
            </tbody>
        </table>
   </div>
</div>
</div>
</div>
</div>
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="{{ asset('js/Ventas/verCliente.js') }}" type="text/javascript"></script>
<script>
$(document).ready(function () {
    $('#pagos').DataTable({
    pageLength : 5,
    lengthMenu: [[5, 10, 20], [5, 10, 20]]
    });
});
</script>
@endsection
@endsection