@extends('layouts.app')

@section('template_title')
    Update Punto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="float-right">
            <a class="btn btn-primary"
                href="{{ route('participant.show', ['event' => Request()->event, 'participant' => Request()->participant]) }}"><i
                    class="fa-solid fa-backward"></i> Back</a>
        </div>
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default w-25 mx-auto">
                    <div class="card-header">
                        <span class="card-title">Update Punto</span>
                    </div>
                    <div class="card-body">
                        <form method="POST"
                            action="{{ route('puntos.update', ['event' => Request()->event, 'participant' => Request()->participant, 'punto' => $punto->id]) }}"
                            role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('punto.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
