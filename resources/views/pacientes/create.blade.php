@extends('layouts.base')
@section('title', 'Crear paciente')
@section('content')
@section('content-2')

    <div class="container-fluid paciente_create">
        <div class="card border-success">
            <div class="card-body">
                <h2 class="bg-success text-center">PACIENTE</h2>
                @if ($errors->any())
                    <div class="alert alert-danger  fst-italic">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="row" action="/pacientes" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control border-success" name="nombre" id="nombre" placeholder="Nombre paciente..." aria-label="First name" autofocus>
                    </div>
                    <div class="col">
                        <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                        <input type="date" class="form-control border-success" name="fecha_nacimiento" id="fecha_nacimiento">
                    </div>
                    <div class="col">
                        <label for="especie" class="form-label">Especie</label>
                       <select name="especie" id="especie" class="form-select border-success">
                           <option value="">Seleccione una especie...</option>
                           @foreach($especies as $especie)
                                <option value="{{ $especie->id }}">{{ $especie->especie }}</option>
                           @endforeach
                       </select>
                    </div>
                    <div class="col">
                        <label for="sexo" class="form-label">Sexo</label>
                        <select name="sexo" id="sexo" class="form-select border-success">
                            <option value="">Seleccione un sexo...</option>
                            @foreach($sexos as $sexo)
                                    <option value="{{ $sexo->id }}">{{ $sexo->sexo }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row mt-5">
                        <div class="col">
                            <label for="raza" class="form-label">Raza</label>
                            <select name="raza" id="raza" class="form-select border-success">
                                <option value="">seleccione una raza...</option>
                                @foreach($razas as $raza)
                                    <option value="{{ $raza->id }}">{{ $raza->raza }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="peso" class="form-label">Peso</label>
                           <input type="number" class="form-control border-success" placeholder="Peso en KG" name="peso" id="peso">
                        </div>
                       <div class="row mt-5">
                            <div class="col">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" class="form-control-file border-success" name="foto" id="foto">
                            </div>
                       </div>
                    </div>
                    <div class="card mt-3 border-success dueño">
                        <div class="card-body">
                            <h2 class="bg-success text-center">REPRESENTANTE</h2>
                            <div class="row">
                                <div class="col">
                                   <label for="documento" class="form-label">Documento</label>
                                   <input type="text" class="form-control border-success" name="documento" id="documento" placeholder="Ingrese numero de identificacion">
                                </div>
                                <div class="col">
                                   <label for="primer_nombre" class="form-label">Primer nombre</label>
                                   <input type="text" class="form-control border-success" name="primer_nombre" id="primer_nombre" placeholder="Primer nombre...">
                                </div>
                                <div class="col">
                                   <label for="segundo_nombre" class="form-label">Segundo nombre</label>
                                   <input type="text" class="form-control border-success" name="segundo_nombre" id="segundo_nombre" placeholder="Segundo nombre...">
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col">
                                   <label for="primer_apellido" class="form-label">Primer apellido</label>
                                   <input type="text" class="form-control border-success" name="primer_apellido" id="primer_apellido" placeholder="Primer apellido...">
                                </div>
                                <div class="col">
                                   <label for="segundo_apellido" class="form-label">Segundo apellido</label>
                                   <input type="text" class="form-control border-success" name="segundo_apellido" id="segundo_apellido" placeholder="Segundo apellido...">
                                </div>
                                <div class="col">
                                   <label for="telefono" class="form-label">Telefono</label>
                                   <input type="text" class="form-control border-success" name="telefono" id="telefono" placeholder="Telefono...">
                                </div>
                               <div class="row mt-5">
                                    <div class="col">
                                        <label for="direccion" class="form-label">Direccion</label>
                                        <input type="text" class="form-control border-success" name="direccion" id="direccion" placeholder="Ingrese su direccion...">
                                   </div>
                                    <div class="col">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control border-success" name="email" id="email" placeholder="Ingrese su email...">
                                   </div>
                               </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button class="btn btn-primary guardar" type="submit"><span class="fas fa-user-plus"></span> Registrar</button>
                        <a href="/pacientes" class="btn btn-success"><span class="fas fa-eye fs-5"></span> Ver pacientes</a>
                        <button class="btn btn-danger" type="reset"><span class="fas fa-broom"></span> LImpiar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
@endsection

@section('js')
@if(session('guardar') == 'bien')
<script>
Swal.fire({
    title: '¡Excelente!',
    text: "Paciente creado con exito",
    icon: 'success'
});

</script>
@endif
@endsection
