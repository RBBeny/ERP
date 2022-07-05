@extends('layouts.plantilla')

@section('titulo','Clientes Cobranza')
@section('css')
{{-- <script src="{{ asset('js/Ventas/clientesVentas.js') }}" type="text/javascript" ></script> --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" type="text/css" rel="stylesheet">

<link href="{{ asset('css/Ventas/clientesVentas.css') }}" rel="stylesheet">
@endsection


@section('content')

@include('includes.navbarCobranza')

<div class="contenedor">
<div id="alerts">
   </div>    
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/homeCobranza">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ver Pagos                     </li>
  </ol>
</nav>
<br>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#AgregarPagos">
Agregar Pagos
</button>
<div class="modal fade" id="AgregarPagos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"  data-target=".bd-example-modal-lg" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Agregar Pagos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form>
  <div class="form-group">
    @csrf
    <label for="InputCveContrato">Clave Contrato</label>
    <input type="number" class="form-control" id="cveContrato" placeholder="Clave del Contrato" value="cveContrato" name="cveContrato" required>
  </div>
  <div class="form-group">
    <label for="InputNombre">Nombre del Cliente</label>
    <input type="text" class="form-control" id="InputNombre" placeholder="Nombre" readonly required>
  </div>
  <div class="form-group">
    <label for="InputFecha">Fecha</label>
    <input type="date" class="form-control" id="fechaPago"  value="fechaPago" name="fechaPago" required>
  </div>
  <div class="form-group">
    <label for="InputCvePago">Clave Pago</label>
    <input type="number" class="form-control" id="cvePago" placeholder="Clave de Pago"  value="cvePago" name="cvePago" required>
  </div>
  <div class="form-group">
    <label for="InputCantPago">Cantidad</label>
    <input type="number" class="form-control" id="cantidadPago" placeholder="Cantidad" value="cantidadPago" name="cantidadPago"  required>
  </div>
  <div class="form-group">
    <label for="InputCveCobrador">Clave Cobrador</label>
    <input type="number" class="form-control" id="cveCobrador" placeholder="Clave Cobrador" value="cveCobrador" name="cveCobrador" required>
  </div>
  <button type="submit" id="btnGuardarPago" class="btn btn-success">Guardar</button>

</form>
      </div>

    </div>
  </div>
</div>
<br>
<br>
<div>
                    <table id="pagos" class="display compact" style="width:100%">
                        <thead>
                            <tr>
                            <th scope="col">Numero de Pago</th>
                            <th scope="col">Numero del Contrato</th>
                            <th scope="col">Forma de pago</th>
                            <th scope="col">Pago</th>
                            <th scope="col">Restante</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Cobrador</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($pagos as $pago)
                            <tr>
                                <td>{{ $pago-> cvePago}}</td>
                                <td>{{ $pago-> cveContrato}}</td>
                                <td>{{ $pago-> nomFormaPago}}</td>
                                <td>{{ $pago-> cantidadPago}}</td>
                                <td>{{ $pago-> restantePaquete}}</td>
                                <td>{{ $pago-> fechaPago}}</td>
                                <td>{{ $pago->nombreCobrador}} {{ $pago-> apellidoPaternoCobrador}} {{ $pago-> apellidoMaternoCobrador}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
</div>
@section('js')
<script>
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})</script>

<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
<script src="{{ asset('js/components/alerts.js') }}" charset="utf8" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="{{ asset('js/Ventas/verCliente.js') }}" type="text/javascript"></script>
<script>
$(document).ready(function () {
    $('#pagos').DataTable({
    pageLength : 5,
    lengthMenu: [[5, 10, 20], [5, 10, 20]],
    language: {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
    });
});
</script>
<script>
    $(document).ready(function(){
        $('#clienteVentas').DataTable();

   $('#btnGuardarPago').click(function(){
      
   var cvePago = $('#cvePago').val();
   var fechaPago = $('#fechaPago').val();
   var cantidadPago = $('#cantidadPago').val();
   var cveContrato = $('#cveContrato').val();
   var cveCobrador = $('#cveCobrador').val();

   var _token = $("input[name=_token]").val();
 
   $.ajax({
       type:"POST",
       url:"{{ route('insertarPago.insertarPago') }}",
       data:{
           cvePago:cvePago,
           fechaPago:fechaPago,
           cantidadPago:cantidadPago,
           cveContrato:cveContrato,
           cveCobrador:cveCobrador,
           _token:_token
       },
       success:function(res){
               console.log('Se ha creado un registro correctamente');
               alertSucces("Se agrego el estado");
               document.getElementById('#nomEstado');
            },
        error:function(res){
            alertDanger("No se agrego el estatado")
            console.log("No se ha hecho el registro");
        }            
   });
   return false;
});


});
</script>

@endsection
@endsection