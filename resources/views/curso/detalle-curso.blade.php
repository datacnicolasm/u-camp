@include('components.header')

<body class="layout-fixed curso-page">

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
                        <!-- Header Curso -->
                        <div class="col-12">
                            <div class="row header-detalle-cursos py-3 px-3">
                                <div class="col-10">
                                    <p class="my-2 d-block text-medium text-white">
                                        CURSO
                                    </p>
                                    <h2 class="d-block font-weight-bold">
                                        {{ $curso->titulo }}
                                    </h2>
                                </div>
                                <div class="col-10 btn-curso">
                                    <a href="{{ route('view-lesson', ['curso' => $curso->id, 'lesson' => $lastLesson["lesson_id"] ]) }}" class="btn bg-3-ucamp mt-2">
                                        @if ($lastLesson["is_first"])
                                            <span>Iniciar curso</span>
                                        @else
                                            <span>Continuar curso</span>
                                        @endif
                                    </a>
                                </div>
                                <div class="col-10 mt-3 ml-2 datos-curso">
                                    <p class="m-0 pr-2 d-inline-block text-medium text-white">
                                        {{ \App\Models\Curso::$dificultadTexto[$curso->dificultad] }}
                                    </p>
                                </div>        
                            </div>
                        </div>

                        <!-- Detalle Curso -->
                        <div class="col-12 mt-3">
                            <div class="row panel-detalles-curso">
                                <div class="col-3 panel-left">
                                </div>
                                <div class="col-9 panel-right p-3">
                                    <p class="m-0 font-weight-bold text-large">Descripcion</p>
                                    <p class="m-0">{{ $curso->long_description }}</p>
                                    <p class="mt-3 font-weight-bold text-large">Contenido del curso</p>
                                    <div class="chapters-curso pr-3">
                                        @if($curso->chapters->isEmpty())
                                            <p>No chapters available for this course.</p>
                                        @else
                                            @foreach($curso->chapters as $chapter)
                                                <div class="mb-3 py-3 px-3 chapter-item">
                                                    <div class="row chapter-header">
                                                        <div class="col-8 chapter-title">
                                                            <p class="m-0 font-weight-bold">
                                                                {{ $chapter->title }}
                                                            </p>
                                                            @if($loop->index == 0)
                                                                <div class="px-2 ml-3 bg-2-ucamp rounded d-inline-block text-medium">
                                                                    Gratis
                                                                </div>
                                                            @else
                                                                <div class="px-2 ml-3 bg-3-ucamp rounded d-inline-block text-medium">
                                                                    Pago
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="col-4 chapter-bar">
                                                            <div class="container-course-progress">
                                                                <?php
                                                                    $class_progress = 0;
                                                                    if ($chapter->total_lessons > 0){
                                                                        $class_progress = ($chapter->viewed_lessons / $chapter->total_lessons)*100;
                                                                    }
                                                                ?>
                                                                <div class="progress-container" data-progress="<?php echo round($class_progress) ?>">
                                                                    <div class="progress-bar" id="progress-bar"></div>
                                                                </div>
                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="mt-3 mb-0">
                                                        {{ $chapter->description }}
                                                    </p>
                                                    <div class="lessons-list">
                                                        <span class="text-toggle text-primary font-weight-bold">Ver contenido</span>
                                                        <ul class="lessons-list-items">
                                                            @foreach($chapter->lessons as $lesson)
                                                                <li>
                                                                    <a href="{{ route('view-lesson', ['curso' => $curso->id, 'lesson' => $lesson->id ]) }}">
                                                                        <div class="item-lesson-left">
                                                                            @if ( $lesson->type == 'video' )
                                                                                <i class="fas fa-video <?php echo ($lesson->viewed) ? 'viewed' : 'no-viewed'; ?>"></i>
                                                                            @elseif ( $lesson->type == 'questionnaire' )
                                                                                <i class="fas fa-check-square <?php echo ($lesson->viewed) ? 'viewed' : 'no-viewed'; ?>"></i>
                                                                            @elseif ( $lesson->type == 'interactive' )
                                                                                <i class="fas fa-keyboard <?php echo ($lesson->viewed) ? 'viewed' : 'no-viewed'; ?>"></i>
                                                                            @elseif ( $lesson->type == 'dian' )
                                                                                <i class="fas fa-file-invoice <?php echo ($lesson->viewed) ? 'viewed' : 'no-viewed'; ?>"></i>
                                                                            @endif
                                                                            <span>{{ $lesson->title }}</span>
                                                                        </div>
                                                                        <div class="item-lesson-right <?php echo ($lesson->viewed) ? 'text-success' : 'text-2-ucamp'; ?>">
                                                                            <?php echo ($lesson->viewed) ? '<i class="fas fa-check icon-circle"></i>' : ''; ?>
                                                                            {{ $lesson->points_xp }}xp
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>

    </div>

    @include('components.footer')
