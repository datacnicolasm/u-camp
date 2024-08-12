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
                            <div class="row header-cursos py-5 px-3">
                                <div class="col-10">
                                    <h2 class="d-inline-block font-weight-bold">Cursos</h2>
                                    <div class="px-2 ml-3 bg-3-ucamp d-inline-block rounded">
                                        <i class="nav-icon fas fa-cubes mr-1"></i>
                                        Aprendizaje práctico
                                    </div>
                                    <div class="block">
                                        Explora el mundo de la contabilidad y las finanzas: Aprende con nuestros cursos
                                        interactivos y prácticos, diseñados para potenciar tus habilidades en
                                        contabilidad, impuestos, auditoría y mucho más.
                                    </div>
                                </div>
                                <div class="col-2"></div>
                            </div>
                        </div>

                        <!-- List Cursos -->
                        <div class="col-12 my-3">
                            <div class="row">

                                @foreach ($cursos as $curso)
                                    <div class="col-4">
                                        <div class="row card-curso px-2 py-3 m-1">
                                            <div class="col-12 level-curso">
                                                <div class="px-2 mb-3 bg-2-ucamp rounded d-inline-block text-medium">
                                                    {{ \App\Models\Curso::$dificultadTexto[$curso->dificultad] }}
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2 title-curso text-large">
                                                <strong>{{ $curso->titulo }}</strong>
                                            </div>
                                            <div class="col-12 px-2 mb-2 text-muted text-medium">
                                                CURSO
                                            </div>
                                            <div class="col-12 mb-3 pl-2 text-secondary descript-curso">
                                                {{ $curso->short_description }}
                                            </div>
                                            <div class="col-12 mt-2 pl-2">
                                                <a href="{{ route('view-curso', ['curso' => $curso->id]) }}" class="btn btn-ucamp btn-block">
                                                    <span>Ver curso</span>
                                                </a>
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

        <!-- Main footer -->
        @include('curso.components.main-footer')

    </div>

    @include('components.footer')
