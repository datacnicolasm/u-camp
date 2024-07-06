@include('components.header')

<body class="page-home-camp">

    @include('home.home-navbar')

    <!-- Seccion Inicial "Crear cuenta" -->
    <section id="home-section-1" class="section-home">
        <div class="container content">
            <div class="row">
                <div class="col-8 cont-flex px-3">
                    <div class="main-cont-flex">
                        <h1 class="flex-custom">Aprende Contabilidad y Finanzas</h1>
                        <div class="text-home-1 flex-custom mt-3">
                            <p class="m-0">Avanza en tu carrera aprendiendo contabilidad, impuestos, NIIF, auditoría y más, con espacios interactivos dentro de la plataforma, sin necesidad de descargar o acceder a otras páginas.</p>
                        </div>
                        <div class="btn-home-1 flex-custom mt-3">
                            <a href="{{ route('sign-up') }}" class="btn btn-home-1 px-4 py-2">Empieza a aprender gratis</a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <!-- -->
                    @include('home.home-signup')
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="section">
        <div class="container">
            <h2 class="text-center">Características</h2>
            <p>Descripción de las características de la plataforma.</p>
        </div>
    </section>

    <section id="pricing" class="section">
        <div class="container">
            <h2 class="text-center">Precios</h2>
            <p>Detalles sobre los precios de suscripción.</p>
        </div>
    </section>

    <section id="contact" class="section">
        <div class="container">
            <h2 class="text-center">Contacto</h2>
            <p>Información de contacto y formulario.</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer bg-light text-center">
        <div class="container">
            <p class="mb-0">&copy; 2023 EduPlatform. Todos los derechos reservados.</p>
        </div>
    </footer>

    @include('components.footer')
