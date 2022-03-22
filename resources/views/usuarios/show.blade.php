@extends('layouts.base')
@section('title', 'informacion del usuario')
@section('content')

@section('content-2')
    <div class="card cardprincipal mt-2 show border-success">
        <h2 class="text-center bg-success text-white">Informacion de usuario</h2>
        <div class="card-body">
            <div class="card border-success">
                <div class="card-body">
                    <form action="/usuarios" method="post" enctype="multipart/form-data" class="p-3">
                        @csrf
                        <div class="row">
                            <div class=" col-12 col-sm-6 mb-3">
                                <label for="id" class="form-label">Id</label>
                                <input type="text" class="form-control" id="id" value="{{ $usuario->user->id }}"
                                    name="id" readonly>
                            </div>
                            <div class=" col-12 col-sm-6 mb-3">
                                <label for="tipo_documento" class="form-label">Tipo documento</label>
                                <input type="text" class="form-control" id="tipo_documento"
                                    value="{{ $usuario->user->tipo_documento }}" name="id" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col-12 col-sm-4 mb-3">
                                <label for="id" class="form-label">Documento</label>
                                <input type="text" class="form-control" id="id" value="{{ $usuario->user->documento }}"
                                    name="id" readonly>
                            </div>
                            <div class=" col-12 col-sm-4 mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" value="{{ $usuario->user->name }}"
                                    name="nombre" readonly>
                            </div>
                            <div class=" col-12 col-sm-4 mb-3">
                                <label for="nombre" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="nombre"
                                    value="{{ $usuario->user->apellido }}" name="nombre" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-12 col-sm-4 mb-3">
                                <label class="form-label" for="usuario">Usuario</label>
                                <input type="text" class="form-control" id="usuario" name="usuario"
                                    value="{{ $usuario->user->username }}" readonly>
                            </div>
                            <div class=" col-12 col-sm-4 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ $usuario->user->email }}" readonly>
                            </div>

                            <div class=" col-12 col-sm-4 mb-3">
                                <label class="form-label" for="rol">Rol</label>
                                <input type="text" class="form-control" id="rol" name="rol"
                                    value="{{ $usuario->permiso->rol }}" readonly>
                            </div>
                        </div>
                        <a href="/usuarios" class="btn btn-success btn-block fw-bold" id="atras">Atras</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@endsection
