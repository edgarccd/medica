<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="route('dashboard')">Inicio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Pacientes
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Registrar</a></li>
                        <li><a class="dropdown-item" href="#">Mostrar</a></li>

                       
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Medicos
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('medicos.create') }}">Registrar</a></li>
                        <li><a class="dropdown-item" href="{{ route('medicos.index') }}">Mostrar</a></li>
                        <li><a class="dropdown-item" href="{{ route('medicos.search') }}">Buscar</a></li>
                       
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Consultar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Camas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Visitas</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                this.closest('form').submit();">
                            {{ __('Salir') }}
                        </x-nav-link>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
