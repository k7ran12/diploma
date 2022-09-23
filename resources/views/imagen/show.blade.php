@extends('layouts.app')

@section('template_title')
    {{ $imagen->name ?? 'Show Imagen' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Imagen</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('imagens.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $imagen->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            {{ $imagen->tipo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
