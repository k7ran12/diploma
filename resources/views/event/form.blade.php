<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
        <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('nombre_evento') }}
                    {{ Form::text('nombre_evento', $event->nombre_evento, ['class' => 'form-control' .
                    ($errors->has('nombre_evento') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Diplomas', 'id'=>'nombre_evento']) }}
                    {!! $errors->first('nombre_evento', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label('cantidad_diplomas') }}
                    {{ Form::text('cantidad_diplomas', $event->cantidad_diplomas, ['class' => 'form-control' .
                    ($errors->has('cantidad_diplomas') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Diplomas', 'id'=>'cantidad_diplomas']) }}
                    {!! $errors->first('cantidad_diplomas', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label('max_diploma') }}
                    {{ Form::text('top_maximo_diploma', $event->top_maximo_diploma, ['class' => 'form-control' .
                    ($errors->has('top_maximo_diploma') ? ' is-invalid' : ''), 'placeholder' => 'Top Maximo Diploma', 'id'=>'top_maximo_diploma'])
                    }}
                    {!! $errors->first('top_maximo_diploma', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="fotos_diplomas" class="form-label">Cargar Diplomas</label>
                    <input disabled class="form-control" type="file" id="fotos_diplomas" name="fotos_diplomas[]" multiple>
                </div>
            </div>
            <div class="d-flex p-2" id="contenedor_imagenes">

            </div>
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('descripcion') }}
                    {{ Form::text('descripcion', $event->descripcion, ['class' => 'form-control' .
                    ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                    {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="fotos_descripcion" class="form-label">Fotos Descripcion</label>
                    <input class="form-control" type="file" id="fotos_descripcion" name="fotos_descripcion[]" multiple>
                </div>
            </div>
            <div class="d-flex flex-nowrap" id="contenedor_descripcion">

            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <center><button type="submit" class="btn btn-primary">Submit</button></center>
    </div>
</div>
