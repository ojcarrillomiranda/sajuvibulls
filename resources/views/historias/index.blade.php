@extends('layouts.base')
@section('title', 'Historial clinico')
@section('content')

@section('content-2')

    <div class="card container-fluid">
        <div class="card-body">
            <div class="table-responsive">
                <div class="botones my-3 ml-1">
                    <a href="/historias/create" class="btn btn-success mb-3 fw-bold"><i class="fas fa-address-card fw-bold"> +</i></a>
                    <a href="{{ route('historiaspdf') }}" class="btn btn-danger mb-3 fw-bold ml-2" target="_blank"><i
                            class="fas fa-file-pdf fs-4 "></i></a>
                </div>

                <table id="tablaHistorias" class="table table-striped table-bordered table-hover table-sm caption-top align-middle table-condensed">
                    <caption class="h5">Historial clinico</caption>
                    <thead class="bg-success text-center">
                        <tr>
                            <th>No Historia Clinica</th>
                            <th>Paciente</th>
                            <th>Dueño</th>
                            <th>Tipo de atencion</th>
                            <th>Medico responsable</th>
                            <th>Estado</th>
                            <th>Ver</th>
                        </tr>
                    </thead>
                    <tbody class="text-center m-o align-middle">
                        @foreach ($historias as $historia)
                            <tr>
                                <td>{{ $historia->id }}</td>
                                <td>{{ $historia->paciente->nombre }}</td>
                                <td>{{ $historia->representante->primer_nombre }} {{ $historia->representante->segundo_nombre }} {{ $historia->representante->primer_apellido }} {{ $historia->representante->segundo_apellido }}</td>
                                <td>{{ $historia->tipoConsulta->descripcion }}</td>
                                <td>{{ $historia->medico->name}}</td>
                                <td>{{ $historia->estado}}</td>
                                <td>

                                    <a href="{{ url('historias/' . $historia->id ) }}"
                                        class="btn btn-success rounded-circle"><span><i class="fas fa-eye"></i></span></a>
                                </td>
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

@if(session('actualizar-historia') == 'ok')
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
