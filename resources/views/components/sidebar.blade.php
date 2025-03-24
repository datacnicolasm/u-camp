<!-- Main Sidebar Container -->
<aside class="main-sidebar main-sidebar-ucamp">

    <!-- Sidebar -->
    <div class="sidebar">

        <!--  -->
        <a href="{{ route('user-cuenta') }}" class="mt-2 user-sect-sodebar">
            <div class="user-icon">
                @if (Auth::user()->profile_image)
                    <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Profile Image" class="img-fluid">
                @else
                    <img src="{{ asset('img/user-default.png') }}" alt="Profile Image" class="img-fluid">
                @endif
            </div>
            <div class="user-info">
                <p>{{ Auth::user()->first_name }}</p>
            </div>
        </a>

        <!--  -->
        <nav class="mt-2 sidebar-menu">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <!-- Ver clases que tiene el usuario -->
                <li class="nav-item">
                    <a href="{{ route('login-dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Inicio</p>
                    </a>
                </li>

                <!-- Ver clases que tiene el usuario -->
                <li class="nav-item">
                    <a href="{{ route('login-dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-meteor"></i>
                        <p>Tu progreso</p>
                    </a>
                </li>

                <?php $class_items_grupos = ''; ?>
                @if (Route::currentRouteName() == 'dashboard-grupos')
                    <?php $class_items_grupos .= 'active-item-nav'; ?>
                @endif

                @if (Auth::user()->has_groups)
                    <!--  -->
                    <li class="nav-item">
                        <a href="{{ route('list-groups') }}" class="nav-link <?php echo $class_items_grupos; ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Grupos</p>
                        </a>
                    </li>
                @endif

                <!-- Division de secciones -->
                <div class="item-div-sidebar"></div>

                <!-- Seccion de Aprendizaje -->
                <li class="nav-header"><strong>APRENDIZAJE</strong></li>

                <!-- Cursos disponibles -->
                <li class="nav-item">
                    <?php $class_items_cursos = ''; ?>
                    @if (Route::currentRouteName() == 'list-cursos')
                        <?php $class_items_cursos .= 'active-item-nav'; ?>
                    @elseif (Route::currentRouteName() == 'view-curso')
                        <?php $class_items_cursos .= 'active-item-nav'; ?>
                    @endif
                    <a href="{{ route('list-cursos') }}" class="nav-link <?php echo $class_items_cursos; ?>">
                        <i class="nav-icon fas fa-atom"></i>
                        <p>Cursos</p>
                    </a>
                </li>

                <!-- Rutas de aprendizaje -->

                <!-- Division de secciones -->
                <div class="item-div-sidebar"></div>

                <!-- Seccion de aplicacion de conocimientos -->
                <li class="nav-header"><strong>APLICA TUS CONOCIMIENTOS</strong></li>

                <!-- Practica -->
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-dumbbell"></i>
                        <p>
                            Práctica
                            <span class="right badge badge-warning">Muy pronto</span>
                        </p>
                    </a>
                </li>

                <!-- Division de secciones -->
                <div class="item-div-sidebar"></div>

                <!-- Seccion de aplicacion de conocimientos -->
                <li class="nav-header"><strong>EVALUA TUS CONOCIMIENTOS</strong></li>

                <!-- Pruebas de conocimiento -->
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-medal"></i>
                        <p>
                            Evaluate
                            <span class="right badge badge-warning">Muy pronto</span>
                        </p>
                    </a>
                </li>

                <!-- Division de secciones -->
                <div class="item-div-sidebar"></div>

                <!-- Cerrar sesion -->
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-right-from-bracket"></i>
                        <p>Cerrar sesión</p>
                    </a>
                </li>

            </ul>
        </nav>

    </div>

</aside>
