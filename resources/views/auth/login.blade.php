@extends('layouts.login', ['class' => 'off-canvas-sidebar', 'activePage' => '', 'title' => __('Bienvenidos a
Sajuvibulls')])

@section('content')
    <div class="container" style="height: auto;">
        <div class="row align-items-center">

            <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                <form class="form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="card card-login card-hidden mb-3" style="width:500px;">
                        <div class="card-header card-header-success text-center">
                            <h4 class="card-title fw-bold"><strong>{{ __('Sajuvibulls') }}</strong></h4>
                            <div class="social-line">
                                <a href="#" class="btn btn-just-icon btn-link btn-white">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                                <a href="#" class="btn btn-just-icon btn-link btn-white">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#" class="btn btn-just-icon btn-link btn-white">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">face</i>
                                        </span>
                                    </div>
                                    <input type="text" name="username" class="form-control"
                                        placeholder="{{ __('Usuario') }}" value="{{ old('username') }}" required
                                        autofocus>
                                </div>
                                @if ($errors->has('username'))
                                    <div id="username-error" class="error text-danger pl-3" for="username"
                                        style="display: block;">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                    </div>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="{{ __('Contraseña...') }}"
                                        value="{{ !$errors->has('password') ? '' : '' }}" required>
                                </div>
                                @if ($errors->has('password'))
                                    <div id="password-error" class="error text-danger pl-3" for="password"
                                        style="display: block;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-check mr-auto ml-3 mt-3">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="remember"
                                        {{ old('remember') ? 'checked' : '' }}> {{ __('Recuerdame') }}
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="card-footer justify-content-center">
                            <button id="iniciar" type="submit"
                                class="btn btn-success btn-link btn-lg">{{ __('Iniciar sesion') }}</button>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-6">
                        @if (Route::has('password.request'))
                            <a id="olvido" href="{{ route('password.request') }}" class="text-light">
                                <small>{{ __('Olvido su contraseña?') }}</small>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
