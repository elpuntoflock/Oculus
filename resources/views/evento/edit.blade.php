@extends('layouts.master')
@push('headerSection')

@endpush

@auth
@section('content')
    @section('title', 'Editar Evento')

        <form id="formEdit" name="formEdit" method="POST" autocomplete="off" action="{{ route('evento.update', $evento->id) }}">
            @csrf
            @method('PUT')
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <h4 class="modal-title" id="ModalLabel">Evento</h4>
                        <input id="id" name= "id" type="hidden" class="form-control" value= "{{ $evento->id }}">
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
                        <input id="backgroundColor"  name= "backgroundColor" type="hidden" class="form-control" value= '{{ $evento->backgroundColor }}' >
                        <input id="borderColor"      name= "borderColor"     type="hidden" class="form-control" value= '{{ $evento->borderColor }}' >
                        <input id="textColor"        name= "textColor"       type="hidden" class="form-control" value= '{{ $evento->textColor }}'>

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
                                <td><select name="tipoNoti[]" onchange="cambioData({{$notif->id}})" class="form-control form-control-sm">
                                        <option value="1" @if ($notif->tipoNotificacion == "1")  selected @endif >Notificación</option>
                                        <option value="2" @if ($notif->tipoNotificacion == "2")  selected @endif >correo electrónico</option>
                                    </select>
                                </td>
                                <td><input name="cantidad[]" onchange="cambioData({{$notif->id}})" type="text" min="5" max="366" value='{{ $notif->cantidad }}' placeholder= "99" class="form-control"></td>
                                <td><select name="duracion[]" onchange="cambioData({{$notif->id}})" class="form-control form-control-sm" >
                                        <option value="mi" @if ($notif->duracion == "mi")  selected @endif >Minutos</option>
                                        <option value="hh" @if ($notif->duracion == "hh")  selected @endif>Horas</option>
                                        <option value="dd" @if ($notif->duracion == "dd")  selected @endif>Días</option> </select>
                                </td>
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
                        <div class="pull-left">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eventModalDel">
                                Eliminar Evento
                            </button>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-danger" href="{{ url('evento') }}">Cerrar</a>
                            <button id="btn-ingresar" class="btn btn-success">Grabar evento</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div id="eventModalDel" name="eventModalDel" class="modal fade" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <form id="formModalDel" name="formModalDel" method="POST"  action="{{ route('evento.destroy', $evento->id) }}">
              @csrf
              @method('DELETE')
                <div class="modal-dialog ">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="ModalLabel">¿Desea eliminar el Evento?</h4>
                        <input id="id" name= "id" type="hidden" class="form-control" value= "{{ $evento->id }}" disabled>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group form-group-default focusedInput">
                            <label for="title" class="col-form-label">Título del evento</label>
                            <input id="title"  type="text" class="form-control"  value= "{{ $evento->title }}" autofocus disabled required >
                        </div>
                        <div class="form-group form-group-default">
                            <label for="descripcion" class="col-form-label">Descripción</label>
                            <input id="description"  type="text" class="form-control" value = "{{ $evento->description }} " disabled>
                        </div>
                        <div class="form-group form-group-default">
                            <div class="input-group mb-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="startLbl">Inicio</span>
                                </div>
                                <input id="start"  type="datetime-local" class="form-control" value = "{{ $evento->start }}"   aria-label="Inicio" aria-describedby="startLbl" disabled>

                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="endLbl">Fin</span>
                                </div>
                                <input id="end"  type="datetime-local" class="form-control" value= "{{ $evento->end }}"  aria-label="Fin" aria-describedby="endLbl" disabled>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal"  >Cerrar</button>
                        <button class="btn btn-success">Eliminar evento</button>
                    </div>
                    </div>
                </div>
            </form>
          </div>


    @endsection
    @endauth

    @push('scriptsSection')

        @include('evento.part.notif')
        @include('evento.part.colorevento')

    @endpush

