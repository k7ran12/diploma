@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card mb-3">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Bienvenido al dashboard!') }}
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h4>Crear Evento</h4>
                    <form action="{{ route('home.store') }}" method="post">
                        <div class="form-group d-flex">
                            @csrf
                            <label for="">Número de diplomas</label>
                            <input name="numero_diplomas"
                                value="{{ !empty($evento->numero_diplomas) ? $evento->numero_diplomas : ''  }}"
                                id="cantidad_diplomas" type="text" class="form-control mx-3"
                                placeholder="Ingrese la cantidad de diploma">
                            <button type="submit" id="agregar_diploma" class="btn btn-primary">Agregar</button>

                        </div>
                    </form>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h4>Cargar Diploma</h4>
                    <form action="{{ route('home.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            @if(!empty($evento->numero_diplomas))
                            @for ($i = 1; $i <= $evento->numero_diplomas; $i++)
                                <div class="form-group col-md-4">
                                    <label for="">Número de diplomas {{$i}}</label>
                                    <input name="imagen_diploma_{{$i}}" type="file" class="form-control mb-2"
                                        placeholder="Ingrese la cantidad de diploma">
                                    @php
                                    $imagen_auto = "imagen_diploma_".$i;
                                    @endphp
                                    <img src="{{ $evento->$imagen_auto != '' ? $evento->$imagen_auto : 'https://d7lju56vlbdri.cloudfront.net/var/ezwebin_site/storage/images/_aliases/img_1col/noticias/solar-orbiter-toma-imagenes-del-sol-como-nunca-antes/9437612-1-esl-MX/Solar-Orbiter-toma-imagenes-del-Sol-como-nunca-antes.jpg'  }}"
                                        class="rounded mx-auto d-block w-100" alt="">
                                </div>
                                @endfor
                                @endif
                        </div>
                        <button type="submit" class="btn btn-primary d-block mx-auto mt-2">Guardar</button>
                    </form>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="mb-2">Configurar Contactos</h4>
                    <form action="{{ route('home.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="">Numero de contactos diploma 1</label>
                                <input
                                    value="{{ !empty($evento->contacto_diploma_1) ? $evento->contacto_diploma_1 : ''  }}"
                                    name="cantacto_diploma_1" type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Numero de contactos diploma 2</label>
                                <input
                                    value="{{ !empty($evento->contacto_diploma_2) ? $evento->contacto_diploma_2 : ''  }}"
                                    name="cantacto_diploma_2" type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Numero de contactos diploma 3</label>
                                <input
                                    value="{{ !empty($evento->contacto_diploma_3) ? $evento->contacto_diploma_3 : ''  }}"
                                    name="cantacto_diploma_3" type="text" class="form-control">
                            </div>
                        </div>
                        <button class="btn btn-primary d-block mx-auto mt-3">Guardar</button>
                    </form>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="mb-2">Configurar Actividad</h4>
                    <form action="{{ route('home.store') }}" method="post">
                        @csrf
                        <div class="form-floating">
                            <textarea name="descripcion_actividad" class="form-control" id="descripcion_actividad"
                                style="height: 100px">
                                {{ !empty($evento->descripcion_actividad) ? $evento->descripcion_actividad : ''  }}
                            </textarea>
                            <label for="descripcion_actividad">Descripcion de la actividad</label>
                        </div>
                        <button class="btn btn-primary d-block mx-auto mt-3">Guargar</button>
                    </form>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h4>Iniciar/Detener actividad</h4>
                    <form action="{{ route('home.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Estado</label>
                            <select name="estado" class="form-select" aria-label="Default select example">
                                <option>Seleccionar</option>
                                <option value="2" @if(!empty($evento->estado)) @if($evento->estado == 2) selected @endif @endif>Iniciado</option>
                                <option value="1" @if(!empty($evento->estado)) @if($evento->estado == 1) selected @endif @endif>Detenida</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary d-block mx-auto mt-3">Guargar</button>
                    </form>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="mb-2">Eliminar todo</h4>
                    <p>Esta opcion eliminara todos los resgistros y reiniciará los contadores a 0.</p>
                    <button class="btn btn-danger d-block mx-auto mt-3">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let cantidad_diplomas = document.getElementById('cantidad_diplomas');
    let agregar_diploma = document.getElementById('agregar_diploma');
    let div_diplomas = document.getElementById('div_diplomas');
    var numberMask = IMask(cantidad_diplomas, {
        mask: Number,
        scale: 2,
        signed: false,
        thousandsSeparator: '',
        padFractionalZeros: false,
        normalizeZeros: true,
        min: 1,
        max: 3
    });

</script>
@endsection
