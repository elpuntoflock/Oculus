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
                        <label>Birth Date</label>
                        <input type="text" class="form-control" id="fecha_nac" name="fecha_nac" value=" {{ $contacto->fecha_nac ?? '' }} " placeholder="Fecha Nacimiento">
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
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="form-group form-group-default">
                        <label>Dirección</label>
                        <input type="text" class="form-control"  value="{{ $contacto->observaciones ?? ''  }}" placeholder="direccion">
                    </div>
                </div>
            </div>
            <div class="row mt-3 mb-1">
                <div class="col-md-12">
                    <div class="form-group form-group-default">
                        <label for="observaciones" >Observaciones</label>
                        <textarea class="form-control" id='observaciones'  name= "observaciones" value="{{ $contacto->observaciones ?? ''  }}" placeholder="Observaciones" rows="3">A man who hates loneliness</textarea>
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