@extends('layouts.plantilla')

@section('titulo','Clientes Ventas')
@section('css')
{{-- <script src="{{ asset('js/Ventas/clientesVentas.js') }}" type="text/javascript" ></script> --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" type="text/css" rel="stylesheet">

<link href="{{ asset('css/Ventas/clientesVentas.css') }}" rel="stylesheet">
@endsection


@section('content')

@include('includes.navbarGCobranza')

<div class="contenedor">
<nav aria-label="breadcrumb" style="padding: 10px;">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/homeCobranza">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ver Clientes</li>
  </ol>
</nav>   
<div class="tablaclientes">

        <table id="clienteVentas" class="table display table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">N°Sol</th>
                    <th scope="col">N°Cont</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Domicilio</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Estatus</th>
                    <th scope="col">Ver Cliente</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>02</td>
                    <td>90</td>
                    <td>yo</td>
                    <td>Lindavus</td>
                    <td>9898989</td>
                    <td>Activo</td>
                    <td><a data-bs-toggle="modal" data-bs-target="#VerPagos" ><i style="font-size:25px; color:blue;" class="far fa-eye fa-lg"></i></a>
                    <a data-bs-toggle="modal" data-bs-target="#Pagar"><i class="bi bi-cash-coin" style="font-size:25px; color:green;"></i></a></td>
                </tr>
            </tbody>
        </table>

    </div>
</div>
<!-- Modal ver pagos -->
<div class="modal fade" id="VerPagos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"  data-target=".bd-example-modal-lg" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Pagos del Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6>Tipo de servicion funerario:</h6>
      <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Folio</th>
                <th scope="col">Fecha de Pago <i class="bi bi-calendar-check-fill"></i></th>
                <th scope="col">Cantidad<i class="bi bi-cash"></i></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>26/04/2022</td>
                <td>$300</td>
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>06/05/2022</td>
                <td>$500</td>
                </tr>
                <tr>
                <th scope="row">3</th>
                <td>04/06/2022</td>
                <td>$600</td>
                </tr>
            </tbody>
            </table>
            <h6>Total pagado:$1,400; Restante por pagar:$17,600</h6>
      </div>
    </div>
  </div>
</div>
<!-- Modal ver pagar -->
<div class="modal fade" id="Pagar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"  data-target=".bd-example-modal-lg" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Realizar pago</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form>
  <div class="mb-3">
    <h2>Agregar Pago</h2>
    <hr>
    <div class="row">
    <div class="form-field col-lg-4 ">
                        <label for="Estatus" class="label">No. Contrato</label>
                        <input type="text" class="input-text" id="Estatus">
    </div>
                    <div class="form-field col-lg-4 ">
                        <label for="Estatus" class="label">Nombre Cliente</label>
                        <input type="text" class="input-text" id="Estatus" value="Pepe el Toro" readonly>
                    </div>
                    <div class="form-field col-lg-4 ">
                        <label for="Estatus" class="label">Monto a Abonar</label>
                        <input type="text" class="input-text" id="Estatus">
                    </div>
                </div>
                <br>
            
    <div class="row">
    <div class="form-group col-md-5">

<select id="inputState" class="form-control" id="estadoCivil" name="estadoCivil">
    <option selected>COBRADOR</option>
    <option>Cobrador 1</option>
    <option>Cobrado 2</option>

</select>
</div>
</div>
    <br>
<div class="row">
<div class="form-field col-lg-4 ">
                        <label for="Estatus" class="label">Pagado al momento</label>
                        <input type="text" class="input-text" id="Estatus" value="$10,000.00" readonly>
                    </div>
                    <div class="form-field col-lg-4 ">
                        <label for="Estatus" class="label">Saldo Restante</label>
                        <input type="text" class="input-text" id="Estatus" value="$1,956.00" readonly>
                    </div>
    </div>
    <br>
    <div class="form-group">
                            <button type="button" id="guardarRecibo" class="btn btn-primary"><i class="fa-regular fa-circle-check"></i>Guardar</button>
                        </div>
</form>
      
    </div>
  </div>
</div>

@section('js')

<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
<script>
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