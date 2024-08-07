<div id="content-cuest" data-idlesson="{{ $lesson->id }}" class="cuestionario-view-curso"
    data-pdf-url="{{ asset('pdf/' . $lesson->question->file_slide) }}">

    <div class="pdf-section">
        <embed id="pdf-embed" src="" type="application/pdf" width="100%" height="100%" />
    </div>

    <div class="questionnaire-section">
        <div class="questionnaire-header">
            <i class="fas fa-question-circle"></i>
            <h2>Cuestionario</h2>
        </div>
        <div class="questionnaire-content">
            <h3>{{ $lesson->title }}</h3>
            <div class="text-question">
                <?php echo $lesson->question->text_question; ?>
            </div>
            <div class="response-options">
                <div class="options-header">
                    <i class="fas fa-trophy"></i>
                    <h2>Opciones de respuesta </h2>
                    <span class="xp-badge">{{ $lesson->points_xp }}XP</span>
                </div>
                <form>
                    <div class="option-response">
                        <input type="radio" id="option1" name="option" value="1">
                        <label for="option1">{{ $lesson->question->option_1 }}</label>
                    </div>
                    <div class="option-response">
                        <input type="radio" id="option2" name="option" value="2">
                        <label for="option2">{{ $lesson->question->option_2 }}</label>
                    </div>
                    <div class="option-response">
                        <input type="radio" id="option3" name="option" value="3">
                        <label for="option3">{{ $lesson->question->option_3 }}</label>
                    </div>
                    <div class="option-response">
                        <input type="radio" id="option4" name="option" value="4">
                        <label for="option4">{{ $lesson->question->option_4 }}</label>
                    </div>
                </form>
                <button id="submit-respuesta">Enviar Respuesta</button>
                <div class="respuesta-correcta">

                    <!-- SI Aprobado -->
                    <div class="info-resultado aprobado">
                        <i class="fas fa-check-circle"></i>
                        <h3 class="font-weight-bold">¡Felicitaciones!</h3>
                        <p class="my-4">Has aprobado el ejercicio</p>
                        <!-- Siguiente leccion -->
                        @if ($nextLesson = \App\Models\Curso::getNextLesson($lesson->id))
                            <div id="next-lesson-respuesta">
                                <a href="{{ route('view-lesson', ['curso' => $curso->id, 'lesson' => $nextLesson]) }}"
                                    class="btn btn-3-ucamp btn-sm">Continuar</a>
                            </div>
                        @endif
                    </div>

                    <!-- NO Aprobado -->
                    <div class="info-resultado no-aprobado">
                        <i class="fas fa-times-circle"></i>
                        <h3 class="font-weight-bold">¡Incorrecto!</h3>
                        <p class="my-4">Has seleccionado la opción incorrecta</p>
                        <button id="nuevo-intento" class="btn btn-3-ucamp btn-sm">Volver a intentar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
