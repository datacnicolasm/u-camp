<div class="item-step-9 content-panel">
    <div class="instruc-section">
        <div class="instruc-header">
            <i class="fas fa-info-circle"></i>
            <h2>Instrucciones</h2>
        </div>
        <div class="instruc-content">
            <h3>Contexto del ejercicio</h3>
            <div class="text-instruc">
                <?php echo $lesson->workshop->context_workshop ?>
            </div>
            <h3>Indicaciones de la actividad</h3>
            <div class="text-instruc">
                <?php echo $lesson->workshop->context_workshop ?>
            </div>
            <h3>Normativa relacionada</h3>
            <div class="text-instruc laws-content">
                @if($lesson->workshop->laws)
                    <div class="accordion law-item">
                    
                        @foreach($lesson->workshop->laws as $law)
                            <h4 class="accordion-header"><?php echo $law->type_law . " - Art." . $law->num_law . " " . $law->title_law ?><i class="fas fa-chevron-down arrow-icon"></i></h4>
                            <div class="accordion-content">
                                <div class="text-info-year">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    <?php echo "Esta normativa tiene vigencia para el año " . $law->year_law ?>    
                                </div>
                                {{ $law->text_law }}
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
