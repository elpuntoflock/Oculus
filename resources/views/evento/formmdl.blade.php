<div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="ModalLabel">Evento</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <input id="id" name= "id" type="hidden" class="form-control">
          <input id="_method" name= "_method" type="hidden" class="form-control" value='PUT'>
            <div class="form-group form-group-default focusedInput">
              <label for="title" class="col-form-label">Título del evento</label>
              <input id="title" name= "title" type="text" class="form-control"  autofocus required>
            </div>
            <div class="form-group form-group-default">
              <label for="descripcion" class="col-form-label">Descripción</label>
              <input id="descripcion" name= "descripcion" type="text" class="form-control">
            </div>
            <div class="form-group form-group-default">
              <div class="input-group mb-0">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="startLbl">Inicio</span>
                </div>
                <input id="start" name="start" type="datetime-local" class="form-control"  aria-label="Inicio" aria-describedby="startLbl">

                <div class="input-group-prepend">
                  <span class="input-group-text" id="endLbl">Fin</span>
                </div>
                <input id="end" name= "end" type="datetime-local" class="form-control"  aria-label="Fin" aria-describedby="endLbl">
              </div>
            </div>
            <div class="form-check">
                  <label class="form-check-label">
                    <input id="allDay" name= "allDay" class="form-check-input" type="checkbox" value='false' >
                    <span class="form-check-sign">Todo el día</span>
                  </label>

                  <label class="form-check-label">
                    <input id="startEditable" name= "startEditable" class="form-check-input" type="checkbox" value='true' checked >
                    <span  class="form-check-sign">Editar Inicio</span>
                  </label>

                  <label class="form-check-label">
                    <input id="durationEditable" name= "durationEditable" class="form-check-input" type="checkbox" value='true' checked >
                    <span  class="form-check-sign">Editar Duración</span>
                  </label>

                  <label class="form-check-label">
                    <input id="overlap" name= "overlap" class="form-check-input" type="checkbox" value='true' checked >
                    <span  class="form-check-sign">Movible</span>
                  </label>
            </div>

            <div class="form-group form-group-default">
              <input hidden id="backgroundColor"  name= "backgroundColor" type="text" class="form-control" val="white" >
              <input hidden id="borderColor"      name= "borderColor"     type="text" class="form-control" val="Deepskyblue">
              <input hidden id="textColor"        name= "textColor"       type="text" class="form-control" val="Deepskyblue">

              <button id="evento-ejemplo" name="evento-ejemplo" style="border-color: Deepskyblue; color: white; background-color: Deepskyblue;" class="btn-round" disabled btn-xs>Ejemplo de evento</button>
              <button type="button" onclick='colorEvento("black");'           class="btn btn-icon btn-round btn-default btn-xs">    </button>
              <button type="button" onclick='colorEvento("royalblue");'       class="btn btn-icon btn-round btn-primary btn-xs">    </button>
              <button type="button" onclick='colorEvento("Mediumslateblue");' class="btn btn-icon btn-round btn-secondary btn-xs">  </button>
              <button type="button" onclick='colorEvento("Deepskyblue");'     class="btn btn-icon btn-round btn-info btn-xs">       </button>
              <button type="button" onclick='colorEvento("orange");'          class="btn btn-icon btn-round btn-warning btn-xs">    </button>
              <button type="button" onclick='colorEvento("Tomato");'          class="btn btn-icon btn-round btn-danger btn-xs">     </button>
            </div>
      </div>
      <div class="modal-footer">

      <table id="tablaNoti" class="table table-sm table-hover">
        <thead>
          <tr>
            <th scope="col" display:none></th>
            <th scope="col">Tipo</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Duración</th>
            <th scope="col">
              <button type="button" onclick="agregarFila()" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-md" data-original-title="Eliminar Registro">
                  <a> <i class="fa fa-plus"></i> </a>
              </button>
            </th>
          </tr>
        </thead>
        <tbody>
          <!-- Aquí se agregan las notificaciones con el script agregarFila -->
        </tbody>
      </table>
        <button class="btn btn-danger" data-dismiss="modal"  >Close</button>
        <button id="btn-ingresar" class="btn btn-success">Grabar evento</button>
      </div>
    </div>
</div>



@push('scriptsSection')
    @include('evento.part.notif')
@endpush
