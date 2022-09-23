@extends('layouts.app')

@section('template_title')
    {{ $punto->name ?? 'Show Punto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Punto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('puntos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Lugar Contacto:</strong>
                            {{ $punto->lugar_contacto }}
                        </div>
                        <div class="form-group">
                            <strong>Puntos:</strong>
                            {{ $punto->puntos }}
                        </div>
                        <div class="form-group">
                            <strong>Event Id:</strong>
                            {{ $punto->event_id }}
                        </div>
                        <div class="form-group">
                            <strong>Participant Id:</strong>
                            {{ $punto->participant_id }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $punto->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Banda Id:</strong>
                            {{ $punto->banda_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
