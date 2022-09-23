@extends('layouts.app')

@section('template_title')
    Create Punto
@endsection

@section('content')
    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('msg'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default w-25 mx-auto">
                    <div class="card-header">
                        <span class="card-title">Agregar Puntos</span>
                    </div>
                    <div class="card-body">
                        <form method="POST"
                            action="{{ route('add.store') }}"
                            role="form" enctype="multipart/form-data">
                            @csrf

                            @include('add.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
