<div class="col-md-8">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Datos Contacto   {{ $contacto->id ?? '' }} </div> 
        </div>
        <div class="card-body">
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="form-group form-group-default">
                        <label>Nombres</label>
                        <input type="text" class="form-control" name="nombres" placeholder="Nombres" value= " {{ $contacto->nombres ?? '' }} " >
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
                        <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" value=" {{ $contacto->apellidos ?? '' }} ">
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
                        <label>Fecha Nacimiento</label>
                        <div class= "input-group-append date">
                            
                            <input type="text" class="form-control datetimepicker" id="datepicker" name="fecha_nac" 
                            value=  @isset ($contacto->fecha_nac)
                                                {{ \Carbon\Carbon::parse($contacto->fecha_nac ?? null)->format('d/m/Y') }}
                                    @endisset 
                            placeholder="Fecha Nacimiento">
                            <span class="input-group-text"><i class="fa fa-calendar-check"></i></span>
                        </div>
                    </div>
                </div>
                <div class="form-check">
                    <label>Sexo</label><br/>
                    <label class="form-radio-label">
                        <input class="form-radio-input" type="radio" name="sexo" value="M"  <?php echo (  ($contacto->sexo ?? 'A')  == 'M') ? 'checked' : '' ?> >
                        <span class="form-radio-sign">Masculino</span>
                    </label>
                    <label class="form-radio-label ml-3">
                        <input class="form-radio-input" type="radio" name="sexo" value="F" <?php echo (  ($contacto->sexo ?? 'A')  == 'F') ? 'checked' : '' ?>>
                        <span class="form-radio-sign">Femenino</span>
                    </label>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-group-default">
                        <label>Celular</label>
                        <input type="text" class="form-control" name="tel_celular" value="{{ $contacto->tel_celular ?? '' }}" placeholder="Celular">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-group-default">
                        <label>Teléfono</label>
                        <input type="text" class="form-control" name="tel_trabajo" value="{{ $contacto->tel_trabajo ?? '' }}" placeholder="Teléfono">
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="form-group form-group-default">
                        <label>Dirección</label>
                        <input type="text" class="form-control" name="direccion" value="{{ $contacto->direccion ?? ''  }}" placeholder="direccion">
                    </div>
                </div>
            </div>
            <div class="row mt-3 mb-1">
                <div class="col-md-12">
                    <div class="form-group form-group-default">
                        <label for="observaciones" >Observaciones</label>
                        <textarea class="form-control" id='observaciones'  name= "observaciones"  rows="3">{{ $contacto->observaciones ?? ''  }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
                <div class="text-right mt-3 mb-3">
                    <button class="btn btn-success">Aceptar</button>
                    <button class="btn btn-danger">Cancelar</button>
                </div>
        </div>
    </div>
</div> 