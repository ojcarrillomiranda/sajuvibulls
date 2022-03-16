@extends('layouts.base')
@section('title', 'Crear usuarios')
@section('content')
@section('content-2')
<div class="card cardprincipal mt-3 border-success " style="width: 70%">
    <h2 class="text-center bg-success">NUEVO USUARIO</h2>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show w-100  fst-italic" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card border-success">
            <div class="card-body">
                <form action="/usuarios" method="post" enctype="multipart/form-data" class="p-3">
                    @csrf
                    <div class="row">
                        <div class=" col-sm-12 col-md-6 mb-3">
                            <label for="tipoDocumento" class="form-label">Tipo documento</label>
                            <select id="tipoDocumento" class="form-select border-success" name="tipoDocumento">
                                <option>Seleccione tipo de documento...</option>
                                <option value="C.C">C.C</option>
                                <option value="T.I">T.I</option>
                                <option value="C.E">C.E</option>
                                <option value="R.C">R.C</option>
                            </select>
                        </div>
                        <div class=" col-sm-12 col-md-6 mb-3">
                            <label for="documento" class="form-label">Documento</label>
                            <input type="text" class="form-control" id="documento" placeholder="Ingrese su documento..."
                                name="documento">
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-sm-12 col-md-6 mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre..."
                                name="nombre">
                        </div>
                        <div class=" col-sm-12 col-md-6 mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellido" placeholder="Ingrese su apellido..."
                                name="apellido">
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-sm-12 col-md-6 mb-3">
                            <label class="form-label" for="usuario">Usuario</label>
                            <input type="text" class="form-control" id="usuario" name="usuario"
                                placeholder="Ingrese un usuario...">
                        </div>

                        <div class=" col-sm-12 col-md-6 mb-3">
                            <label class="form-label" for="clave">Contraseña</label>
                            <input type="password" class="form-control" id="clave" name="clave"
                                placeholder="Contraseña...">
                            <span>
                                <i class="fas fa-eye" id="ojo" aria-hidden="true" onclick="ojo()"></i>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class=" col-sm-12 col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Ingrese mail...">
                        </div>

                        <div class=" col-sm-12 col-md-6 mb-3">
                            <label class="form-label" for="rol">Rol</label>
                            <select name="rol" id="rol" class="form-select border-success">
                                <option value="">Seleccione un rol...</option>
                                @foreach($roles as $rol)
                                    <option value="{{ $rol->id }}">{{ $rol->rol }}</option>
                                @endforeach
                                <select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary fw-bold"> <span class="fas fa-user-plus"></span> Crear
                        Usuario</button>
                    <a class="btn btn-success fw-bold" href="/usuarios"> <span class="fas fa-eye fs-5"></span> Ver
                        usuarios</a>
                    <button type="reset" class="btn btn-danger fw-bold"> <span class="fas fa-broom"></span>
                        limpiar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@endsection

@section('js')
@if(session('usuario') == 'ok')
    <script>
        Swal.fire({
            title: '¡Excelente!',
            text: "Usuario creado con exito",
            icon: 'success'
        });
    </script>
@endif
@endsection

