
<!-- Modal Editar usuario -->
<div class="modal fade" id="modal-update-{{$usuario->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Editar usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="/update/{{$usuario->id}}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label  class="form-label" >Nombre</label>
          <input  type="text"  name="nombre" class="form-control" value="{{$usuario->nombreUsuario}}">
        </div>
        <div class="mb-3">
          <label  class="form-label">Apellido Paterno</label>
          <input  type="text" name="apellidoPaterno" class="form-control" value="{{$usuario->apellidoPaternoUsuario}}">
        </div>
        <div class="mb-3">
          <label  class="form-label">Apellido Materno</label>
          <input  type="text" name="apellidoMaterno" class="form-control" value="{{$usuario->apellidoMaternoUsuario}}">
        </div>
        <div class="mb-3">
          <label  class="form-label" >Nickname</label>
          <input  name="nomUsuario"  type="text" class="form-control" value="{{$usuario->nomUsuario}}">
        </div>
        <div class="mb-3">
          <label  class="form-label">Rol</label>
                <select class="form-select" aria-label=" select example" name="rol" >
                      <option selected value="{{$usuario->cveTipoUsuario}}">{{$usuario->nomTipoUsuario}}</option>
                                <option value="3">Administrador</option>
                                <option value="6">Gerente de ventas</option>
                                <option value="7">Gerente de cobranza</option>
                                <option value="4">Ventas</option>
                                <option value="5">Cobranza</option>
                                <option value="8">RH</option>
                                <option value="9">Finanzas</option>
                    </select>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!---->