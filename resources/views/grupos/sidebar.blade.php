<!-- Main Sidebar Container -->
<aside class="main-sidebar main-sidebar-ucamp">

    <!-- Sidebar -->
    <div class="sidebar sidebar-groups">

        <!--  -->
        <a href="" class="mt-2 user-sect-sodebar">
            <div class="user-icon">
                <img src="{{ asset('img/user-default-1.jpg') }}" alt="">
            </div>
            <div class="user-info">
                <p>{{ Auth::user()->first_name }}</p>
            </div>
        </a>

        <!--  -->
        <nav class="mt-2 sidebar-menu">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="btn-item">
                    <a href="" class="btn btn-block font-weight-bold text-white bg-tint-3 btn-invitar py-2">Invitar estudiantes</a>
                </li>

                <!-- Division de secciones -->
                <div class="item-div-sidebar"></div>

                <!--  -->
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>Cuadro de mando</p>
                    </a>
                </li>

                <!--  -->
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Estudiantes</p>
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
                    <a class="nav-link">
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
