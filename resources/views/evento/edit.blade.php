@extends('layouts.master')
@push('headerSection')

@endpush

@section('content')
    @section('title', 'Editar Evento')

        <form id="formModalInsert" name="formModalInsert" method="POST" autocomplete="off" action="{{ route('evento.update', $evento->id) }}">
            @csrf
            @method('PUT')
            <div class="col-md-8">
                <div class="card">
                <div class="card-header">
                    <h4 class="modal-title" id="ModalLabel">Evento</h4>
                    <input id="id" name= "id" type="text" class="form-control" value= "{{ $evento->id }}">
                </div>
                <div class="card-body">
                    <input id="_method" name= "_method" type="hidden" class="form-control" value='PUT'>
                    <div class="form-group form-group-default focusedInput">
                    <label for="title" class="col-form-label">Título del evento</label>
                    <input id="title" name= "title" type="text" class="form-control"  value= "{{ $evento->title }}" autofocus required >
                    </div>
                    <div class="form-group form-group-default">
                    <label for="descripcion" class="col-form-label">Descripción</label>
                    <input id="description" name= "description" type="text" class="form-control" value = "{{ $evento->description }} " >
                    </div>
                    <div class="form-group form-group-default">
                    <div class="input-group mb-0">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="startLbl">Inicio</span>
                        </div>
                        <input id="start" name="start" type="datetime-local" class="form-control" value = "{{ $evento->start }}"   aria-label="Inicio" aria-describedby="startLbl">

                        <div class="input-group-prepend">
                        <span class="input-group-text" id="endLbl">Fin</span>
                        </div>
                        <input id="end" name= "end" type="datetime-local" class="form-control" value= "{{ $evento->end }}"  aria-label="Fin" aria-describedby="endLbl">
                    </div>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input id="allDay" name= "allDay" onclick='colorEvento();' class="form-check-input" type="checkbox" value= "1"  @if ($evento->allDay == '1')  checked @endif >
                            <span class="form-check-sign">Todo el día</span>
                        </label>

                        <label class="form-check-label">
                            <input id="startEditable"  name= "startEditable" class="form-check-input" type="checkbox" value='1' @if ($evento->startEditable == '1')  checked @endif>
                            <span  class="form-check-sign">Editar Inicio</span>
                        </label>

                        <label class="form-check-label">
                            <input id="durationEditable" name= "durationEditable" class="form-check-input" type="checkbox" value='1' @if ($evento->durationEditable == '1')  checked @endif >
                            <span  class="form-check-sign">Editar Duración</span>
                        </label>

                        <label class="form-check-label">
                            <input id="overlap" name= "overlap" class="form-check-input" type="checkbox" value='1' @if ($evento->overlap == '1')  checked @endif >
                            <span  class="form-check-sign">Movible</span>
                        </label>
                    </div>

                    <div class="form-group form-group-default">
                    <input hidden id="backgroundColor"  name= "backgroundColor" type="text" class="form-control" val= '{{ $evento->backgroundColor }}' >
                    <input hidden id="borderColor"      name= "borderColor"     type="text" class="form-control" val= '{{ $evento->borderColor }}' >
                    <input hidden id="textColor"        name= "textColor"       type="text" class="form-control" val= '{{ $evento->textColor }}'>

                    <button id="evento-ejemplo" name="evento-ejemplo" style="border-color: {{ $evento->borderColor }}; color: {{ $evento->textColor }}; background-color: {{ $evento->backgroundColor }};" class="btn-round" disabled btn-xs>Ejemplo de evento</button>

                    <button type="button" onclick='colorEvento("black");'           class="btn btn-icon btn-round btn-default btn-xs">    </button>
                    <button type="button" onclick='colorEvento("royalblue");'       class="btn btn-icon btn-round btn-primary btn-xs">    </button>
                    <button type="button" onclick='colorEvento("Mediumslateblue");' class="btn btn-icon btn-round btn-secondary btn-xs">  </button>
                    <button type="button" onclick='colorEvento("Deepskyblue");'     class="btn btn-icon btn-round btn-info btn-xs">       </button>
                    <button type="button" onclick='colorEvento("orange");'          class="btn btn-icon btn-round btn-warning btn-xs">    </button>
                    <button type="button" onclick='colorEvento("Tomato");'          class="btn btn-icon btn-round btn-danger btn-xs">     </button>
                    </div>
                </div>
                <div class="card-footer">

                <table id="tablaNoti" name="tablaNoti" class="table table-sm table-hover">
                    <thead>
                    <tr>
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
                    @foreach($noti as $notif)
                    <tr value='{{$notif->id}}'>
                        <td><select name="tipoNoti[]" class="form-control form-control-sm">
                                <option value="1" @if ($notif->tipoNotificacion == "1")  selected @endif >Notificación</option>
                                <option value="2" @if ($notif->tipoNotificacion == "2")  selected @endif >correo electrónico</option>
                            </select>
                        </td>
                        <td><input name="cantidad[]" type="text" min="5" max="366" value='{{ $notif->cantidad }}' placeholder= "99" class="form-control"></td>
                        <td><select name="duracion[]" class="form-control form-control-sm" >
                                <option value="mi" @if ($notif->duracion == "mi")  selected @endif >Minutos</option>
                                <option value="hh" @if ($notif->duracion == "hh")  selected @endif>Horas</option>
                                <option value="dd" @if ($notif->duracion == "dd")  selected @endif>Días</option> </select></td>
                        <td>
                            <input type="hidden" id="accion[{{$notif->id}}]" name="accion[]" value=''>
                            <button type="button" name="borrar[]" value='{{$notif->id}}' data-toggle="tooltip" title="" class="btn btn-link btn-danger btn-sm" data-original-title="Eliminar Registro">
                                <a> <i class="fa fa-trash"></i> </a>
                            </button>
                            <input type="hidden" name="id[]" value='{{$notif->id}}'>
                        </td>
                    </tr>
                    @endforeach
                    <!-- Aquí se agregan las notificaciones con el script agregarFila -->
                    </tbody>
                </table>
                    <button class="btn btn-danger" data-dismiss="modal"  >Close</button>
                    <button id="btn-ingresar" class="btn btn-success">Grabar evento</button>
                </div>
                </div>
            </div>
        </form>


    @endsection

    @push('scriptsSection')
    <script>
    //Elimina las filas de la tabla
        $(function () {
            $(document).on('click', 'button.btn-danger', function ()
            {
                if ($(this).val()) {
                    document.getElementById("accion[" + $(this).val() + "]").value= 'borrar';
                    $(this).closest('tr').attr('hidden',true);
                }
                else {
                    $(this).closest('tr').remove();
                };

            });
        });
    </script>

    <script>
        function agregarFila(){
            var table = document.getElementById("tablaNoti");
            var row = table.insertRow(-1);

            //var cellid = row.insertCell(0);
            var cellNoti = row.insertCell(0);
            var cellCant = row.insertCell(1);
            var cellDura = row.insertCell(2);
            var cellBorra = row.insertCell(3);
            //cellid.innerHTML = '<input name="id[]" type="hidden" value="">';
            cellNoti.innerHTML = '<select name="tipoNoti[]" class="form-control form-control-sm"> <option value="1">Notificación</option> <option value="2">correo electrónico</option> </select>';
            cellCant.innerHTML = '<input name="cantidad[]" type="text" min="5" max="366" value="5" placeholder= "99" class="form-control">';
            cellDura.innerHTML = '<select name="duracion[]" class="form-control form-control-sm"> <option value="mi">Minutos</option> <option value="hh">Horas</option> <option value="dd">Días</option> </select>';
            cellBorra.innerHTML = '<input type="hidden" name="accion[]" value=""><button type="button" name="borrar[]" data-toggle="tooltip" title="" class="btn btn-link btn-danger btn-sm" data-original-title="Eliminar Registro"> <a> <i class="fa fa-trash"></i> </a> </button> <input name="id[]" type="hidden" value="">';
        }
    </script>

    <script>
        function colorEvento(color){
            if (color) {
                if (document.getElementById("allDay").checked) {
                    document.getElementById("evento-ejemplo").style.borderColor = color;
                    document.getElementById("evento-ejemplo").style.backgroundColor = color;
                    document.getElementById("evento-ejemplo").style.color = 'white';

                    document.getElementById('borderColor').value = color;
                    document.getElementById('backgroundColor').value = color;
                    document.getElementById('textColor').value = 'white';
                }
                else {
                    document.getElementById("evento-ejemplo").style.borderColor = color;
                    document.getElementById("evento-ejemplo").style.backgroundColor = 'white';
                    document.getElementById("evento-ejemplo").style.color = color;

                    document.getElementById('borderColor').value = color;
                    document.getElementById('backgroundColor').value = 'white';
                    document.getElementById('textColor').value = color;
                }
            } else {
                color = document.getElementById("evento-ejemplo").style.borderColor;
                colorEvento(color);
            }
        }
    </script>

    @endpush

