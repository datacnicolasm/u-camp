<!-- FooterNav -->
<nav class="view-curso-footer-nav">

    <div class="container footer-nav-contenido">
        <!-- -->
        @include('curso.components.contenido-curso')

        <!-- -->
        <div class="row">

            <div class="button-container">
                <!-- Anterior leccion -->
                @if( $nextLesson = \App\Models\Curso::getPreviousLesson($lesson->id) )
                    <a href="{{ route('view-lesson', ['curso' => $curso->id, 'lesson' => $nextLesson ]) }}" class="btn left-btn"><i class="fas fa-arrow-left"></i></a>
                @endif
                
                <button class="btn center-btn">Ver plan de curso</button>
                
            </div>
        </div>
    </div>

</nav>
