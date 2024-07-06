<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid justify-content-center">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <a class="navbar-brand" href="{{ route('home-page') }}">
                <div class="logo-navbar">
                    <span class="u-logo">Account</span>
                    <span class="camp-logo">Camp</span>
                </div>
            </a>
            <ul class="navbar-nav">
                <li class="nav-item item-link mx-2">
                    <a class="nav-link" href="#features">Cursos</a>
                </li>
                <li class="nav-item item-link mx-2">
                    <a class="nav-link" href="#pricing">Rutas</a>
                </li>
                <li class="nav-item item-link mx-2">
                    <a class="nav-link" href="#contact">Practica</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="btn btn-ucamp" href="{{ route('login') }}">Iniciar sesión</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="btn btn-ucamp-border" href="{{ route('sign-up') }}">Crear cuenta</a>
                </li>
            </ul>
        </div>
    </div>
</nav>