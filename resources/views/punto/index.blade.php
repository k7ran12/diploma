@extends('layouts.app')

@section('template_title')
    Punto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Punto') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('puntos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Lugar Contacto</th>
										<th>Puntos</th>
										<th>Event Id</th>
										<th>Participant Id</th>
										<th>Fecha</th>
										<th>Banda Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($puntos as $punto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $punto->lugar_contacto }}</td>
											<td>{{ $punto->puntos }}</td>
											<td>{{ $punto->event_id }}</td>
											<td>{{ $punto->participant_id }}</td>
											<td>{{ $punto->fecha }}</td>
											<td>{{ $punto->banda_id }}</td>

                                            <td>
                                                <form action="{{ route('puntos.destroy',$punto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('puntos.show',$punto->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('puntos.edit',$punto->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $puntos->links() !!}
            </div>
        </div>
    </div>
@endsection
