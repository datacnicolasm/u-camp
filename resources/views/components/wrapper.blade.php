<div class="container dashboard-container pt-4">

    @php
        $formattedName = ucwords(strtolower(Auth::user()->first_name));

        $today_points = \App\Models\Point::getPointsToday(Auth::user());
        $daily_points = \App\Models\Point::getDailyPoints(Auth::user());
        $total_points = \App\Models\Point::getTotalPoints(Auth::user());
        $consecutive_days = \App\Models\Point::getConsecutiveDays(Auth::user());
        $pointsOfWeek = \App\Models\Point::getPointsOfWeek(Auth::user());

    @endphp

    <!-- Notificaciones -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @php
                    $userCuenta = Auth::user();
                    $solicitudPendiente = $userCuenta->solicitud()->exists();
                @endphp

                <!-- Notificación para cuenta de docente -->
                @if (!$userCuenta->has_groups)
                    <div class="callout callout-info">
                        <h5>¿{{ $formattedName }}, eres docente?</h5>
                        <p>¡La versión para docentes es <strong>Gratis</strong>! Solicita ya la versión para docentes.
                        </p>

                        @if (!$solicitudPendiente)
                            <a href="{{ route('form-docente') }}" class="btn btn-sm btn-3-ucamp">Solicitar cuenta</a>
                        @else
                            <span class="text-muted">Ya tienes una solicitud de cuenta pendiente. Te informaremos el
                                resultado de la validación.</span>
                        @endif
                    </div>
                @endif


                <!-- Notificacion para verificar correo -->
                @if (!Auth::user()->hasVerifiedEmail())
                    <div class="callout callout-danger">
                        <h5>{{ $formattedName }}, verifica tu dirección de correo electrónico para comenzar</h5>
                        <p>¡Ya casi está todo listo! Para completar tu registro, por favor verifica tu dirección de
                            correo electrónico.</p>
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-3-ucamp">Reenviar correo de
                                verificación</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="mt-3 content">
        <div class="container-fluid">

            <div class="row">

                <!-- User card -->
                <div class="col-4">
                    <div class="card card-user-dashboard">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="user-sect">
                                <div class="user-icon">
                                    @if (Auth::user()->profile_image)
                                        <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Profile Image" class="img-fluid">
                                    @else
                                        <img src="{{ asset('img/user-default.png') }}" alt="Profile Image" class="img-fluid">
                                    @endif
                                </div>
                                <div class="user-info">
                                    <span class="m-0">Hola, {{ $formattedName }}!</span>
                                </div>
                            </div>
                            <div class="user-points">
                                <div class="points">
                                    <span class="num-points m-0">{{ $total_points }}</span>
                                    <span class="title m-0">Total XP</span>
                                </div>
                                <div class="points">
                                    <span class="num-points m-0">{{ $today_points }}</span>
                                    <span class="title m-0">Today XP</span>
                                </div>
                            </div>
                            <div class="user-streak">
                                <span class="number-racha m-0">
                                    <div class="icon-dias">
                                        <i class="fas fa-bolt"></i>
                                    </div>
                                    @php
                                        echo '<p class="m-0">';
                                        echo $consecutive_days;

                                        $text_dias = $consecutive_days == 1 ? 'día' : 'días';
                                        echo ' ' . $text_dias;
                                        echo '</p>';
                                    @endphp
                                </span>
                                <span class="title m-0">Tus días de racha</span>
                            </div>
                            <div class="user-week">
                                <div class="week-days">
                                    @php
                                        $days_week = ['L', 'M', 'X', 'J', 'V', 'S', 'D'];
                                        foreach ($pointsOfWeek as $key => $day) {
                                            $class_active = $day['points'] > 0 ? 'active' : '';
                                            echo '<div class="item-week ' . $class_active . '">';
                                            echo '<span>' . $days_week[$key] . '</span>';
                                            echo '</div>';
                                        }
                                    @endphp
                                </div>
                                <span class="title m-0">Tu semana</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-8 pt-2">
                    <div class="row">
                        <div class="col-6 font-weight-bold">
                            Tu aprendizaje
                        </div>
                        <div class="col-6">
                            <div class="float-sm-right">

                                @if (Auth::user()->is_premium)
                                    <dis class="suscrib-text">
                                        <span class="text-basis mr-2">
                                            Tienes suscripción premium
                                        </span>
                                    </dis>
                                @else
                                    <dis class="suscrib-text">
                                        <span class="text-basis mr-2">
                                            Suscripción básica
                                        </span>
                                        •
                                        <a href="{{ route('precios-home') }}"
                                            class="text-upgrate ml-2 text-3-ucamp font-weight-bold">
                                            Obtener Premium
                                            <span class="icon-up">
                                                <i class="fas fa-arrow-up"></i>
                                            </span>
                                        </a>
                                    </dis>
                                @endif

                            </div>
                        </div>

                        @php
                            $coursesWithProgress = App\Models\User::getCoursesWithProgress(Auth::user());
                        @endphp

                        @if (count($coursesWithProgress) > 0)
                            <div class="col-12 mt-3 item-cursos-dash">
                                <span class="text-muted">

                                    <span class="font-weight-bold">Tus cursos</span>

                                    <ul class="list-cursos">
                                        @foreach ($coursesWithProgress as $curso)
                                            <li class="card item-curso-dash">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <div
                                                                class="px-2 mb-2 bg-2-ucamp rounded d-inline-block text-medium">
                                                                {{ \App\Models\Curso::$dificultadTexto[$curso['course']->dificultad] }}
                                                            </div>
                                                            <div class="title-curso">
                                                                {{ $curso['course']->titulo }}
                                                            </div>
                                                            <div class="container-course-progress">
                                                                <div class="progress-text mr-2"></div>
                                                                <div class="progress-container"
                                                                    data-progress="{{ $curso['progress'] }}">
                                                                    <div class="progress-bar"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 content-btn-continuar">
                                                            <a href="{{ route('view-curso', ['curso' => $curso['course']->id]) }}"
                                                                class="btn btn-sm btn-3-ucamp">
                                                                Continuar
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </span>
                            </div>
                        @endif

                        @php
                            $coursesWithoutProgress = App\Models\User::getCoursesWithoutProgress(Auth::user());
                        @endphp

                        @if (count($coursesWithoutProgress) > 0)
                            <div class="col-12 mt-3 item-cursos-dash">
                                <span class="text-muted">

                                    <span class="font-weight-bold">Iniciar un curso</span>

                                    <ul class="list-cursos">
                                        @foreach ($coursesWithoutProgress as $curso)
                                            <li class="card item-curso-dash">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <div
                                                                class="px-2 mb-2 bg-2-ucamp rounded d-inline-block text-medium">
                                                                {{ \App\Models\Curso::$dificultadTexto[$curso->dificultad] }}
                                                            </div>
                                                            <div class="title-curso">
                                                                {{ $curso->titulo }}
                                                            </div>
                                                            <div class="mb-1 text-secondary descript-curso">
                                                                Curso con explicaciones varias.
                                                            </div>
                                                        </div>
                                                        <div class="col-4 content-btn-continuar">
                                                            <a href="{{ route('view-curso', ['curso' => $curso->id]) }}"
                                                                class="btn btn-sm btn-3-ucamp">
                                                                Iniciar curso
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </span>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
