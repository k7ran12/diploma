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
        <img class="img-fluid w-100" src="{{ Vite::asset('resources/images/bannerweb1.jpg') }}" alt="">
    </header>
    @if (!empty($evento->estado))
    @if ($evento->estado == 2)
    <div class="container">
        <section class="my-3">
            <div class="d-flex justify-content-center">
                <div class="col-md-6 mx-auto bg-primary text-white rounded p-2">
                    <h1 style="color: white !important">N° QSO : {{ !empty($contactos->total_contactos) ? $contactos->total_contactos : 0 }} |
                        INDICATIVO
                        {{ !empty($indicadores->total_contactos) ? $indicadores->total_contactos : 0 }} </h1>
                </div>
            </div>
            <form action="{{ route('principal.search') }}" method="get">
                <div class="d-flex justify-content-center">

                    <div class="p-2 bd-highlight">
                        <input name="buscar" type="text" class="form-control">
                    </div>
                    <div class="p-2 bd-highlight">
                        <button class="btn btn-secondary">BUSCAR INDICATIVO</button>
                    </div>
                </div>
            </form>
        </section>
        <hr>
        <div class="row justify-content-md-center bg-color py-3 px-3 mb-3">
            @if (!empty($evento->imagen_diploma_1))
            <div class="col-md-3 col-sm-6 col-xs-12">
                <img class="img-fluid" style="width:100%" src="{{ $evento->imagen_diploma_1 }}" alt="">
            </div>
            @endif
            @if (!empty($evento->imagen_diploma_2))
            <div class="col-md-3 col-sm-6 col-xs-12">
                <img class="img-fluid" style="width:100%" src="{{ $evento->imagen_diploma_2 }}" alt="">
            </div>
            @endif
            @if (!empty($evento->imagen_diploma_3))
            <div class="col-md-3 col-sm-6 col-xs-12">
                <img class="img-fluid" style="width:100%" src="{{ $evento->imagen_diploma_3 }}" alt="">
            </div>
            @endif

            <div class="col-md-12 pt-3">
                {!! $evento->descripcion_actividad !!}
                <!--<center><a href="">BASE DE DIPLOMA</a></center>-->
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-3 mx-auto">
                <div class="d-block mx-auto mt-3" id="micss11" bis_skin_checked="1"><center>TOP GENERAL</center></div>
                <table style="width: 100%;" id="micss9" border="2" bordercolor="#000000">
                    <tbody>
                        <tr>
                            <td width="30" align="center" bgcolor="#4C91DC" id="micss6">
                                <div id="micss7" bis_skin_checked="1">#</div>
                            </td>
                            <td width="90" align="left" id="micss6" bgcolor="#4C91DC">
                                <div id="micss7" bis_skin_checked="1">&nbsp;&nbsp;INDICATIVO</div>
                            </td>
                            <td width="60" align="center" bgcolor="#4C91DC" id="micss6">
                                <div id="micss7" bis_skin_checked="1">CONTACTOS</div>
                            </td>
                        </tr>
                        @php
                        $i = 0;
                        @endphp
                        @foreach ($puntos as $punto)
                        <tr align="center" bgcolor="#ECF5FF">
                            <td id="micss6" bgcolor="#4C91DC">
                                <div id="micss7" bis_skin_checked="1">{{++$i}}</div>
                            </td>
                            <td align="left" id="micss6">&nbsp;<a
                                href="{{ route('indicativo.search', ['usuario' => $punto->participante, 'top' => 'general']) }}">{{
                                $punto->participante }}</a></td>
                            <td id="micss6"><b>{{ $punto->total_contactos }}</b></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="col-md-3 mx-auto">
                <div class="d-block mx-auto mt-3" id="micss11" bis_skin_checked="1"><center>TOP 100 FONIA</center></div>
                <table style="width: 100%;" id="micss9" border="2" bordercolor="#000000">
                    <tbody>
                        <tr>
                            <td width="30" align="center" bgcolor="#4C91DC" id="micss6">
                                <div id="micss7" bis_skin_checked="1">#</div>
                            </td>
                            <td width="90" align="left" id="micss6" bgcolor="#4C91DC">
                                <div id="micss7" bis_skin_checked="1">&nbsp;&nbsp;INDICATIVO</div>
                            </td>
                            <td width="60" align="center" bgcolor="#4C91DC" id="micss6">
                                <div id="micss7" bis_skin_checked="1">CONTACTOS</div>
                            </td>
                        </tr>
                        @php
                        $i = 0;
                        @endphp
                        @foreach ($fonia as $fon)
                        <tr align="center" bgcolor="#ECF5FF">
                            <td id="micss6" bgcolor="#4C91DC">
                                <div id="micss7" bis_skin_checked="1">{{++$i}}</div>
                            </td>
                            <td align="left" id="micss6">&nbsp;<a
                                    href="{{ route('indicativo.search', ['usuario' => $fon->participante, 'top' => 'ft8']) }}">{{
                                    $fon->participante }}</a></td>
                            <td id="micss6"><b>{{ $fon->cantidad }}</b></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="col-md-3 mx-auto">
                <div class="d-block mx-auto mt-3" id="micss11" bis_skin_checked="1"><center>TOP 100 FT8</center></div>
                <table style="width: 100%;" id="micss9" border="2" bordercolor="#000000">
                    <tbody>
                        <tr>
                            <td width="30" align="center" bgcolor="#4C91DC" id="micss6">
                                <div id="micss7" bis_skin_checked="1">#</div>
                            </td>
                            <td width="90" align="left" id="micss6" bgcolor="#4C91DC">
                                <div id="micss7" bis_skin_checked="1">&nbsp;&nbsp;INDICATIVO</div>
                            </td>
                            <td width="60" align="center" bgcolor="#4C91DC" id="micss6">
                                <div id="micss7" bis_skin_checked="1">CONTACTOS</div>
                            </td>
                        </tr>
                        @php
                        $i = 0;
                        @endphp
                        @foreach ($ft8 as $fon)
                        <tr align="center" bgcolor="#ECF5FF">
                            <td id="micss6" bgcolor="#4C91DC">
                                <div id="micss7" bis_skin_checked="1">{{++$i}}</div>
                            </td>
                            <td align="left" id="micss6">&nbsp;<a
                                    href="{{ route('indicativo.search', ['usuario' => $fon->participante, 'top' => 'ft8']) }}">{{
                                    $fon->participante }}</a></td>
                            <td id="micss6"><b>{{ $fon->cantidad }}</b></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!--<div class="col-md-3">
                <center><label>TOP 100 SSB</label></center>
                <table class="table table-primary table-striped mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>INDICATIVO</th>
                            <th>SLOTS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>QWERTY</td>
                            <td>123</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>QWERTY</td>
                            <td>123</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>QWERTY</td>
                            <td>123</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>QWERTY</td>
                            <td>123</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-3">
                <center><label>TOP 100 CW</label></center>
                <table class="table table-primary table-striped mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>INDICATIVO</th>
                            <th>SLOTS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>QWERTY</td>
                            <td>123</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>QWERTY</td>
                            <td>123</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>QWERTY</td>
                            <td>123</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>QWERTY</td>
                            <td>123</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-3">
                <center><label>TOP 100 DIGITALES</label></center>
                <table class="table table-primary table-striped mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>INDICATIVO</th>
                            <th>SLOTS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>QWERTY</td>
                            <td>123</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>QWERTY</td>
                            <td>123</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>QWERTY</td>
                            <td>123</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>QWERTY</td>
                            <td>123</td>
                        </tr>
                    </tbody>
                </table>
            </div>-->
        </div>

    </div>
    @else
    <div class="alert alert-secondary" role="alert">
        No tiene eventos activos
    </div>
    @endif
    @else
    <div class="alert alert-secondary" role="alert">
        No tiene eventos activos
    </div>
    @endif
    <footer class="container d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center" bis_skin_checked="1">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <i class="fa-solid fa-code"></i>
            </a>
            <span class="mb-3 mb-md-0 text-muted">© 2022 krenti</span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-twitter h3"></i></a>
            </li>
            <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-instagram h3"></i></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-facebook h3"></i></a>
            </li>
        </ul>
    </footer>
</body>

</html>
