<main class="content-section">
    <div class="content-box">
        <div class="content-item item-year">
            <div class="content-icon"><i class="fas fa-calendar" style="color: gold;"></i></div>
            <p>Año</p>
            <p><strong class="value-set">Sin asignar</strong></p>
            <div class="menu-options menu-years">
                <?php
                $currentYear = date("Y");

                // Crear el ciclo for desde 0 hasta 5
                for ($i = 0; $i <= 5; $i++) {
                    $year = $currentYear - $i;
                    echo "<div data-valium='".$year."' class='option-item option-year'>";
                    echo $year;
                    echo "</div>";
                }
                ?>
            </div>
        </div>
        <div class="content-item">
            <div class="content-icon"><i class="fas fa-sync-alt"></i></div>
            <p>Periodicidad</p>
            <p><strong class="value-set">Sin asignar</strong></p>
            <div class="menu-options menu-periodi">
                <div data-valium="Anual" class='option-item option-periodi'>Anual</div>
            </div>
        </div>
        <div class="content-item">
            <div class="content-icon"><i class="fas fa-calendar"></i></div>
            <p>Periodo</p>
            <p><strong class="value-set">Sin asignar</strong></p>
            <div class="menu-options menu-period">
                <div data-valium="1.Anual" class='option-item option-period'><?php echo "1.Anual" ?></div>
            </div>
        </div>
        <div class="content-item">
            <div class="content-icon"><i class="fas fa-dollar-sign"></i></div>
            <p>Primer</p>
            <p>Pago</p>
        </div>
        <div class="content-item">
            <a href="{{ route('formulario-curso-DIAN', ['curso' => $curso->id, 'lesson' => $lesson->id]) }}" class="content-icon"><i class="fas fa-arrow-right"></i></a>
            <p>Crear</p>
        </div>
    </div>
</main>
