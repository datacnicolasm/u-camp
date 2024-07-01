<!-- Navbar -->
<nav class="view-curso-navbar">

    <div class="container">
        <div class="row">

            <!-- Tools de curso-->
            <div class="col-4 container-course-tools">
                <div class="row">
                    <div class="btn-tool-left mr-2">
                        <i class="nav-icon fas fa-file"></i>
                        <div class="help-msg">
                            <span>Ver diapositivas</span>
                        </div>
                    </div>
                    <div class="btn-tool-left">
                        <i class="nav-icon fas fa-comment"></i>
                        <div class="help-msg">
                            <span>Reportar mejora</span>
                        </div>
                    </div>
                    <div class="text-points">
                        <i class="nav-icon fas fa-trophy"></i>
                        <div class="text-points-span">
                            <span>XP diarios</span>
                        </div>
                        <div class="text-points-num">
                            <strong>100</strong>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Guia del curso-->
            <div class="col-4 container-course-progress">

                <div class="progress-container">
                    <div class="progress-bar" id="progress-bar"></div>
                </div>

            </div>

            <!-- Breadcrumb -->
            <div class="col-4 container-breadcrumb">

                <ol class="view-curso-breadcrumb float-right">
                    <li class="item-breadcrumb">
                        <a href="{{ route('login-dashboard') }}">
                            Aprendizaje
                        </a>
                    </li>
                    <li class="item-breadcrumb">
                        <a href="{{ route('list-cursos') }}">
                            Cursos
                        </a>
                    </li>
                    <li class="item-breadcrumb">
                        <a href="{{ route('view-curso', ['curso' => $curso->id]) }}">
                            {{ $curso->titulo }}
                        </a>
                    </li>
                </ol>

            </div>
        </div>
    </div>

</nav>
<!-- /.navbar -->
