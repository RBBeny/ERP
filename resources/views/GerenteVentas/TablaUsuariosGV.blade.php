@extends('layouts.plantilla')

@section('titulo','Usuarios Ventas')
@section('css')
{{-- <script src="{{ asset('js/Ventas/clientesVentas.js') }}" type="text/javascript" ></script> --}}
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" type="text/css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" type="text/css" rel="stylesheet">

<link href="{{ asset('css/Ventas/clientesVentas.css') }}" rel="stylesheet">
<link href="{{ asset('css/Ventas/agregarClientes.css') }}" rel="stylesheet">
@endsection


@section('content')

@include('includes.navbarGVentas')

<div class="contenedor">
  <nav aria-label="breadcrumb" style="padding: 10px;">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/homeCobranza">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Ver Usuarios</li>
    </ol>
  </nav>
  <!-- Button trigger modal -->
  <div style="padding-right: 40px;">
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
          <form action="/registrarUsuarios" method="POST" class="formulario" id="formulario">
            @csrf

            <!-- Grupo: Nombre -->
            <div class="mb-3">
              <div class="formulario__grupo" id="grupo__nombreUsuario">
                <label for="nombreUsuario" class="form-label formulario__label">Nombre</label>
                <div class="formulario__grupo-input">
                  <input type="text" class="formulario__input form-control" name="nombreUsuario" id="nombreUsuario">
                  <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El usuario tiene que ser de 4 a 30 dígitos y solo puede contener letras.</p>
              </div>
            </div>

            <!-- Grupo: apellidoPaternoUsuario -->
            <div class="mb-3">
              <div class="formulario__grupo" id="grupo__apellidoPaternoUsuario">
                <label for="apellidoPaternoUsuario" class="form-label formulario__label">Apellido Paterno</label>
                <div class="formulario__grupo-input">
                  <input type="text" class="formulario__input form-control" name="apellidoPaternoUsuario" id="apellidoPaternoUsuario">
                  <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El apellido tiene que ser de 4 a 30 dígitos y solo puede contener letras.</p>
              </div>
            </div>

            <!-- Grupo: apellidoMaternoUsuario -->
            <div class="mb-3">
              <div class="formulario__grupo" id="grupo__apellidoMaternoUsuario">
                <label for="apellidoMaternoUsuario" class="form-label formulario__label">Apellido Materno</label>
                <div class="formulario__grupo-input">
                  <input type="text" class="formulario__input form-control" name="apellidoMaternoUsuario" id="apellidoMaternoUsuario">
                  <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El apellido tiene que ser de 4 a 30 dígitos y solo puede contener letras.</p>
              </div>
            </div>

            <!-- Grupo: nomUsuario -->
            <div class="mb-3">
              <div class="formulario__grupo" id="grupo__nomUsuario">
                <label for="nomUsuario" class="form-label formulario__label">Nickname</label>
                <div class="formulario__grupo-input">
                  <input type="text" class="formulario__input form-control" name="nomUsuario" id="nomUsuario">
                  <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
              </div>
            </div>

            <!-- Grupo: cveTipoUsuario -->
            <div class="mb-3">
              <div class="formulario__grupo" id="grupo__cveTipoUsuario">
                <label for="cveTipoUsuario" class="form-label formulario__label">Rol</label>
                <div class="formulario__grupo-input">
                  <select name="cveTipoUsuario" id="cveTipoUsuario" class="form-select formulario__input" aria-label=" select example">
                    <option value="">Selecciona opcion</option>
                    <<option selected value=4>Ventas</option>

                  </select>
                </div>
                <p class="formulario__input-error">El rol solo puede ser Ventas</p>
              </div>
            </div>


            <!-- Grupo: password -->
            <div class="mb-3">
              <div class="formulario__grupo" id="grupo__password">
                <label for="password" class="form-label formulario__label">Contraseña</label>
                <div class="formulario__grupo-input">
                  <input type="password" class="formulario__input form-control" name="password" id="password">
                  <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">La contraseña tiene que ser minimo de 4 caracteres y maximo de 16</p>
              </div>
            </div>


            <div class="mb-3">
              <input type="number" name="cveEstatus" id="cveEstatus" value="3" class="form-control" hidden>
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
                    <th scope="col">Nickname</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Opciones</th>    
                </tr>
            </thead>
            <tbody>
            @foreach($usuario as $usuario)
                <tr>
                    <td>{{ $usuario-> nombreUsuario}} {{ $usuario-> apellidoPaternoUsuario}} {{ $usuario-> apellidoMaternoUsuario}}</td>
                    <td>{{ $usuario-> nomUsuario}}</td>
                    <td>{{ $usuario-> nomTipoUsuario}}</td>
                    <td>{{ $usuario-> nomEstatus}}</td>
                    <td><a data-bs-toggle="modal" onclick="eliminar()"><i style="font-size:25px; color:red;" class="bi bi-trash"></i></a>
                    <a data-bs-toggle="modal" data-bs-target="#EditarUsuario"><i style="font-size:25px; color:blue;" class="bi bi-pencil-square"></i></a></td>
        </tr>
        @endforeach
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
        <label  class="form-label"  >Rol</label>
        <select id="ag_5" class="form-select" aria-label=" select example" disabled>
                      <option selected value="">Cobrador</option>
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
<script src="{{ asset('js/Registro/registroValidaciones.js') }}" type="text/javascript"></script>

@endsection
@endsection