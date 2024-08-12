<!-- Navbar -->
<nav class="view-curso-navbar">

    <div class="container">
        <div class="row">

            <!-- Tools de curso-->
            <div class="col-2 container-course-tools">
                <div class="row">
                    <div class="btn-tool-left">
                        <i id="ayuda-curso" class="fas fa-question-circle"></i>
                        <div class="help-msg">
                            <span>Ayuda</span>
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
                            <span>XP</span>
                        </div>
                        <div class="text-points-num">
                            <strong>100</strong>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Progress Bar -->
            <div class="col-3 container-course-progress">

                <div class="progress-text mr-2"></div>
                <div class="progress-container" data-progress="{{ $courseProgress }}">
                    <div class="progress-bar"></div>
                </div>                                                               

            </div>

            <!-- Breadcrumb -->
            <div class="col-7 container-breadcrumb">

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
