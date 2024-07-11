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
                <div class="container">
                    <div class="row">
                         <!-- Header Cursos -->
                         <div class="col-12">
                            <div class="row header-ruta py-5 px-3">
                                <div class="col-10">
                                    <!-- Elemento de certificado -->
                                    <div class="certificate-badge align-items-center mb-3">
                                        <span>Certificado al completar la carrera</span>
                                        <i class="fas fa-medal mr-2"></i>
                                    </div>
                                    <h2 class="font-weight-bold mb-4">{{ $ruta->title }}</h2>
                                    <div class="block mt-3">
                                        <!-- Texto corto -->
                                        <div class="short-description"><?php echo $ruta->short_description . "<br>..." ?></div>
                                        <!-- Texto completo (oculto inicialmente) -->
                                        <div class="long-description d-none"><?php echo $ruta->long_description ?></div>
                                        <!-- Botón Ver más/Ver menos -->
                                        <a href="#" class="toggle-more text-tint-5">Ver más</a>
                                    </div>
                                    <!-- Botón Iniciar ruta -->
                                    <a href="#" class="btn btn-ruta mt-3">INICIAR RUTA</a>
                                </div>
                                <div class="col-2"></div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </section>

        </div>

    </div>

    @include('components.footer')
