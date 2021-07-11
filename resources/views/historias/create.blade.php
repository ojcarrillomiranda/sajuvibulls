@extends('layouts.base')
@section('title', 'Crear historia clinica')
@section('css')
<link rel="stylesheet" href="{{ asset('jquery-ui-1.12.1/jquery-ui.min.css') }}">
@endsection
@section('content')
@section('content-2')

    <div class="container paciente_create">
        <div class="card border-success">
            <div class="card-body">
                <h2 class="bg-success text-center">HISTORIAS CLINICAS</h2>
                @if ($errors->any())
                    <div class="alert alert-danger w-100  fst-italic">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="row" action="/historias" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="id" name="paciente_id">
                    <input type="hidden" id="documento" name="representante_documento">
                    <input type="hidden" id="especie" name="especie_id">
                    <input type="hidden" id="raza" name="raza_id">
                    <div class="col">
                         <label for="paciente" class="form-label">Paciente</label>
                         <input type="search" name="" id="paciente" class="form-control border-success" autocomplete="off" autofocus>
                    </div>
                    <div class="col">
                        <label for="representante" class="form-label">Propietario</label>
                        <input type="text" name="" id="representante" class="form-control border-success" readonly>
                    </div>
                    <div class="col">
                        <label for="contacto_representante" class="form-label">Contacto propietario</label>
                        <input type="text" name="contacto_representante" id="contacto_representante" class="form-control border-success" readonly>
                    </div>
                    <div class="row mt-5">
                        <div class="col">
                            <label for="especies" class="form-label">Especie</label>
                            <input type="text" name="" id="especies" class="form-control border-success" readonly>
                        </div>
                        <div class="col">
                            <label for="razas" class="form-label">Raza</label>
                            <input type="text" name="" id="razas" class="form-control border-success" readonly>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col">
                            <label for="" class="mr-5">Tipo de consulta</label>

                            <div class="form-check form-check-inline ">
                            <input class="form-check-input border-success" type="radio" name="tipo_consulta_id" id="primera_vez" value="1">
                            <label class="form-check-label" for="primera_vez">
                                Primera vez
                            </div>

                            <div class="form-check form-check-inline">
                            <input class="form-check-input border-success" type="radio" name="tipo_consulta_id" id="urgencias" value="2">
                            <label class="form-check-label" for="urgencias">
                               Urgencias
                            </label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input border-success" type="radio" name="tipo_consulta_id" id="control" value="3">
                            <label class="form-check-label" for="control">
                                Control
                            </label>
                            </div>

                        </div>
                    </div>
                   <div class="row mt-5">
                         <div class="col">
                            <div class="form-floating">
                                <textarea class="form-control border-success" name="observaciones" id="observaciones" style="max-height: 100px;min-height:100px" ></textarea>
                                <label for="observaciones">Observaciones</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <textarea class="form-control border-success" name="medicamentos" id="medicamentos" style="max-height: 100px;min-height:100px"></textarea>
                                <label for="medicamentos">Medicamentos</label>
                            </div>
                        </div>
                   </div>
                    <div class="row mt-5">
                        <div class="col-6">
                        <label for="medico" class="form-label">Medico</label>
                         <select name="medico_id" id="medico" class="form-select border-success">
                             <option value="">Medico...</option>
                             @foreach($medicos as $medico)
                                 <option value="{{ $medico->user->id }}">{{ $medico->user->name }} {{ $medico->user->apellido }}</option>
                             @endforeach
                         </select>
                    </div>
                        <div class="col-6">
                            <label for="estado" class="form-label">Estado</label>
                            <select name="estado" id="estado" class="form-select border-success">
                                <option value="">Estado...</option>
                                <option value="alta">Dado de alta</option>
                                <option value="observacion">Observacion</option>
                                <option value="hospitalizado">Hospitalizado</option>

                            </select>
                        </div>
                    </div>

                    <div class="mt-5 mb-2">
                        <button class="btn btn-primary guardar" type="submit"><span class="fas fa-user-plus"></span> Registrar</button>
                        <a href="/historias" class="btn btn-success"><span class="fas fa-eye fs-5"></span> Ver historias</a>
                        <button class="btn btn-danger" type="reset"><span class="fas fa-broom"></span> LImpiar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
@endsection

@section('js')

@if(session('guardar') == 'ok')
<script>
    Swal.fire({
        title: '¡Excelente!',
        text: "La historia fue guardada con exito",
        icon: 'success'
    });

</script>
@endif

<script src="{{ asset('jquery-ui-1.12.1/jquery-ui.min.js') }}"></script>

<script>
$("#paciente").autocomplete({
    autoFocus:true,
   source: "{{ route('buscarPaciente') }}",
    select: function(event, ui){
       $("#id").val(ui.item.id);
       $("#documento").val(ui.item.documento);
       $("#especie").val(ui.item.especie);
       $("#raza").val(ui.item.raza);
       $("#especies").val(ui.item.especies);
       $("#razas").val(ui.item.razas);
       $("#representante").val(ui.item.representante);
       $("#contacto_representante").val(ui.item.contacto);

   }
});

</script>

@endsection
