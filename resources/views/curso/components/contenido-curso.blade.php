<div class="contenido-curso-main">
    <div class="header-contenido">
        <h4>{{ $curso->titulo }}</h4>
        <i class="fas fa-times close"></i>
    </div>
    <div class="items-contenido">
        <div class="chapters-curso">
            @if ($curso->chapters->isEmpty())
                <p>No chapters available for this course.</p>
            @else
                @foreach ($curso->chapters as $chapter)
                    <div class="mb-3 py-3 px-3 chapter-item">
                        <div class="row chapter-header">
                            <div class="col-8 chapter-title">
                                <p class="m-0 font-weight-bold">
                                    {{ $chapter->title }}
                                </p>
                                @if ($loop->index == 0)
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

                                    <div class="progress-container">
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
                                @foreach ($chapter->lessons as $lesson)
                                    <li>
                                        <a
                                            href="{{ route('view-lesson', ['curso' => $curso->id, 'lesson' => $lesson->id]) }}">
                                            <div class="item-lesson-left">
                                                @if ($lesson->type == 'video')
                                                    <i class="fas fa-video"></i>
                                                @elseif ($lesson->type == 'questionnaire')
                                                    <i class="fas fa-check-square"></i>
                                                @elseif ($lesson->type == 'interactive')
                                                    <i class="fas fa-keyboard"></i>
                                                @elseif ($lesson->type == 'dian')
                                                    <i class="fas fa-file-invoice"></i>
                                                @endif
                                                <span>{{ $lesson->title }}</span>
                                            </div>
                                            <div class="item-lesson-right text-2-ucamp">
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
