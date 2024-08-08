<main class="content-section">
    <script>
        sessionStorage.setItem('guiaCamp', "0");
    </script>
    <div class="content-box">
        <div class="item-step-1 content-item item-year">
            <div class="content-icon"><i class="fas fa-calendar" style="color: gold;"></i></div>
            <p>Año</p>
            <p><strong class="value-set">Sin asignar</strong></p>
            <div class="menu-options menu-years">
                <?php
                $currentYear = date('Y');
                
                // Crear el ciclo for desde 0 hasta 5
                for ($i = 0; $i <= 5; $i++) {
                    $year = $currentYear - $i;
                    echo "<div data-valium='" . $year . "' class='option-item option-year'>";
                    echo $year;
                    echo '</div>';
                }
                ?>
            </div>
        </div>
        <div class="item-step-2 content-item item-periodicidad">
            <div class="content-icon"><i class="fas fa-sync-alt"></i></div>
            <p>Periodicidad</p>
            <p><strong class="value-set">Sin asignar</strong></p>
            <div class="menu-options menu-periodi">
                <div data-valium="Anual" class='option-item option-periodi'>Anual</div>
            </div>
        </div>
        <div class="item-step-3 content-item item-periodo">
            <div class="content-icon"><i class="fas fa-calendar"></i></div>
            <p>Periodo</p>
            <p><strong class="value-set">Sin asignar</strong></p>
            <div class="menu-options menu-period">
                <div data-valium="1.Anual" class='option-item option-period'><?php echo '1.Anual'; ?></div>
            </div>
        </div>
        <div class="content-item">
            <div class="content-icon"><i class="fas fa-dollar-sign"></i></div>
            <p>Primer</p>
            <p>Pago</p>
        </div>
        <div class="item-step-4 content-item">
            <a id="crear-formulario-btn"
                data-urlwork="{{ route('formulario-curso-DIAN', ['curso' => $curso->id, 'lesson' => $lesson->id]) }}"
                href="" class="content-icon"><i class="fas fa-arrow-right"></i></a>
            <p>Crear</p>
            <p>Formulario</p>
        </div>
    </div>
    <div class="mt-3 callout callout-danger">
        <p>Debes seleccionar el año, periodicidad y periodo del formulario que vas a crear.</p>
    </div>
</main>
