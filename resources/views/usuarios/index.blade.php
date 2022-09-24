<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/principal.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>
    <header>
        <img class="img-fluid w-100" src="{{ Vite::asset('resources/images/logo-and-s2.jpg') }}" alt="">
    </header>

    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto bg-primary text-white rounded p-2">
                <h1>N° QSO : {{ $contactos->total_contactos }} | INDICATIVO {{ $indicadores->total_contactos }} </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mx-auto rounded p-2">
                <h4>N° QSO´s PARA {{ Request()->usuario }} : {{ count($puntos) }} </h4>
            </div>
        </div>
        <a href="../../" class="btn btn-primary my-3 mx-auto d-block w-25">NUEVA BUSQUEDA</a>
        <div class="row">
            @if(!empty($evento->imagen_diploma_1))
            <div class="col-md-4">
                <card class="card">
                    <div class="card-header">
                        <h4 class="card-title">Diploma</h4>
                    </div>
                    <div class="card-body">
                        <img class="rounded mx-auto d-block w-100" src="{{ Vite::asset('public/'.$evento->imagen_diploma_1.'') }}" alt="">
                        <a href="{{ route('diploma_pdf.get', ['usuario'=> Request()->usuario, 'tipo_diploma'=> 'imagen_diploma_1']) }}" class="btn btn-primary mx-auto d-block mt-3">Descargar</a>
                    </div>
                </card>
            </div>
            @endif
            @if(!empty($evento->imagen_diploma_2))
            <div class="col-md-4">
                <card class="card">
                    <div class="card-header">
                        <h4 class="card-title">Diploma</h4>
                    </div>
                    <div class="card-body">
                        <img class="rounded mx-auto d-block w-100" src="{{ Vite::asset('public/'.$evento->imagen_diploma_2.'') }}" alt="">
                        <a href="{{ route('diploma_pdf.get', ['usuario'=> Request()->usuario, 'tipo_diploma'=> 'imagen_diploma_2']) }}" class="btn btn-primary mx-auto d-block mt-3">Descargar</a>
                    </div>
                </card>
            </div>
            @endif
            @if(!empty($evento->imagen_diploma_3))
            <div class="col-md-4">
                <card class="card">
                    <div class="card-header">
                        <h4 class="card-title">Diploma</h4>
                    </div>
                    <div class="card-body">
                        <img class="rounded mx-auto d-block w-100" src="{{ Vite::asset('public/'.$evento->imagen_diploma_3.'') }}" alt="">
                        <a href="{{ route('diploma_pdf.get', ['usuario'=> Request()->usuario, 'tipo_diploma'=> 'imagen_diploma_3']) }}" class="btn btn-primary mx-auto d-block mt-3">Descargar</a>
                    </div>
                </card>
            </div>
            @endif

        </div>
        <hr>

        <div class="row mt-3">
            <div class="col-md-5 mx-auto">
                <table class="table table-primary table-striped mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Usuario</th>
                            <th>Banda</th>
                            <th>Fecha</th>
                            <th>Modo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($puntos as $punto)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $punto->participante }}</td>
                            <td>{{ $punto->bandas->nombre_banda }}</td>
                            <td>{{ $punto->fecha }}</td>
                            <td>{{ $punto->modo }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer class="container d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center" bis_skin_checked="1">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <i class="fa-solid fa-code"></i>
            </a>
            <span class="mb-3 mb-md-0 text-muted">© 2022 krenti</span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-twitter h3"></i></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-instagram h3"></i></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-facebook h3"></i></a></li>
        </ul>
    </footer>
</body>

</html>
