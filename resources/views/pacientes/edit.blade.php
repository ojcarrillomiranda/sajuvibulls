@extends('layouts.base')
@section('title', 'Editar paciente')
@section('content')
@section('content-2')

    <div class="container-fluid paciente_create">
        <div class="card">
            <div class="card-body">
                <h2 class="bg-success text-center">PACIENTE...</h2>
                <form class="row" action="/pacientes/{{ $paciente->id }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="col">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $paciente->nombre }}">
                    </div>
                    <div class="col">
                        <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                        <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento"
                            value="{{ $paciente->fecha_nacimiento }}">
                    </div>
                    <div class="col">
                        <label for="especie" class="form-label">Especie</label>
                        <select name="especie" id="especie" class="form-select">
                            <option value="">Seleccione una especie...</option>
                            @foreach ($especies as $especie)
                                <option value="{{ $especie->id }}" @if ($especie->id == $paciente->especie_id) selected @endif>{{ $especie->especie }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="sexo" class="form-label">Sexo</label>
                        <select name="sexo" id="sexo" class="form-select">
                            <option value="">Seleccione un sexo...</option>
                            @foreach ($sexos as $sexo)
                                <option value="{{ $sexo->id }}" @if ($sexo->id == $paciente->sexo_id) selected @endif>
                                    {{ $sexo->sexo }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row mt-5">
                        <div class="col">
                            <label for="raza" class="form-label">Raza</label>
                            <select name="raza" id="raza" class="form-select">
                                <option value="">seleccione una raza...</option>
                                @foreach ($razas as $raza)
                                    <option value="{{ $raza->id }}" @if ($raza->id == $paciente->raza_id) selected @endif>
                                        {{ $raza->raza }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="peso" class="form-label">Peso</label>
                            <input type="number" class="form-control" name="peso" id="peso"
                                value="{{ $paciente->peso }}">
                        </div>
                        <div class="row mt-5">
                            <div class="col">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" class="form-control-file" name="foto" id="foto">
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3 border-success dueño">
                        <div class="card-body">
                            <h2 class="bg-success text-center">DUEÑO O REPRESENTANTE</h2>
                            <div class="row">
                                <div class="col">
                                    <label for="documento" class="form-label">Documento</label>
                                    <input type="text" class="form-control" name="documento" id="documento"
                                        value="{{ $paciente->representante_documento }}" readonly>
                                </div>
                                <div class="col">
                                    <label for="primer_nombre" class="form-label">Primer nombre</label>
                                    <input type="text" class="form-control" name="primer_nombre" id="primer_nombre"
                                        value="{{ $paciente->representante->primer_nombre }}">
                                </div>
                                <div class="col">
                                    <label for="segundo_nombre" class="form-label">Segundo nombre</label>
                                    <input type="text" class="form-control" name="segundo_nombre" id="segundo_nombre"
                                        value="{{ $paciente->representante->segundo_nombre }}">
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col">
                                    <label for="primer_apellido" class="form-label">Primer apellido</label>
                                    <input type="text" class="form-control" name="primer_apellido" id="primer_apellido"
                                        value="{{ $paciente->representante->primer_apellido }}">
                                </div>
                                <div class="col">
                                    <label for="segundo_apellido" class="form-label">Segundo apellido</label>
                                    <input type="text" class="form-control" name="segundo_apellido" id="segundo_apellido"
                                        value="{{ $paciente->representante->segundo_apellido }}">
                                </div>
                                <div class="col">
                                    <label for="telefono" class="form-label">Telefono</label>
                                    <input type="text" class="form-control" name="telefono" id="telefono"
                                        value="{{ $paciente->representante->telefono }}">
                                </div>
                                <div class="row mt-5">
                                    <div class="col">
                                        <label for="direccion" class="form-label">Direccion</label>
                                        <input type="text" class="form-control" name="direccion" id="direccion"
                                            value="{{ $paciente->representante->direccion }}">
                                    </div>
                                    <div class="col">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{ $paciente->representante->email }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-primary" type="submit"><span><i class="fas fa-user-edit"></i></span>
                            Actualizar</button>
                        <a href="/pacientes/{{ $paciente->id }}" class="btn btn-success "><i class="fas fa-arrow-alt-circle-left"></i> Atras</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@endsection
