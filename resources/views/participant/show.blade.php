@extends('layouts.app')

@section('template_title')
    {{ $participant->name ?? 'Show Participant' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="position-absolute top-0 end-0">
                            <a href="{{ route('puntos.create', ['event' => Request()->event, 'participant' => Request()->participant]) }}"
                                class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Create New') }}
                            </a>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <center>
                                    <h3>Detalle de Sala</h3>
                                </center>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong>Nombre participante:</strong>
                                    {{ $participante->nombre }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong>Total puntos:</strong>
                                    {{ $participante->cantidad_puntos }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong>Cantidad contactos</strong>
                                    {{ $participante->cantidad_contactos }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Lugar Contacto</th>
                                        <th>Puntos</th>
                                        <th>Fecha</th>
                                        <th>Banda</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($puntos as $punto)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $punto->lugar_contacto }}</td>
                                            <td>{{ $punto->puntos }}</td>
                                            <td>{{ $punto->fecha }}</td>
                                            <td>{{ $punto->bandas->nombre_banda }}</td>

                                            <td>
                                                <form
                                                    action="{{ route('puntos.destroy', ['event' => Request()->event, 'participant' => Request()->participant, 'punto' => $punto->id]) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('puntos.show', ['event' => Request()->event, 'participant' => Request()->participant, 'punto' => $punto->id]) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('puntos.edit', ['event' => Request()->event, 'participant' => Request()->participant, 'punto' => $punto->id]) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
