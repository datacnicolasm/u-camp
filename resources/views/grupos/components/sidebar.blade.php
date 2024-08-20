<!-- Main Sidebar Container -->
<aside class="main-sidebar main-sidebar-ucamp">

    <!-- Sidebar -->
    <div class="sidebar sidebar-groups">

        <!--  -->
        <a href="" class="mt-2 user-sect-sodebar">
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

                <?php $class_items_grupos = ''; ?>
                @if (Route::currentRouteName() == 'dashboard-grupos')
                    <?php $class_items_grupos .= 'active-item-nav'; ?>
                @endif
                <!--  -->
                <li class="mt-3 nav-item">
                    <a href="{{ route('dashboard-grupos') }}" class="nav-link <?php echo $class_items_grupos; ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Inicio</p>
                    </a>
                </li>

                <!--  -->
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>Cuadro de mando</p>
                    </a>
                </li>

                <!-- Listado de miembros / estudiantes -->
                <?php $class_items_members = "" ?>
                @if (Route::currentRouteName() == 'list-members')
                    <?php $class_items_members .= "active-item-nav" ?>
                @endif
                <li class="nav-item">
                    <a href="{{ route('list-members') }}" class="nav-link <?php echo $class_items_members ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Estudiantes</p>
                    </a>
                </li>

                <!-- Listado de enlaces -->
                <?php $class_items_links = "" ?>
                @if (Route::currentRouteName() == 'links-members')
                    <?php $class_items_links .= "active-item-nav" ?>
                @endif
                <li class="nav-item">
                    <a href="{{ route('links-members') }}" class="nav-link <?php echo $class_items_links ?>">
                        <i class="nav-icon fas fa-link"></i>
                        <p>Enlaces de invitación</p>
                    </a>
                </li>

                <!-- Listado de grupos -->
                <?php $class_items_grupos = "" ?>
                @if (Route::currentRouteName() == 'list-groups')
                    <?php $class_items_grupos .= "active-item-nav" ?>
                @endif
                <li class="nav-item">
                    <a href="{{ route('list-groups') }}" class="nav-link <?php echo $class_items_grupos ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Grupos</p>
                    </a>
                </li>

                <!-- Division de secciones -->
                <div class="item-div-sidebar"></div>

                <!-- Seccion de Aprendizaje -->
                <li class="nav-header"><strong>APRENDIZAJE</strong></li>

                <!--  -->
                <li class="nav-item">
                    <a href="{{ route('list-actividades', ['user' => Auth::user()]) }}"class="nav-link">
                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>Actividades</p>
                    </a>
                </li>

                <!--  -->
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>Panel de aprendizaje</p>
                    </a>
                </li>

                <!--  -->
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Analitica</p>
                    </a>
                </li>

                <!-- Division de secciones -->
                <div class="item-div-sidebar"></div>

                <!--  -->
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Ajustes</p>
                    </a>
                </li>

                <!-- Cerrar sesion -->
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="{{ route('login-dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-right-from-bracket"></i>
                        <p>Salir</p>
                    </a>
                </li>

            </ul>
        </nav>

    </div>

</aside>
