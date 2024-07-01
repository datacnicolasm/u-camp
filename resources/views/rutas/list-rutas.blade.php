@include('components.header')

<body class="layout-fixed">

    <div class="wrapper">

        <!-- Barra de navegacion superior -->
        @include('components.navbar')

        <!-- Barra de navegacion lateral -->
        @include('components.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <section class="content content-teacher p-3">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Header Cursos -->
                        <div class="col-12">
                            <div class="row header-rutas py-5 px-3">
                                <div class="col-10">
                                    <h2 class="d-inline-block font-weight-bold">Rutas Profesionales</h2>
                                    <div class="px-2 ml-3 bg-3-ucamp d-inline-block rounded">
                                        <i class="nav-icon fas fa-cubes mr-1"></i>
                                        Desarrolla habilidades profesionales
                                    </div>
                                    <div class="block">
                                        Una ruta profesional es un programa de aprendizaje estructurado y especializado diseñado para guiarte a través de un conjunto coherente de cursos y ejercicios prácticos que te proporcionarán las habilidades y conocimientos necesarios para sobresalir en una carrera específica dentro del campo de contabilidad y finanzas. Nuestras rutas profesionales están cuidadosamente elaboradas y adaptadas al contexto colombiano, asegurando que obtengas una formación relevante y de alta calidad, directamente aplicable a tu entorno profesional.
                                    </div>
                                </div>
                                <div class="col-2"></div>
                            </div>
                        </div>

                        <!-- List Cursos -->
                        <div class="col-12 my-3">
                            <div class="row">

                                @foreach ($rutas as $ruta)
                                    <div class="col-6">
                                        <div class="row card-ruta px-2 py-3 m-1">
                                            <div class="col-12 px-2 mb-2 text-muted text-medium">
                                                RUTA PROFESIONAL
                                            </div>
                                            <div class="col-12 mb-2 title-curso text-large">
                                                <strong>{{ $ruta->title }}</strong>
                                            </div>
                                            <div class="col-12 pl-2 mb-1 text-secondary descript-curso">
                                                {{ $ruta->short_description }}
                                            </div>
                                            <div class="certificate-badge align-items-center mb-3 mt-1 ml-2">
                                                <span>Certificado al completar la carrera</span>
                                                <i class="fas fa-medal mr-2"></i>
                                            </div>
                                            <div class="divisor-ruta"></div>
                                            <div class="col-12 mt-2 pl-2">
                                                <div class="row py-1 px-3">
                                                    <div class="col-7 count-ruta">34 Cursos y Proyectos</div>
                                                    <div class="col-5">
                                                        <a href="{{ route('view-ruta-profesional', ['user' => $user->id, 'page' => 'rutas', 'ruta' => $ruta->id]) }}" class="btn btn-ucamp btn-block">
                                                            <span>Ver detalles</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>

    </div>

    @include('components.footer')
