@extends('layouts.login', ['class' => 'off-canvas-sidebar', 'activePage' => 'email', 'title' => __('Recuperar contraseña')])
@section('title','Recuperar contraseña')
@section('content')
<div class="container mt-5" style="height: auto;width:50%;">
  <div class="row align-items-center">
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="form" method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="card card-login card-hidden mb-3" style="width:500px;">
          <div class="card-header card-header-success text-center">
            <h4 class="card-title"><strong>{{ __('Recuperar contraseña') }}</strong></h4>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="row">
                <div class="col-sm-12">
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>{{ session('status') }}</span>
                  </div>
                </div>
              </div>
            @endif
            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                </div>
                <input type="email" name="email" class="form-control" placeholder="{{ __('Correo electronico...') }}" value="{{ old('email') }}" required autofocus>
              </div>
              @if ($errors->has('email'))
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                  <strong>{{ $errors->first('email') }}</strong>
                </div>
              @endif
            </div>
          </div>
          <div class="card-footer justify-content-center">
            <button id="correo" type="submit" class="btn btn-success btn-link btn-lg">{{ __('Enviar correo') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

