@extends('layouts.plantilla')

@section('titulo','Clientes Cobranza')
@section('css')
{{-- <script src="{{ asset('js/Cobranza/pagos.js') }}" type="text/javascript" ></script> --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" type="text/css" rel="stylesheet">

<link href="{{ asset('css/Cobranza/Pagos.css') }}" rel="stylesheet">
@endsection


@section('content')

@include('includes.navbarCobranza')

<div class="contenedor">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/homeCobranza">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ver Pagos                     </li>
  </ol>
</nav>
<div class="tablaclientesCobranza">
  
<button type="button" class="btn btn-primary" data-open="modal1">
    Agregar Pago
  </button>
  <div class="modal" id="modal1" data-animation="slideInOutLeft">
  <div class="modal-dialog">
    <header class="modal-header">
      <button class="close-modal" aria-label="close modal" data-close>
        ✕  
      </button>
    </header>
    <section class="modal-content">
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
    </section>

  </div>
</div>
<hr>
        <table id="clienteVentas" class="table display table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Folio</th>
                    <th scope="col">No. Contrato</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Cobrador</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>02</td>
                    <td>90</td>
                    <td>yo</td>
                    <td>Lindavus</td>
                    <td>Activo</td>
                    <td><a href="/VerRecibos"> <i class="far fa-eye fa-lg"></i></a></td>
                </tr>
            </tbody>
        </table>

    </div>
</div>
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


@section('js')
<script src="{{ asset('js/Cobranza/pagos.js') }}" type="text/javascript"></script>
@endsection
@endsection