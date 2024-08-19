<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container justify-content-center">
        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" href="{{ route('home-page') }}">
            <div class="logo-navbar">
                <span class="u-logo">Account</span>
                <span class="camp-logo">Camp</span>
            </div>
        </a>

        <div class="collapse navbar-collapse order-3 justify-content-end" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item item-link mx-2">
                    <a class="nav-link" href="#cursos">Cursos</a>
                </li>
                <li class="nav-item item-link mx-2">
                    <a class="nav-link" href="#para-estudiantes">Para estudiantes</a>
                </li>
                <li class="nav-item item-link mx-2">
                    <a class="nav-link" href="#para-profesores">Para profesores</a>
                </li>
                <li class="nav-item item-link mx-2">
                    <a class="nav-link" href="{{ route('precios-home') }}">Precios</a>
                </li>
                <li class="nav-item item-btn mx-2">
                    <a class="btn btn-ucamp" href="{{ route('login') }}">Iniciar sesión</a>
                </li>
                <li class="nav-item item-btn mx-2">
                    <a class="btn btn-ucamp-border" href="{{ route('sign-up') }}">Crear cuenta</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
