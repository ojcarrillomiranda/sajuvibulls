@extends('layouts.base')
@section('title', 'Detalle de paciente')
@section('content')

@section('content-2')
<div class="card w-100  h-50 mx-auto border-success" style="background:rgba(252, 250, 250, 0.945)" >
    <div class="card-body  p-5">
        <h1 class="text-center">Historia clinica</h1>
        <div class="row ">
            <div class="col-sm-4">
                @foreach ($pacientes as $paciente)
                   @if ($paciente->id == $historia->paciente_id)
                   <img src="{{ asset('images/pacientes/' . $paciente->foto) }}" style="width:100%; height:100%">
                    @endif
                @endforeach
            </div>
            <div class="col-sm-8">

                <div class="table-responsive">
                    <table class="table table-striped table-secondary table-bordered">
                        <tr>
                            <td class="fw-bold text-center align-middle">No de Historia</td>
                            <td>{{ $historia->id }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-center align-middle">Fecha y hora de ingreso</td>
                            <td>{{ $historia->created_at }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-center align-middle">Paciente</td>
                            <td>{{ $historia->paciente->nombre }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-center align-middle">Dueño</td>
                            <td>{{ $historia->representante->primer_nombre }} {{ $historia->representante->segundo_nombre }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-center align-middle">Medico responsable</td>
                            <td>{{ $historia->medico->name }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-center align-middle">Tipo de consulta</td>
                            <td>{{ $historia->tipoConsulta->descripcion }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-center align-middle">Observaciones</td>
                            <td>{{ $historia->observaciones }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-center align-middle">Medicamentos</td>
                            <td>{{ $historia->medicamentos}}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-center align-middle">Estado</td>
                            <td>{{ $historia->estado}}</td>
                        </tr>
                    </table>
                </div>
              <div class="show">
                <a href="/historia-id-pdf/{{ $historia->id }}" class="btn btn-success rounded-circle  fs-3 mt-3 " target="_blank"> <i class="far fa-file-pdf fs-3 "></i> </a>
                 @if (Auth::user()->hasPermiso('administrador'))
                    <form action="/historias/{{ $historia->id }}" method="post" class="d-inline eliminar-historia  ml-2 rounded-circle">
                     @method('delete')
                     @csrf
                     <button type="submit" class="btn btn-danger px-3 mt-3 fs-3 rounded-circle"><i class="fas fa-trash-alt fs-3 "></i></button>
                    </form>
                    <a href="/historias/{{ $historia->id }}/edit" class="btn btn-warning fs-3 mt-3  ml-2 rounded-circle"><i class="fas fa-edit"></i></a>
                 @endif
                 @if (Auth::user()->hasPermiso('medico'))
                   <a href="/historias/{{ $historia->id }}/edit" class="btn btn-warning fs-3 mt-3  ml-2 rounded-circle"><i class="fas fa-edit"></i></a>
                 @endif
                <a href="/historias" class="btn btn-success mt-3 fw-bold fs-3 ml-2 rounded-circle"><ion-icon name="arrow-undo"></ion-icon></a>
              </div>

            </div>
        </div>
    </div>
</div>
@stop
@stop

@section('js')

<script>

    $(".eliminar-historia").submit(function(e){
           e.preventDefault();


           Swal.fire({
           title: '¿Estas seguro?',
           text: "¡La historia clinica se eliminara definitivamente!",
           icon: 'warning',
           showCancelButton: true,
           confirmButtonColor: '#3085d6',
           cancelButtonColor: '#d33',
           confirmButtonText: '¡Si,  Eliminar!',
           cancelButtonText: 'Cancelar',
           }).then((result) => {
           if (result.isConfirmed) {

               this.submit();
           }
       })

   });

</script>
@endsection
