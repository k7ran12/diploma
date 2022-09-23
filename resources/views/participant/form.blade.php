<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-4 mt-2">
                <div class="form-group">
                    {{ Form::label('nombre') }}
                    {{ Form::text('nombre', $participant->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mt-2">
                    {{ Form::label('cantidad_puntos') }}
                    {{ Form::text('cantidad_puntos', $participant->cantidad_puntos, ['class' => 'form-control' . ($errors->has('cantidad_puntos') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Puntos', 'id'=> 'cantidad_puntos']) }}
                    {!! $errors->first('cantidad_puntos', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mt-2">
                    {{ Form::label('lugar_contacto') }}
                    {{ Form::text('lugar_contacto', $participant->lugar_contacto, ['class' => 'form-control' . ($errors->has('cantidad_puntos') ? ' is-invalid' : ''), 'placeholder' => 'Lugar de contacto']) }}
                    {!! $errors->first('cantidad_puntos', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group mt-2">
                    <label>Banda</label>
                    <select name="select_banda" class="form-select" aria-label="Default select example">
                        <option selected>Elija un banda</option>
                        @foreach ($bandas as $banda)
                            <option value="{{$banda->id}}">{{ $banda->nombre_banda }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input type="hidden" name="event_id" value="{{ Request()->event }}">
        </div>
    </div>
    <div class="box-footer mt20">
        <center><button type="submit" class="btn btn-primary mt-2">Submit</button></center>
    </div>
</div>
