@extends('layouts.base')
@section('title', 'Listado de usuarios')
@section('content')

@section('content-2')

    <div class="card w-100">
        <div class="card-body">
            <div class="table-responsive">
                <div class="botones my-3 ml-1">
                    <a href="/usuarios/create" class="btn btn-success mb-3 fw-bold "><i class="fas fa-users fs-5"></i>+</a>
                    <a href="{{ route('usuariospdf') }}" class="btn btn-danger mb-3 fw-bold ml-2" target="_blank"><i
                            class="fas fa-file-pdf fs-5"></i></a>
                </div>

                <table id="tablaUsuarios"
                    class=" table table-striped  table-hover table-sm table-bordered table-condensed caption-top" style="font-size: 14.8px;">
                    <caption class="fw-bold">LISTA DE USUARIOS</caption>
                    <thead class="bg-success text-center">
                        <tr>
                            <th>Tipo documento</th>
                            <th>Documento</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th>Permiso</th>
                            <th>Ver</th>
                            @if (Auth::user()->hasPermiso('administrador'))
                                <th>Editar</th>
                                <th>Eliminar</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="text-center align-middle">
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->user->tipo_documento }}</td>
                                <td>{{ $usuario->user->documento }}</td>
                                <td>{{ $usuario->user->name }}</td>
                                <td>{{ $usuario->user->apellido }}</td>
                                <td>{{ $usuario->user->username }}</td>
                                <td>{{ $usuario->user->email }}</td>
                                <td>{{ $usuario->permiso->rol }}</td>
                                <td> <a href="{{ url('usuarios/' . $usuario->user->id) }}"
                                        class="btn btn-success rounded-circle"><span><i class="fas fa-eye"></i></span></a>
                                </td>
                                @if (Auth::user()->hasPermiso('administrador'))

                                    <td>
                                        <a href="{{ '/usuarios/' . $usuario->user->id . '/edit' }}"
                                            class="btn btn-warning rounded-circle"><span><i
                                                    class="fas fa-user-edit"></i></span></a>
                                    </td>
                                    <td>
                                        <form action="/usuarios/{{ $usuario->user->id }}" method="post"
                                            class="d-inline eliminar-usuario">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger rounded-circle" type="submit"><span><i
                                                        class="fas fa-trash"></i></span>
                                            </button>
                                        </form>
                                    </td>
                                @endif
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

@if (session('usuario-actualizar') == 'ok')
    <script>
        Swal.fire({
            title: '¡Correcto!',
            text: "El usuario se actualizo con exito",
            icon: 'success'
        });

    </script>
@endif


<script>
    $(".eliminar-usuario").submit(function(e) {
        e.preventDefault();


        Swal.fire({
            title: '¿Estas seguro?',
            text: "¡El usuario se eliminara definitivamente!",
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

@if (session('usuario-eliminar') == 'ok')
    <script>
        Swal.fire(
            '¡Correcto!',
            'El usuario se elimino con exito.',
            'success'
        );

    </script>
@endif
@endsection
