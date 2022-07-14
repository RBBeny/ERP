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
        <div class="col-12"><!-- Button trigger modal -->
        <button type="button" class="btn btn-primary f-right  m-10" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Agregar Usuario</button> <br>
        </div>
    </div>
        <!-- Button trigger modal -->
  <!-- Modal ag_regar usuario -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Agregar usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/registrarUsuarios" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label">Nombre</label>
              <input type="text" name="nombreUsuario" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Apellido Paterno</label>
              <input type="text" name="apellidoPaternoUsuario" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Apellido Materno</label>
              <input type="text" name="apellidoMaternoUsuario" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Nickname</label>
              <input type="text" name="nomUsuario" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Rol</label>
              <select name="cveTipoUsuario" class="form-select" aria-label=" select example" required>
                <option selected value="">Selecciona opcion</option>
                                <option value=3>Administrador</option>
                                <option value=6>Gerente de ventas</option>
                                <option value=7>Gerente de cobranza</option>
                                <option value=4>Ventas</option>
                                <option value=5>Cobranza</option>
                                <option value=8>RH</option>
                                <option value=9>Finanzas</option>
                    </select>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
              <input type="number" name="cveEstatus" value="3" class="form-control" hidden>
            </div>
            <button id="btn" type="submit" class="btn btn-primary btn-block">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- Modal Editar usuario -->
<div class="modal fade" id="EditarUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Editar usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form>
        <div class="mb-3">
          <label  class="form-label" >Nombre</label>
          <input  type="text" value="Adrian Eduardo" class="form-control" >
        </div>
        <div class="mb-3">
          <label  class="form-label">Apellido Paterno</label>
          <input  type="text" value="Villanueva" class="form-control">
        </div>
        <div class="mb-3">
          <label  class="form-label">Apellido Materno</label>
          <input  type="text" value="Hernandez" class="form-control">
        </div>
        <div class="mb-3">
          <label  class="form-label"  >Nickname</label>
          <input  placeholder="Kevyn69" value="adrian.villanueva" type="text" class="form-control">
        </div>
        <div class="mb-3">
          <label  class="form-label">Rol</label>
                <select class="form-select" aria-label=" select example">
                      <option selected value="Administrador"></option>
                                <option value="1">Administrador</option>
                                <option value="2">Gerente de ventas</option>
                                <option value="3">Gerente de cobranza</option>
                                <option value="4">Ventas</option>
                                <option value="5">Cobranza</option>
                                <option value="6">RH</option>
                                <option value="7">Finanzas</option>
                    </select>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!---->
  <div class="tablausuarios">
        <table id="clienteVentas" class="table display table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Nickname</th>
                    <th scope="col">Estatus</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
           @foreach($usuario as $usuario)
                <tr>
                    <td>{{ $usuario-> nombreUsuario}}</td>
                    <td>{{ $usuario-> nomUsuario}}</td>
                    <td>{{ $usuario-> nomTipoUsuario}}</td>
                    <td>{{ $usuario-> nomEstatus}}</td>
                    <td><a data-bs-toggle="modal" data-bs-target="#EditarUsuario"> <i class="fas fa-edit fa-lg"></i></a></td>
                    <td><a data-bs-toggle="modal" data-bs-target="#myModal"> <i class="fas fa-trash fa-lg"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
   </div>
</div>
<!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Eliminar Usuario</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         ¿Está seguro que desea eliminar este usuario?
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
<!---->
@section('js')

<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('#clienteVentas').DataTable();
    });
</script>
<script src="{{ asset('js/Administrador/AgregarUsuarios.js') }}" type="text/javascript"></script>
@endsection
@endsection