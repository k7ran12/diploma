<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('lugar_contacto') }}
                    {{ Form::text('lugar_contacto', $punto->lugar_contacto, ['class' => 'form-control' .
                    ($errors->has('lugar_contacto') ? ' is-invalid' : ''), 'placeholder' => 'Lugar Contacto']) }}
                    {!! $errors->first('lugar_contacto', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('puntos') }}
                    {{ Form::text('puntos', $punto->puntos, ['class' => 'form-control' . ($errors->has('puntos') ? '
                    is-invalid' : ''), 'placeholder' => 'Puntos']) }}
                    {!! $errors->first('puntos', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-12">
                <label>Banda</label>
                    <select name="banda_id" class="form-select" aria-label="Default select example">
                        <option>Elija un banda</option>
                        @foreach ($bandas as $banda)
                            <option value="{{$banda->id}}" @if($banda->id == old('banda_id')) selected @endif>{{ $banda->nombre_banda }}</option>
                        @endforeach
                    </select>
            </div>
        </div>
    </div>
    <div class="box-footer mt-3">
        <center><button type="submit" class="btn btn-primary">Submit</button></center>
    </div>
</div>
