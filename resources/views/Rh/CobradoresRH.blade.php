@extends('layouts.plantilla')

@section('titulo','Cobradores RH')
@section('css')
{{-- <script src="{{ asset('js/Ventas/clientesVentas.js') }}" type="text/javascript" ></script> --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" type="text/css" rel="stylesheet">

<link href="{{ asset('css/Ventas/clientesVentas.css') }}" rel="stylesheet">
@endsection


@section('content')

@include('includes.navbarRh')

<div class="contenedor">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/homeRh">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">CobradoresRH</li>
  </ol>
</nav>
<div class="alert alert-seccess" role="sucess"></div>

<!-- Button trigger modal -->
<div align="right" style="padding-right: 40px;">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
Agregar Cobrador</button>
</div>
<!-- Modal ag_regar usuario -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Agregar Cobrador</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <form action="/CjCobrador" method="post">
      @csrf
      <div class="form-group">
    <label for="InputnombreCobrador">Nombre</label>
    <input type="text" class="form-control" name="nombreCobrador"  placeholder="Nombre"required>
  </div>
  <div class="form-group">
    <label for="InputapellidoPaternoCobrador">Apellido Paterno</label>
    <input type="text" class="form-control" name="apellidoPaternoCobrador"   placeholder="Apellido Paterno" required >
  </div>
  <div class="form-group">
    <label for="InputapellidoMaternoCobrador">Apellido Materno</label>
    <input type="text" class="form-control" name="apellidoMaternoCobrador" placeholder="Apellido Materno"  required>
  </div>
  <div class="form-group">
    <label for="InputcomisionCobrador">Comision</label>
    <input type="text" class="form-control" name="comisionCobrador"  placeholder="Comision"  required>
  </div>
  <div class="form-group">
    <label for="InputcveEstatus">Estatus</label>
  <select class="form-select" name="cveEstatus" placeholder="Esttus"  name="cveEstatus" aria-label="Default select example">
  @foreach($estados as $estado)
  <option value="{{ $estado->cveEstatus}} ">{{$estado-> nomEstatus}}</option>
  @endforeach
</select>
</div>
  <button type="button"  data-bs-dismiss="modal" aria-label="Close" class="btn btn-danger">Cancelar</button>
  <button type="submit"  class="btn btn-success" >Guardar</button>


</form>
      
      </div>
    </div>
  </div>
</div>


<div class="tablaclientes">

        <table id="clienteVentas" class="table display table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Clave</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Comision</th>
                    <th scope="col">Estatus</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($cobradores as $cobrador)
                            <tr>
                                <td>{{ $cobrador-> cveCobrador}}</td>
                                <td>{{ $cobrador->nombreCobrador}} {{ $cobrador-> apellidoPaternoCobrador}} {{ $cobrador-> apellidoMaternoCobrador}}</td>
                                <td>{{ $cobrador-> comisionCobrador}}</td>
                                <td>{{ $cobrador-> nomEstatus}}</td>
                                <td>
                                <a href="" id="editCompany" data-toggle="modal" data-target='#practice_modal' data-id="{{ $cobrador-> cveCobrador }}">Edit</a>

                                </td>
                              </tr>
                            @endforeach
            </tbody>
        </table>
        <div class="modal fade" id="practice_modal">
                        <div class="modal-dialog">
                           <form id="companydata">
                                <div class="modal-content">
                                <input type="hidden" id="color_id" name="color_id" value="">
                                <div class="modal-body">
                                    <input type="text" name="name" id="name" value="" class="form-control">
                                </div>
                                <input type="submit" value="Submit" id="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;">
                            </div>
                           </form>
                        </div>
                    </div>
    </div>
</div>


@section('js')

<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>

$(document).ready(function () {

$.ajaxSetup({
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});

$('body').on('click', '#submit', function (event) {
    event.preventDefault()
    var id = $("#color_id").val();
    var name = $("#name").val();
   
    $.ajax({
      url: 'color/' + id,
      type: "POST",
      data: {
        id: id,
        name: name,
      },
      dataType: 'json',
      success: function (data) {
          
          $('#companydata').trigger("reset");
          $('#practice_modal').modal('hide');
          window.location.reload(true);
      }
  });
});

$('body').on('click', '#editCompany', function (event) {

    event.preventDefault();
    var id = $(this).data('id');
    console.log(id)
    $.get('color/' + id + '/edit', function (data) {
         $('#userCrudModal').html("Edit category");
         $('#submit').val("Edit category");
         $('#practice_modal').modal('show');
         $('#color_id').val(data.data.id);
         $('#name').val(data.data.name);
     })
});

}); 
</script>
<script>
    $(document).ready(function() {
        $('#clienteVentas').DataTable();
    });
</script>
<script>
  
</script>

@endsection
@endsection