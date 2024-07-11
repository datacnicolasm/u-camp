@include('components.header')

<body class="page-home-camp">

    @include('home.home-navbar')

    <!-- Seccion Inicial "Crear cuenta" -->
    <section id="home-section-1" class="section-home">
        <div class="container content">
            <div class="row">
                <div class="col-8 cont-flex px-3">
                    <div class="main-cont-flex">
                        <h1 class="flex-custom font-weight-bold">Aprende Contabilidad y Finanzas</h1>
                        <div class="text-home-1 flex-custom mt-3">
                            <p class="m-0">Avanza en tu carrera aprendiendo contabilidad, impuestos, NIIF, auditoría y
                                más, con espacios interactivos dentro de la plataforma, sin necesidad de descargar o
                                acceder a otras páginas.</p>
                        </div>
                        <div class="btn-home-1 flex-custom mt-3">
                            <a href="{{ route('sign-up') }}" class="btn btn-home-1 px-4 py-2">Empieza a aprender
                                gratis</a>
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

    <!-- Seccion "" -->
    <section id="home-section-2" class="section-home">
        <div class="container content">
            <div class="row">
                <div class="col-12 main-cont-flex">
                    <h1 class="flex-100 mt-0 mb-4 text-white font-weight-bold">¿Qué es <span
                            class="text-three-camp">Account</span>Camp?</h1>
                    <div class="text-home-2 my-2">
                        <p class="m-0 text-white text-large">
                            Estudia contabilidad, impuestos y finanzas con lecciones detalladas, cubriendo temas
                            especializados a tu ritmo, en la primer plataforma integrada para ejercicios prácticos y
                            contenido de
                            calidad.
                        </p>
                    </div>
                    <div class="btn-home-2 mt-4 flex-100">
                        <a href="{{ route('sign-up') }}" class="btn px-4 py-2">Empieza a aprender gratis</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seccion "" -->
    <section id="home-section-3" class="section-home">
        <div class="container content">
            <div class="row">

                <div class="col-12 mb-5">
                    <h1 class="text-center font-weight-bold text-white">Una nueva Experiencia de <span
                            class="text-three-camp">Aprendizaje Interactivo</span></h1>
                </div>

                <!-- -->
                <div class="col-6 mb-5">
                    <img src="{{ asset('img/screenshot.jpg') }}" class="img-fluid" alt="Entorno de aprendizaje">
                </div>

                <div class="col-6 cont-flex px-3 mb-5">
                    <div class="main-cont-flex">
                        <div class="text-home-3 flex-custom mt-3">
                            <h2 class="m-0 text-white font-weight-bold"><span class="text-four-camp">Aprende con videos
                                    cortos y ejercicios practicos</span> - Todo en una sola plataforma</h2>
                        </div>
                        <div class="flex-custom mt-3">
                            <a href="{{ route('sign-up') }}" class="btn btn-2-ucamp-border px-4 py-2">Empieza a aprender
                                gratis</a>
                        </div>
                    </div>
                </div>

                <!-- -->
                <div class="col-6 mb-5">
                    <img src="{{ asset('img/screenshot.jpg') }}" class="img-fluid" alt="Entorno de aprendizaje">
                </div>

                <div class="col-6 cont-flex px-3 mb-5">
                    <div class="main-cont-flex">
                        <div class="text-home-3 flex-custom mt-3">
                            <h2 class="m-0 font-weight-bold text-five-camp">Aprende declarando los Impuestos Nacionales
                                en nuestra plataforma</h2>
                        </div>
                    </div>
                </div>

                <!-- -->
                <div class="col-6 mb-5">
                    <img src="{{ asset('img/screenshot.jpg') }}" class="img-fluid" alt="Entorno de aprendizaje">
                </div>

                <div class="col-6 cont-flex px-3 mb-5">
                    <div class="main-cont-flex">
                        <div class="text-home-3 flex-custom mt-3">
                            <h2 class="m-0 text-white font-weight-bold"><span class="text-two-camp">Ejercicios practicos
                                    de causaciones</span> - Sin descargar software contable</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="title-home-section-4">
        <div class="container content">
            <div class="row">
                <div class="col-12 mb-4">
                    <h1 class="font-weight-bold text-white">
                        <span class="text-three-camp">Rutas de aprendizaje</span>
                        diseñadas por expertos
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Seccion "" -->
    <section id="home-section-4">
        <div class="container content">
            <div class="row">
                <div class="col-12 mb-3">
                    <h2 class="font-weight-bold text-white">
                        Conviertete en un experto
                    </h2>
                </div>
                @foreach ($rutas as $ruta)
                    <div class="col-4">
                        <a href="{{ route('view-ruta-profesional', ['ruta' => $ruta->id]) }}"
                            class="card card-outline card-outline-ibero card-primary mb-4 item-ruta">
                            <div class="card-body text-center">
                                <h5 class="m-0">{{ $ruta->title }}</h5>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </section>

    <!-- Footer -->
    @include('home.home-footer')

    @include('components.footer')
