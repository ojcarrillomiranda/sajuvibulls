@extends('layouts.base')
@section('title', 'Bienvenido a sajuvibulls')
@section('content')
@section('content-2')

    <div class="container-fluid mt-5">
        <div class="row text-center text-light">
            <div class="col">
                <div class="card border border-primary">
                    <h4 class="bg-primary h3">Usuarios</h4>
                    <div class="card-body">
                        <a class="btn btn-primary position-relative" href="usuarios/">
                            <img src="{{ asset('/images/grupo.png') }}" class="w-25 h-25">
                            @if ($usuarioss > 0)
                                <span
                                    class="badge rounded-pill bg-dark fs-4 position-absolute top-50 start-80 translate-middle badge rounded-pill bg-secondary">{{ $usuarioss }}</span>
                            @endif
                        </a>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark " role="progressbar"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border border-success">
                    <h4 class="bg-success h3">Pacientes</h4>
                    <div class="card-body">
                        <a class="btn btn-success position-relative" href="pacientes/">
                            <img src="{{ asset('/images/cama.png') }}" class="w-25 h-25">
                            @if ($pacientess > 0)
                                <span
                                    class="badge rounded-pill bg-warnig fs-4 position-absolute top-50 start-80 translate-middle badge rounded-pill bg-warning">{{ $pacientess }}</span>
                            @endif
                        </a>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning "
                                role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                style="width: 100%">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col">
                <div class="card border border-danger">
                    <h4 class="bg-danger h3">Historias clinicas</h4>
                    <div class="card-body">
                        <a class="btn btn-danger position-relative" href="historias/">
                            <img src="{{ asset('/images/carpeta.png') }}" class="w-25 h-25">
                            @if ($historiass > 0)
                                <span
                                    class="badge rounded-pill bg-info fs-4 position-absolute top-50 start-80 translate-middle badge rounded-pill">{{ $historiass }}</span>
                            @endif
                        </a>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-info " role="progressbar"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop
@stop

@section('js')

@if (Auth::user())
    <script>
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: '¡Bienvenido(a)! <br>{{ Auth::user()->name }}',
            showConfirmButton: true,
            timer: 2000
        });

    </script>
@endif
@endsection
