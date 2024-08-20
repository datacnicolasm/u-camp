@include('components.header')

<body class="page-home-camp">

    @include('home.home-navbar')

    <!-- Seccion Inicial "Crear cuenta" -->
    <section id="home-section-1" class="section-home">
        <div class="container content">
            <div class="row">
                <div class="col-sm-12 col-md-8 cont-flex p-sm mb-4">
                    <div class="main-cont-flex">
                        <h1 class="flex-custom font-weight-bold text-sm-center">Aprende Contabilidad y Finanzas</h1>
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
                <div class="col-sm-12 col-md-4 p-sm">
                    <!-- -->
                    @include('home.home-signup')
                </div>
            </div>
        </div>
    </section>

    <!-- Seccion "¿Que es AccountCamp?" -->
    <section id="home-section-2" class="section-home">
        <div id="cursos" class="container content">
            <div class="row">
                <div class="col-12 main-cont-flex p-sm">
                    <h1 class="flex-100 mt-md-0 mb-md-4 text-white font-weight-bold">¿Qué es <span
                            class="text-three-camp">Account</span>Camp?</h1>
                    <div class="text-home-2 my-md-2">
                        <p class="m-0 text-white text-md-large">
                            AccountCamp es una plataforma especializada en contabilidad, impuestos y finanzas. Ofrecemos lecciones detalladas que cubren temas especializados a tu ritmo, en un entorno integrado con ejercicios prácticos y contenido de calidad.
                        </p>
                    </div>
                    <div class="btn-home-2 mt-4 flex-100">
                        <a href="{{ route('sign-up') }}" class="btn px-md-4 py-md-2">Empieza a aprender gratis</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seccion "Experiencia de aprendizaje" -->
    <section id="home-section-3" class="section-home">
        <div class="container content">
            <div class="row">

                <div class="col-12 mb-5 p-sm">
                    <h1 class="text-center font-weight-bold text-white">Una nueva Experiencia de <span class="text-three-camp">Aprendizaje Interactivo</span></h1>
                </div>

                <div class="col-sm-12 col-md-6 mb-5 p-sm">
                    <img src="{{ asset('img/screenshot_1.png') }}" class="img-fluid" alt="Entorno de aprendizaje">
                </div>

                <div class="col-sm-12 col-md-6 cont-flex px-3 mb-5 p-sm">
                    <div class="main-cont-flex">
                        <div class="text-home-3 flex-custom mt-md-3">
                            <h2 class="m-0 text-white text-sm-center font-weight-bold"><span class="text-four-camp">Aprende con videos
                                    cortos y ejercicios practicos</span> - Todo en una sola plataforma</h2>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 mb-5 p-sm">
                    <img src="{{ asset('img/screenshot_4.png') }}" class="img-fluid" alt="Entorno de aprendizaje">
                </div>

                <div class="col-sm-12 col-md-6 cont-flex px-3 mb-5 p-sm">
                    <div class="main-cont-flex">
                        <div class="text-home-3 flex-custom mt-md-3">
                            <h2 class="m-0 font-weight-bold text-five-camp text-sm-center">Adquiere experiencia práctica declarando impuestos nacionales en Colombia</h2>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 mb-5 p-sm">
                    <img src="{{ asset('img/screenshot_3.png') }}" class="img-fluid" alt="Entorno de aprendizaje">
                </div>

                <div class="col-sm-12 col-md-6 cont-flex px-3 mb-5 p-sm">
                    <div class="main-cont-flex">
                        <div class="text-home-3 flex-custom mt-md-3">
                            <h2 class="m-0 text-white font-weight-bold text-sm-center"><span class="text-two-camp">
                                Ejercicios practicos de causaciones</span> - Sin descargar software contable
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seccion "Para profesores" -->
    <section id="home-section-4" class="section-home">
        <div id="para-profesores" class="container content">
            <div class="row">
                <div class="col-sm-12 col-md-7 mb-4 cont-flex p-sm">
                    <div class="main-cont-flex">
                        <div class="flex-custom mt-3">
                            <p class="m-0 text-2-ucamp text-md-large text-sm-center">Para profesores</p>
                        </div>
                        <h1 class="flex-custom font-weight-bold text-three-camp text-sm-center">Un espacio interactivo para tus clases</h1>
                        <div class="flex-custom mt-md-3">
                            <p class="m-0 text-md-large text-justify text-sm-center">
                                Creado por y para profesores, AccountCamp es gratis para ti. Ofrecemos un ecosistema digital que facilita ejercicios prácticos, simplifica la calificación y organiza tus clases eficientemente.
                            </p>
                        </div>
                        <div class="flex-custom mt-4 btn-home-4">
                            <a href="{{ route('sign-up') }}" class="btn btn-2-ucamp px-4 py-2">Iniciar con AccountCamp</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-5 my-4 cont-flex p-sm">
                    <div class="main-cont-flex">
                        <img src="{{ asset('img/screenshot_2.png') }}" class="img-fluid" alt="Entorno de aprendizaje">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seccion "Para estudiantes" -->
    <section id="home-section-5" class="section-home">
        <div id="para-estudiantes" class="container content">
            <div class="row">
                <div class="col-sm-12 col-md-5 my-4 cont-flex p-sm">
                    <div class="main-cont-flex">
                        <img src="{{ asset('img/screenshot_5.png') }}" class="img-fluid" alt="Entorno de aprendizaje">
                    </div>
                </div>
                <div class="col-sm-12 col-md-7 mb-4 cont-flex p-sm">
                    <div class="main-cont-flex">
                        <div class="flex-custom mt-3">
                            <p class="m-0 text-2-ucamp text-md-large text-sm-center">Para estudiantes</p>
                        </div>
                        <h1 class="flex-custom font-weight-bold text-three-camp text-sm-center">Aprendizaje interactivo a tu propio ritmo</h1>
                        <div class="flex-custom mt-3">
                            <p class="m-0 text-md-large text-justify text-sm-center">
                                Avanza en tu carrera aprendiendo contabilidad, impuestos, NIIF, auditoría y más, con espacios interactivos dentro de la plataforma, sin necesidad de descargar o acceder a otras páginas.
                            </p>
                        </div>
                        <div class="flex-custom mt-4 btn-home-5">
                            <a href="{{ route('sign-up') }}" class="btn btn-2-ucamp px-4 py-2">Iniciar con AccountCamp</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('home.home-footer')

    @include('components.footer')
