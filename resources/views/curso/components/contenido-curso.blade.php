@php
    // Verificar si cada lección ha sido vista por el usuario
    foreach ($curso->chapters as $chapter) {
        $chapter->total_lessons = $chapter->lessons->count();
        $chapter->viewed_lessons = 0;

        foreach ($chapter->lessons as $lesson) {
            $lesson->viewed = Auth::user()->hasViewedLesson($lesson->id);
            if ($lesson->viewed) {
                $chapter->viewed_lessons++;
            }
        }
    }
@endphp

<div class="contenido-curso-main">
    <div class="modal-content">
        <div class="modal-header">
            <div class="title-modal">{{ $curso->titulo }}</div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
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
                                            <?php
                                                $class_progress = 0;
                                                if ($chapter->total_lessons > 0){
                                                    $class_progress = ($chapter->viewed_lessons / $chapter->total_lessons)*100;
                                                }
                                            ?>
                                            <div class="progress-text mr-2"></div>
                                            <div class="progress-container" data-progress="<?php echo round($class_progress) ?>">
                                                <div class="progress-bar"></div>
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
                                            @php
                                            $url_lesson = $lesson->enabled
                                                ? route('view-lesson', ['curso' => $curso->id, 'lesson' => $lesson->id])
                                                : '#';

                                            $class_enabled = $lesson->enabled ? "enabled" : "no-enabled";
                                            @endphp
                                            <li>
                                                <a
                                                    href="{{ $url_lesson }}">
                                                    <div class="item-lesson-left {{ $class_enabled }}">
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
    </div>
</div>
