<nav class="navbar navbar-light bg-success">
    <a class="navbar-brand h1 text-secondary" href="/">Sajuvibulls
        <img src="https://cdn.pixabay.com/photo/2018/11/08/22/10/animals-3803422_960_720.png" alt="" width="60"
            height="60" class="ml-2">
    </a>

    </div>
    <a href="#" class="nav-link disabled text-secondary fw-bold ml-auto">{{ Auth::user()->name }}
        {{ Auth::user()->apellido }}</a>
    @foreach ($permisos as $permiso)
        @if ($permiso->user_id == Auth::user()->id)
            <a href="#" class="nav-link disabled text-secondary fw-bold">{{ $permiso->permiso->rol }}</a>
        @endif
    @endforeach
    <form action="{{ route('logout') }}" class=" cerrar form-inline my-2 my-lg-0 mr-3" method="post">
        @csrf
        <button type="submit"class="btn btn-outline-danger border-0 my-2 my-sm-0"><i
                class="fab fa-expeditedssl fs-2"></i></button>
    </form>

</nav>
<div class="d-flex">
    <div class="d-none d-sm-block accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <ion-icon name="people-circle-sharp" class="h2 mr-2 mt-2"></ion-icon> Usuarios
                    @if ($usuarioss > 0)
                        <span class="badge bg-danger ml-auto">{{ $usuarioss }}</span>
                    @endif
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse open" aria-labelledby="flush-headingOne"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body accordion-collapse">
                    <a href="/usuarios/create">Crear usuarios</a>
                    <hr>
                    <a href="/usuarios">Ver usuarios</a>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    <ion-icon name="fitness-sharp" class="h2 mr-2 mt-2"></ion-icon> Pacientes
                    @if ($pacientess > 0)
                        <span class="badge bg-danger ml-auto">{{ $pacientess }}</span>
                    @endif
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <a href="/pacientes/create">Crear Pacientes</a>
                    <hr>
                    <a href="/pacientes">Ver Pacientes</a>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    <ion-icon name="documents" class="h2 mr-2 mt-2"></ion-icon> Historias clinicas
                    @if ($historiass > 0)
                        <span class="badge bg-danger ml-auto">{{ $historiass }}</span>
                    @endif
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <a href="/historias/create">Agregar historia clinica</a>
                    <hr>
                    <a href="/historias">Ver historia clinica</a>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                    <ion-icon name="folder-open" class="h2 mr-2 mt-2"></ion-icon> Hospitalizaciones
                </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <a href="/hospitalizaciones">Pacientes hospitalizados</a>
                    <hr>
                    <a href="/hospitalizaciones/create">Seguimientos</a>

                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                    <ion-icon name="document-text" class="h2 mr-2 mt-2"></ion-icon> Informes
                </button>
            </h2>
            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <a href="/informes">Historias clinicas</a>
                    <hr>

                </div>
            </div>
        </div>
    </div>
    @yield('content-2')
</div>

