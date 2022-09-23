@extends('layouts.app')
@section('template_title')
Create Event
@endsection
@section('content')
<section>
    <div class="d-flex justify-content-center">

        @includeif('partials.errors')

        <div class="card w-50">
            <div class="card-header">
                <span class="card-title">Crear Evento</span>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('event.store') }}" role="form" enctype="multipart/form-data">
                    @csrf

                    @include('event.form')

                </form>
            </div>
        </div>
    </div>
</section>
<script>
    let cantidad_diplomas = document.querySelector('#cantidad_diplomas');
    let top_maximo_diploma = document.querySelector('#top_maximo_diploma');
    let fotos_diplomas = document.querySelector('#fotos_diplomas');
    let fotos_descripcion = document.querySelector('#fotos_descripcion');
    let contenedor_imagenes = document.querySelector('#contenedor_imagenes');
    let contenedor_descripcion = document.querySelector('#contenedor_descripcion');

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
    var numberMask1 = IMask(top_maximo_diploma, {
        mask: Number,
        scale: 2,
        signed: false,
        thousandsSeparator: '',
        padFractionalZeros: false,
        normalizeZeros: true,
        min: 1,
        max: 100000
    });


    cantidad_diplomas.addEventListener("keyup", function () {
        console.log(cantidad_diplomas.value)
        if (cantidad_diplomas.value != '') {
            fotos_diplomas.removeAttribute('disabled');
        }
    });

    fotos_diplomas.addEventListener("change", () => {
        const archivos = fotos_diplomas.files;
        /*if (!archivos || !archivos.length) {
            $imagenPrevisualizacion.src = "";
            return;
        }*/
        if ((archivos.length) == cantidad_diplomas.value) {
            for (let index = 0; index < archivos.length; index++) {
                const objectURL = URL.createObjectURL(archivos[index]);
                let img = document.createElement("img");
                img.src = objectURL;
                img.classList.add('rounded')
                img.classList.add('mx-auto')
                img.classList.add('w-50')
                img.classList.add('h-50')
                contenedor_imagenes.appendChild(img);
            }
        }
        else {
            console.log('ingrese solo la cantidad indicada')
        }

    });

    fotos_descripcion.addEventListener("change", () => {
        const archivos = fotos_descripcion.files;
        /*if (!archivos || !archivos.length) {
            $imagenPrevisualizacion.src = "";
            return;
        }*/
        for (let index = 0; index < archivos.length; index++) {
            const objectURL = URL.createObjectURL(archivos[index]);
            let img = document.createElement("img");
            img.src = objectURL;
            img.classList.add('rounded')
            img.classList.add('mx-auto')
            img.classList.add('w-50')
            img.classList.add('h-50')
            contenedor_descripcion.appendChild(img);
        }
    });
</script>
@endsection
