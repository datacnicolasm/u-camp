<header class="main-header-ucamp">
    <nav class="navigation-menu">
        <div class="container-top">
            <div class="left-section">
                <div class="logo-page-dian">
                    <span class="u-logo">Account</span>
                    <span class="camp-logo">Camp</span>
                </div>
            </div>
            <div class="center-section">
                <h1>FORMULARIOS INTERACTIVOS</h1>
            </div>
            <div class="right-section">
                <p>EMPRESAS COMERCIALES DE COLOMBIA S.A.S</p>
                <p>NOMBRES Y APELLIDOS DEL REPRESENTANTE LEGAL</p>
                <p><?php echo date('M j, Y / H:i:s') ?></p>
            </div>
        </div>
        <div class="container-center">
            <i class="fas fa-arrow-left"></i>
            <i class="fas fa-bars"></i>
            <span class="menu-text">
                @if($lesson->workshop->cod_form == "110")
                    Declaración de Renta y Complementario o de Ingresos y Patrimonio para Personas Personas Personas
                @endif
            </span>
            <i class="fas fa-home"></i>
            <i class="fas fa-folder"></i>
            <i class="fas fa-bell"></i>
            <i class="fas fa-calendar"></i>
            <i class="fas fa-power-off" style="color: red;"></i>
        </div>        
        <div class="container-bottom font-weight-bold">
            @if($lesson->workshop->cod_form == "110")
                <?php echo $lesson->workshop->cod_form . " - Declaración de Renta y Complementario o de Ingresos y Patrimonio para Personas Personas Personas" ?>
            @endif
        </div>
    </nav>
</header>