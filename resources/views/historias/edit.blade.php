@extends('layouts.base')
@section('title', 'Modificar historia clinica')
@section('content')
@section('content-2')

    <div class="paciente_create">
        <div class="card border-success">
            <div class="card-body">
                <h2 class="bg-success text-center">MODIFICAR DATOS</h2>

                <form class="row" action="/historias/{{ $historia->id }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="col">
                        <label for="paciente" class="form-label">Paciente</label>
                        <select name="paciente_id" id="paciente" class="form-select rounded-pill border-success" disabled>

                            @foreach ($pacientes as $paciente)
                                <option value="{{ $paciente->id }}" @if ($paciente->id == $historia->paciente_id) selected @endif>{{ $paciente->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="representante" class="form-label">Dueño</label>
                        <select name="representante_documento" id="representante"
                            class="form-select rounded-pill border-success" disabled>

                            @foreach ($personas as $persona)
                                <option value="{{ $persona->documento }}" @if ($persona->documento == $historia->representante_documento) selected @endif>{{ $persona->primer_nombre }}
                                    {{ $persona->segundo_nombre }} {{ $persona->primer_apellido }}
                                    {{ $persona->segundo_apellido }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row mt-5">

                        <div class="col">
                            <label for="" class="mr-5">Tipo de consulta</label>

                            <div class="form-check form-check-inline ">
                                <input class="form-check-input border-success" type="radio" name="tipo_consulta_id"
                                    id="primera_vez" value="1" @if ($historia->tipo_consulta_id == 1) checked @endif>
                                <label class="form-check-label" for="primera_vez">
                                    Primera vez
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input border-success" type="radio" name="tipo_consulta_id"
                                    id="urgencias" value="2" @if ($historia->tipo_consulta_id == 2) checked @endif>
                                <label class="form-check-label" for="urgencias">
                                    Urgencias
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border-success" type="radio" name="tipo_consulta_id"
                                    id="control" value="3" @if ($historia->tipo_consulta_id == 3) checked @endif>
                                <label class="form-check-label" for="control">
                                    Control
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col">
                            <div class="form-floating">
                                <textarea class="form-control border-success" name="observaciones" id="observaciones"
                                    style="max-height: 100px;min-height:100px;min-width:400px;max-width:500px">{{ $historia->observaciones }}</textarea>
                                <label for="observaciones">Observaciones</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <textarea class="form-control border-success" name="medicamentos" id="medicamentos"
                                    style="max-height: 100px;min-height:100px;min-width:400px;max-width:500px">{{ $historia->medicamentos }}</textarea>
                                <label for="medicamentos">Medicamentos</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-6">
                            <label for="medico" class="form-label">Medico</label>
                            <select name="medico_id" id="medico" class="form-select rounded-pill  border-success">

                                @foreach ($medicos as $medico)
                                    <option value="{{ $medico->user->id }}" @if ($medico->user->id == $historia->medico_id) selected @endif>{{ $medico->user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="estado" class="form-label">Estado</label>
                            <select name="estado" id="estado" class="form-select border-success rounded-pill">
                                <option value="">Estado...</option>
                                <option value="alta" @if ($historia->estado == 'alta') selected @endif>Dado de alta</option>
                                <option value="observacion" @if ($historia->estado == 'observacion') selected @endif>Observacion</option>
                                <option value="hospitalizado" @if ($historia->estado == 'hospitalizado') selected @endif>
                                    Hospitalizado</option>

                            </select>
                        </div>
                    </div>

                    <div class="mt-5">
                        <button class="btn btn-primary" type="submit"><span class="fas fa-user-plus"></span>
                            Actualizar</button>
                        <a href="/historias" class="btn btn-success"><span class="fas fa-eye fs-5"></span> Ver historias</a>

                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@endsection
