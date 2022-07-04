@extends('layouts.plantilla')

@section('titulo','Clientes Ventas')
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
  <!-- Button trigger modal -->
  <div align="right" style="padding-right: 40px;">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      agregar usuario
    </button>
  </div>
  <!-- Modal ag_regar usuario -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">agregar usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/register" method="POST">
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
              <label class="form-label">Nombre de Usuario</label>
              <input type="text" name="nomUsuario" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Rol</label>
              <select name="cveTipoUsuario" class="form-select" aria-label=" select example" required>
                <option selected value="">Selecciona opcion</option>
                <option value=5>Cobranza</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
              <input type="number" name="cveEstatus" value="1" class="form-control" hidden>
            </div>
            <button id="btn" type="submit" class="btn btn-primary btn-block">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="tablaclientes">

    <table id="clienteVentas" class="table display table-striped table-bordered nowrap" style="width:100%">
      <thead>
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Rol</th>
          <th scope="col">Nickname</th>
          <th scope="col">Opciones</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Adrian Eduardo Villanueva</td>
          <td>Administrador</td>
          <td>adrian.villanueva</td>
          <td><a data-bs-toggle="modal" onclick="eliminar()"><i style="font-size:25px; color:red;" class="bi bi-trash"></i></a>
            <a data-bs-toggle="modal" data-bs-target="#EditarUsuario"><i style="font-size:25px; color:blue;" class="bi bi-pencil-square"></i></a>
          </td>


        </tr>
      </tbody>
    </table>

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
            <label class="form-label">Nombre</label>
            <input type="text" value="Adrian Eduardo" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Apellido Paterno</label>
            <input type="text" value="Villanueva" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Apellido Materno</label>
            <input type="text" value="Hernandez" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Nickname</label>
            <input placeholder="Kevyn69" value="adrian.villanueva" type="text" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Rol</label>
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
          <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
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