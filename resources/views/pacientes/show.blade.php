@extends('layouts.base')
@section('title', 'Detalle de paciente')
@section('content')

@section('content-2')
    <div class="card w-100  h-50 mx-auto border-success" style="background:rgba(252, 250, 250, 0.945)">
        <div class="card-body  p-5">
            <h1 class="text-center">Paciente</h1>
            <div class="row ">
                <div class="col-sm-4">
                    <img src="{{ asset('images/pacientes/' . $paciente->foto) }}" style="width:100%;height:100%">
                </div>
                <div class="col-sm-8">

                    <div class="table-responsive">
                        <table class="table table-striped table-secondary table-bordered ">
                            <tr>
                                <td class="fw-bold text-start w-25 align-middle">ID</td>
                                <td>{{ $paciente->id }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-start w-25 align-middle">NOMBRE</td>
                                <td>{{ $paciente->nombre }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-start w-25 align-middle">DUEÑO</td>
                                <td>{{ $paciente->representante->primer_nombre }}
                                    {{ $paciente->representante->segundo_nombre }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-start w-25 align-middle">FECHA DE NACIMIENTO</td>
                                <td>{{ $paciente->fecha_nacimiento }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-start w-25 align-middle">ESPECIE</td>
                                <td>{{ $paciente->especie->especie }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-start w-25 align-middle">SEXO</td>
                                <td>{{ $paciente->sexo->sexo }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-start w-25 align-middle">RAZA</td>
                                <td>{{ $paciente->raza->raza }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-start w-25 align-middle">PESO</td>
                                <td>{{ $paciente->peso }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="botones-show">
                        <a href="/pacienteidPDF/{{ $paciente->id }}" class="btn btn-success rounded-circle  fs-3 mt-3 "
                            target="_blank"> <i class="far fa-file-pdf fs-3 "></i> </a>
                            @if (Auth::user()->hasPermiso('administrador'))
                                <form action="/pacientes/{{ $paciente->id }}" method="post"
                                    class="d-inline eliminar ml-2 rounded-circle">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger px-3 mt-3 fs-3 rounded-circle"><i
                                            class="fas fa-trash-alt fs-3  "></i></button>
                                </form>
                                <a href="/pacientes/{{ $paciente->id }}/edit"
                                    class="btn btn-warning fs-3 mt-3  ml-2 rounded-circle"><i class="fas fa-edit"></i></a>
                            @endif
                            @if (Auth::user()->hasPermiso('medico'))
                                <a href="/pacientes/{{ $paciente->id }}/edit"
                                    class="btn btn-warning fs-3 mt-3  ml-2 rounded-circle"><i class="fas fa-edit"></i></a>
                                @endif
                        <a href="/pacientes" class="btn btn-success mt-3 fw-bold fs-3 ml-2 rounded-circle">
                            <ion-icon name="arrow-undo"></ion-icon>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@stop

@section('js')

<script>
$(".eliminar").submit(function(e){
e.preventDefault();


Swal.fire({
title: '¿Estas seguro?',
text: "¡El paciente se eliminara definitivamente!",
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: '¡Si,  Eliminar!',
cancelButtonText: 'Cancelar',
}).then((result) => {
if (result.isConfirmed) {
// Swal.fire(
// 'Deleted!',
// 'Your file has been deleted.',
// 'success'
// )
this.submit();
}
});

});

</script>
@endsection
