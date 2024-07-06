<div class="cuestionario-view-curso" data-pdf-url="{{ asset('pdf/dummy.pdf') }}">

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
            <p>Explicación del escenario a evaluar.</p>
            <br>
            <h4>Pregunta: ¿Cuál es la capital de Francia?</h4>
            <div class="response-options">
                <div class="options-header">
                    <i class="fas fa-trophy"></i>
                    <h2>Opciones de respuesta </h2>
                    <span class="xp-badge">{{ $lesson->points_xp }}XP</span>
                </div>
                <form>
                    <div>
                        <input type="radio" id="option1" name="option" value="Paris">
                        <label for="option1">Paris</label>
                    </div>
                    <div>
                        <input type="radio" id="option2" name="option" value="Londres">
                        <label for="option2">Londres</label>
                    </div>
                    <div>
                        <input type="radio" id="option3" name="option" value="Madrid">
                        <label for="option3">Madrid</label>
                    </div>
                    <div>
                        <input type="radio" id="option4" name="option" value="Berlin">
                        <label for="option4">Berlin</label>
                    </div>
                    <button type="submit">Enviar Respuesta</button>
                </form>
            </div>
        </div>
    </div>

</div>
