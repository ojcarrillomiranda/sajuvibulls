@extends('layouts.base')
@section('title', 'Informe historias clinicas')
@section('content')
@section('content-2')

<div class="container w-75">
    <div class="card border-secondary mt-5">
        <div class="card-header  bg-secondary">
            <h3 class="text-center text-white h5">Fecha de ingreso</h3>
        </div>
      
         <form action="{{ route('informepdf') }}" method="post"  target="_blank">
             @csrf
             <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <input type="datetime-local" class="form-control border-secondary" name="fechai">
                    </div>
                    <div class="col-6">
                        <input type="datetime-local" class="form-control border-secondary" name="fechaf">
                    </div>
                </div>
            </div>
             <div class="card-footer bg-secondary">
                 <button type="submit" class="btn btn-info btn-block fw-bold mr-auto">Exportar a PDF</button>
             </div>
            </form>
        </div>
        <div class="card border-secondary mt-5 col">
            <div class="card-header  bg-secondary">
                <h3 class="text-center text-white h5">Tipo de consulta</h3>
            </div>
            
            <form action="{{ route('tipoatencionpdf') }}" method="post"  target="_blank">
                @csrf
                <div class="card-body">
                    <label for="tipo_consulta" class="form-label fw-bold">Tipo de consulta</label>
                  <select name="tipo_consulta" id="tipo_consulta" class="form-select border-secondary">
                      <option value="#">Ingrese filtro</option>
                      <option value="1">Primera vez</option>
                      <option value="2">Urgencias</option>
                      <option value="3">Control</option>
                  </select>
               </div>
                <div class="card-footer bg-secondary">
                    <button type="submit" class="btn btn-info fw-bold btn-block">Exportar a PDF</button>
                </div>
               </form>
            </div>
        </div>
    </div>
@endsection
@endsection


