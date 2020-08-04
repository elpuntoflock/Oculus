@extends('layouts.master')

@section('content')
@section('title', 'Lista de contactos')
    @csrf
    <div class="card-body">
        <div class="table-responsive">
            <table id="basic-datatables" class="display table table-striped table-hover" >
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Dirección</th>
                        <th>Celular</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contactos as $contacto)
                    <tr>
                        <td>{{$contacto->id}}</td>
                        <td>{{$contacto->nombres}}</td>
                        <td>{{$contacto->apellidos}} {{$contacto->apellido_casada}}</td>
                        <td>{{$contacto->direccion}}</td>
                        <td>{{$contacto->tel_celular}}</td>
                        <td>{{$contacto->tel_trabajo}}</td>
                        <td>
                            <form action="{{ route('contacto.destroy',$contacto->id) }}" method="POST">
                            @csrf
                                <div class="form-button-action">
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" 
                                    data-original-title="Editar Registro" >
                                        <a href="{{ route('contacto.edit',$contacto->id) }}"> 
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </button>
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger btn-lg" 
                                    data-original-title="Eliminar Registro">
                                        <a href="{{ route('contacto.show',$contacto->id) }}"> 
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </button>
                                </div> 
                </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@Section('ScriptSection')
<!-- Datatables -->
<script src="{{ asset('js/plugin/datatables/datatables.min.js') }}"></script>
	<script>
		$(document).ready(function() {
			$('#basic-datatables').DataTable(
                {
                "language": {
                    "emptyTable": "No hay información",
                    "lengthMenu": "Muestre _MENU_ registros por pagina",
                    "zeroRecords": "Sin resultados encontrados",
                    "info": "Monstrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrando _MAX_ del total de registros)",
                    "search": "Buscar ",
                    "next": "siguiente",
                    "infoPostFix": "",
                    "thousands": ",",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            }
            );
			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';
		});
	</script>
@endsection