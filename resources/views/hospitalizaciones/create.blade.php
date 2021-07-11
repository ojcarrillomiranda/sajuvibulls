@extends('layouts.base')
@section('title', 'Hospitalizaciones')
@section('content')

@section('content-2')

    <div class="card container-fluid">
        <div class="card-body">
            <div class="table-responsive">
                <div class="botones my-3 ml-1">
                    <a href="/historias/create" class="btn btn-success mb-3 fw-bold"><i class="fas fa-address-card fw-bold"> +</i></a>
                    {{-- <a href="{{ route('historiaspdf') }}" class="btn btn-danger mb-3 fw-bold ml-2" target="_blank"><i
                            class="fas fa-file-pdf fs-4 "></i></a> --}}
                </div>

                <table id="tablaHistorias" class="table table-striped table-bordered table-hover table-sm caption-top align-middle table-condensed" style="font-size: 13px;">
                    <caption class="h5">Historial clinico</caption>
                    <thead class="bg-success text-center">
                        <tr>
                            <th># Seguimiento</th>
                            <th>Paciente</th>
                            <th>Propietario</th>
                            <th>Contacto Propietario</th>
                            <th>Especie</th>
                            <th>Raza</th>
                            <th>Observaciones</th>
                            <th>Medicamentos</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody class="text-center m-o align-middle">
                        @foreach ($historias as $historia)
                            <tr>
                                <td>{{ $historia->id }}</td>
                                <td>{{ $historia->paciente}}</td>
                                <td>{{ $historia->representante}}</td>
                                <td>{{ $historia->contacto_representante}}</td>
                                <td>{{ $historia->especie}}</td>
                                <td>{{ $historia->raza}}</td>
                                <td class="text-start">{{ $historia->observaciones}}</td>
                                <td class="text-start">{{ $historia->medicamentos}}</td>
                                <td>{{ $historia->estado}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
@stop

@section('js')

@if(session('hospitalizacion') == 'ok')
<script>
Swal.fire({
    title: '¡Hecho!',
    text: "La historia se actualizo con exito",
    icon: 'success'
});

</script>
@endif

@if (session('eliminar') == 'ok')
<script>
    Swal.fire(
    '¡Correcto!',
    'La historia clinica se elimino con exito.',
    'success'
    );
</script>
@endif
@endsection
