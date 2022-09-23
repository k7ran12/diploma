@extends('layouts.app')

@section('template_title')
    Create Participant
@endsection

@section('content')
    @if (session('msg'))
        <div class="alert alert-danger">
            {{ session('msg') }}
        </div>
    @endif
    <section class="content container-fluid">
        <div class="float-right">
            <a class="btn btn-primary" href="{{ route('event.show', ['event' => Request()->event]) }}"><i class="fa-solid fa-backward"></i> Back</a>
        </div>
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default w-75 mx-auto">
                    <div class="card-header">
                        <span class="card-title">Create Participant</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('participant.store', Request()->event) }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('participant.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        let cantidad_puntos = document.getElementById('cantidad_puntos');
        var numberMask = IMask(cantidad_puntos, {
            mask: Number,
            scale: 2,
            signed: false,
            thousandsSeparator: '',
            padFractionalZeros: false,
            normalizeZeros: true,
            min: 1,
            max: 1000
        });
    </script>
@endsection
