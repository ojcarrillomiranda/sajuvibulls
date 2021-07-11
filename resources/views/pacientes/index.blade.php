@extends('layouts.base')
@section('title', 'Listado de pacientes')
@section('content')

@section('content-2')

    <div class="card container-fluid">
        <div class="card-body">
            <div class="table-responsive">
                <div class="botones my-3 ml-1">
                    <a href="/pacientes/create" class="btn btn-success mb-3 fw-bold"><i
                            class="fas fa-dog fs-4 fw-bold">+</i></a>
                    <a href="{{ route('pacientespdf') }}" class="btn btn-danger mb-3 fw-bold ml-2" target="_blank"><i
                            class="fas fa-file-pdf fs-4 "></i></a>
                </div>

                <table id="tablaPacientes" class="table table-striped  table-hover table-sm caption-top">
                    <caption class="fw-bold">LISTA DE PACIENTES</caption>
                    <thead class="bg-success text-center">
                        <tr>
                            <th>Documento</th>
                            <th>Dueño</th>
                            <th>Paciente</th>
                            <th>Foto</th>
                            <th>Fecha de nacimiento</th>
                            <th>Especie</th>
                            <th>Sexo</th>
                            <th>Raza</th>
                            <th>Peso</th>
                            <th>Ver</th>
                        </tr>
                    </thead>
                    <tbody class="text-center align-middle">
                        @foreach ($pacientes as $paciente)
                            <tr>
                                <td>{{ $paciente->representante->documento }}</td>
                                <td>{{ $paciente->representante->primer_nombre }}
                                    {{ $paciente->representante->primer_apellido }}</td>
                                <td>{{ $paciente->nombre }}</td>
                                <td><img src="{{ asset('images/pacientes/' . $paciente->foto) }}"
                                        style="width: 2cm;heigth:2cm"></td>
                                <td>{{ $paciente->fecha_nacimiento }}</td>
                                <td>{{ $paciente->especie->especie }}</td>
                                <td>{{ $paciente->sexo->sexo }}</td>
                                <td>{{ $paciente->raza->raza }}</td>
                                <td>{{ $paciente->peso }} Kilo(s)</td>
                                <td>
                                    <a href="{{ url('pacientes/' . $paciente->id) }}"
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

@if(session('actualizar-paciente') == 'ok')
<script>
Swal.fire({
    title: '¡Hecho!',
    text: "El paciente se actualizo con exito",
    icon: 'success'
});

</script>
@endif

@if (session('eliminar') == 'ok')
<script>
Swal.fire(
'¡Correcto!',
'El paciente se elimino con exito.',
'success'
);
</script>
@endif
@endsection
