@extends('layouts.base')
@section('title', 'Actualizar usuario')
@section('content')
    @section('content-2')
        <div class="card cardprincipal mt-2 border-success">
            <h2 class="text-center bg-success text-white">Actualizar Usuario</h2>
            <div class="card-body">
                <div class="card border-success">
                    <div class="card-body">
                        <form action="/usuarios/{{ $usuario->id }}" method="post" enctype="multipart/form-data" class="p-3">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="id" class="form-label">Id</label>
                                <input type="text" class="form-control" id="id" name="id" readonly value="{{$usuario->user->id}}">
                            </div>
                            <div class="mb-3 ">
                                <label for="tipo_documento" class="form-label">Tipo documento</label>
                                <select name="tipo_documento" id="tipo_documento" class="form-select">
                                    <option value="#">Seleccione...</option>
                                    <option value="C.C" @if ($usuario->user->tipo_documento == 'C.C')
                                        selected
                                    @endif>Cedula de Ciudadania</option>
                                    <option value="T.I" @if ($usuario->user->tipo_documento == 'T.I')
                                        selected
                                    @endif>Tarjeta de Identidad</option>
                                    <option value="C.E" @if ($usuario->user->tipo_documento == 'C.E')
                                        selected
                                    @endif>Cedula Extranjera</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="documento" class="form-label">Documento</label>
                                <input type="text" class="form-control" id="documento" name="documento" value="{{$usuario->user->documento}}">
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="name" value="{{$usuario->user->name}}">
                            </div>
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" value="{{$usuario->user->apellido}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="usuario">Usuario</label>
                                <input type="text" class="form-control" id="usuario" name="username"
                                   value="{{$usuario->user->username}}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                   value="{{$usuario->user->email}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="rol">Rol</label>
                                <select name="rol" id="rol" class="form-select">
                                   @foreach($permisos as $permiso)
                                      <option value="{{ $permiso->id }}" @if($permiso->id == $usuario->permiso->id)
                                        selected
                                       @endif>{{ $permiso->rol }}</option>
                                    @endforeach
                                <select>
                            </div>
                           <div class="botones">
                                <button type="submit" class="btn btn-primary btn-block fw-bold"> <span class="fas fa-user-plus"></span> Actualizar</button>
                            <a class="btn btn-success btn-block fw-bold " href="/usuarios"> <span class="fas fa-arrow-circle-left"></span> Regresar</a>
                           </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endsection

@endsection
