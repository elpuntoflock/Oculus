@extends('layouts.master')

@section('content')
    @section('title', 'Datos Factura')
    @csrf
    <div class="card-body">
    <form method="POST" action="" id="factura">
            <fieldset class="border p-2">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col form-group">
                                <label for="serie">Serie</label>
                                <input type="text" class="form-control" name="serie" placeholder="F001">
                            </div>
                            <div class="col form-group">
                            <label for="correlativo">Correlativo</label>
                                <input type="number" class="form-control" name="correlative" placeholder="001">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col form-group">
                                <label for="creation_date">Fecha de emisión</label>
                                <input type="date" class="form-control" name="creation_date" id="creation_date" value= '<?php echo date('Y-m-d');?>'>
                            </div>
                        </div>
                    </div><!--/.col-lg-6-->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="customer_id-selectized">Búsqueda por RUC o Razón Social</label>
                            <select name="customer_id" id="customer_id" style="display:none;" data-url="http://dimacros-sistema-facturacion.herokuapp.com/admin/clientes/data" tabindex="-1" class="selectized"><option value="" selected="selected"></option></select><div class="selectize-control single"><div class="selectize-input items not-full"><input type="select-one" autocomplete="off" tabindex="" id="customer_id-selectized" placeholder="Seleccione una opción" style="width: 134.672px;"></div><div class="selectize-dropdown single" style="display: none; width: 602.5px; top: 36px; left: 0px;"><div class="selectize-dropdown-content"></div></div></div>
                        </div>
                        <fieldset class="border p-2">
                            <legend class="w-auto">Estado de Factura</legend>
                            <div class="form-group">
                                <div class="animated-radio-button">
                                    <label class="custom-control-inline">
                                      <input type="radio" name="status" value="PENDIENTE">
                                      <span class="label-text">PENDIENTE</span>
                                    </label>
                                    <label class="custom-control-inline">
                                        <input type="radio" name="status" value="PAGADO">
                                        <span class="label-text">PAGADO</span>
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                    </div><!--/.col-lg-6-->
                </div><!--/.row-->
            </fieldset>
        </form>

    </div>

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
                   
                    <tr>
                       <td> </td>
                       <td> </td>
                       <td> </td>
                       <td> </td>
                       <td> </td>
                       <td> </td>

                        <td>
                            <form action="" method="POST">
                            @csrf
                                <div class="form-button-action">
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" 
                                    data-original-title="Editar Registro" >
                                        <a href=""> 
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </button>
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger btn-lg" 
                                    data-original-title="Eliminar Registro">
                                        <a href=""> 
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </button>
                                </div> 
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


@push('scriptsSection')
    @include('layouts.part.datatable')
@endpush
@endsection