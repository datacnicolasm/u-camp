<!-- Main Sidebar Container -->
<aside class="main-sidebar main-sidebar-ucamp">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
    
                    <!-- Ver clases que tiene el usuario -->
                    <li class="nav-item">
                        <a href="pages/widgets.html" class="nav-link">
                            <i class="nav-icon fas fa-meteor"></i>
                            <p>Tu progreso</p>
                        </a>
                    </li>
    
                </ul>
            </nav>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-header"><strong>APRENDIZAJE</strong></li>

                <!-- Cursos disponibles -->
                <li class="nav-item">
                    <?php
                    if (isset($_GET['page'])){
                        $class_cursos = $_GET['page'] == 'cursos' ? "active-item-nav" : "";
                    }
                    ?>
                    <a href="{{ route('list-cursos', ['user' => $user->id, 'page' => 'cursos']) }}" class="nav-link">
                        <i class="nav-icon fas fa-atom"></i>
                        <p>Cursos</p>
                    </a>
                </li>

                <!-- Rutas de aprendizaje -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-signs-post"></i>
                        <p>
                            Rutas de aprendizaje
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item pl-2">
                            <a href="pages/charts/chartjs.html" class="nav-link">
                                <i class="fas fa-layer-group nav-icon"></i>
                                <p>Ruta Profesional</p>
                            </a>
                        </li>
                        <li class="nav-item pl-2">
                            <a href="pages/charts/flot.html" class="nav-link">
                                <i class="fas fa-layer-group nav-icon"></i>
                                <p>Ruta por Competencias</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Practica -->
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-dumbbell"></i>
                        <p>Práctica</p>
                    </a>
                </li>

                <!-- Pruebas de conocimiento -->
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-medal"></i>
                        <p>Evaluate</p>
                    </a>
                </li>

                <li class="nav-header"><strong>APLICA TUS CONOCIMIENTOS</strong></li>

                <!-- Proyectos -->
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-diagram-project"></i>
                        <p>Proyectos</p>
                    </a>
                </li>

                <!-- Casos de estudio -->
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-timeline"></i>
                        <p>Casos de estudio</p>
                    </a>
                </li>

                <!-- Cerrar sesion -->
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-right-from-bracket"></i>
                        <p>Cerrar sesión</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
