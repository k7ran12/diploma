@extends('layouts.app')

@section('template_title')
    {{ $event->name ?? 'Show Event' }}
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="position-absolute top-0 start-0"">
                            <a class="btn btn-primary" href="{{ route('event.index') }}"><i class="fa-solid fa-backward"></i> Atras</a>
                        </div>
                        <div class="position-absolute top-0 end-0">
                            <a href="{{ route('participant.create', Request()->event) }}"
                                class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Crear Participante') }}
                            </a>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <center>
                                    <h3>Detalle de Sala</h3>
                                </center>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Cantidad Diplomas:</strong>
                                    {{ $event->cantidad_diplomas }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Top Maximo Diploma:</strong>
                                    {{ $event->top_maximo_diploma }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Descripcion:</strong>
                                    {{ $event->descripcion }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Estado:</strong>
                                    {{ $event->estado == 1 ? 'activo' : 'inactivo' }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body mx-auto w-75">
                        <center>
                            <h5><strong>Participantes</strong></h5>
                        </center>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover w-75 mx-auto">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>
                                            Nombre
                                        </th>
                                        <th>Cantidad Puntos</th>
                                        <th>Cantidad Contactos</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $cantidad = 0;
                                    @endphp
                                    @if (!empty($participants))
                                        @foreach ($participants as $participant)
                                            <tr>

                                                <td>{{ ++$cantidad }}</td>
                                                <td>{{ $participant->nombre }}</td>
                                                <td>{{ $participant->cantidad_puntos }}</td>
                                                <td>{{ $participant->cantidad_contactos }}</td>

                                                <td>
                                                    <form
                                                        action="{{ route('participant.destroy', ['event' => Request()->event, 'participant' => $participant->id]) }}"
                                                        method="POST">
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('participant.show', ['event' => Request()->event, 'participant' => $participant->id]) }}"><i
                                                                class="fa fa-fw fa-eye"></i> Detalle Puntos</a>
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('participant.edit', ['event' => Request()->event, 'participant' => $participant->id]) }}"><i
                                                                class="fa fa-fw fa-edit"></i> Editar</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3">
                                                <div class="alert alert-info" role="alert">
                                                    <center>No existen participantes</center>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
