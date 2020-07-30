@extends('layouts.master')

@section('content')
@section('title', 'Datos de Usuario')

    <form method="POST" action="{{ route('contacto.store') }}">
    @csrf

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Base Form Control</div>
                    </div>
                    <div class="card-body">
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Nombres</label>
                                    <input type="text" class="form-control" name="nombres" placeholder="Nombres" value="">
                                    @error('nombres')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Apellidos</label>
                                    <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" value="">
                                    @error('apellidos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label>Birth Date</label>
                                    <input type="text" class="form-control" id="fecha_nac" name="fecha_nac" value="03/21/1998" placeholder="Fecha Nacimiento">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label>Sexo</label>
                                    <select class="form-control" id="sexo" name="sexo">
                                        <option value="M">Masculino</option>
                                        <option value="F">Femenino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" value="+62008765678" name="phone" placeholder="Phone">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Address</label>
                                    <input type="text" class="form-control" value="st Merdeka Putih, Jakarta Indonesia" name="address" placeholder="Address">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 mb-1">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label for="observaciones" >Observaciones</label>
                                    <textarea class="form-control" id='observaciones' name="observaciones" placeholder="Observaciones" rows="3">A man who hates loneliness</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                            <div class="text-right mt-3 mb-3">
                                <button class="btn btn-success">Save</button>
                                <button class="btn btn-danger">Reset</button>
                            </div>
                    </div>
                </div>
            </div> 
    </form>
@endsection