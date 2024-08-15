@include('components.header')

<body>

    <div class="wrapper">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('user') }}
            </div>
        @endif

        <!-- Barra de navegacion superior -->
        @include('components.navbar')

        <!-- Barra de navegacion lateral -->
        @include('grupos.components.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <div class="container list-actividades">

                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">

                        <!-- Modal para eliminar de un gruppo -->
                        @include('grupos.modal.modal-create-actividad')

                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Actividades</h1>
                            </div>
                            <div class="col-sm-6">
                                <div class="float-sm-right">
                                    <button class="btn btn-ucamp btn-add-group" data-toggle="modal"
                                        data-target="#modal-create-actividad" type="button">
                                        <i class="fas fa-plus mr-2"></i> Crear actividad
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">

                                <div class="card card-top-camp">
                                    <div class="card-header p-2">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item"><a class="nav-link active" href="#activas"
                                                    data-toggle="tab">Activas</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#vencidas"
                                                    data-toggle="tab">Vencidas</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#archivadas"
                                                    data-toggle="tab">Archivadas</a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="tab-content">

                                            <!-- Tabla de actividades ACTIVAS -->
                                            <div class="active tab-pane" id="activas">
                                                @if ($lessons && count($lessons) > 0)
                                                    @php
                                                        // Filtrar la colección original
                                                        $lessons_activas = $lessons->filter(function ($lesson_item) {
                                                            if (
                                                                $lesson_item->is_archived == 0 &&
                                                                $lesson_item->status == 'activa'
                                                            ) {
                                                                return true;
                                                            } else {
                                                                return false;
                                                            }
                                                        });
                                                    @endphp
                                                    @if ($lessons_activas && count($lessons_activas) > 0)

                                                        <!-- Tabla de actividades -->
                                                        <table class="table-actividades table">
                                                            <thead>
                                                                <tr>
                                                                    <th width="8%">Tipo</th>
                                                                    <th>Nombre actividad</th>
                                                                    <th>Grupo</th>
                                                                    <th width="18%">Vencimiento</th>
                                                                    <th width="7%">Envios</th>
                                                                    <th width="7%">XP</th>
                                                                    <th width="18%" style="text-align: center;">Acciones</th>
                                                                </tr>
                                                            </thead>

                                                            <!-- Listado de grupos -->
                                                            <tbody>
                                                                @foreach ($lessons_activas as $lesson)
                                                                    <tr id="lesson-{{ $lesson->id }}">
                                                                        <td>
                                                                            <span class="text-muted">
                                                                                {{ strtoupper($lesson->type) }}
                                                                            </span>
                                                                        </td>
                                                                        <td>{{ $lesson->title }}</td>
                                                                        <td class="color-column">
                                                                            <div class="color-group mr-2"
                                                                                style="background-color: {{ $lesson->group->color }};">
                                                                            </div>
                                                                            {{ $lesson->group->name }}
                                                                        </td>
                                                                        <td><span
                                                                                class="text-muted">{{ \Carbon\Carbon::parse($lesson->expires_at)->format('d - M - Y h:i a') }}</span>
                                                                        </td>
                                                                        <td class="text-weight-bold">11</td>
                                                                        <td class="text-tint-2">{{ $lesson->points_xp }}
                                                                            XP</td>
                                                                        <td>
                                                                            <div class="content-btns">
                                                                                <!-- Botón eliminar -->
                                                                                <button
                                                                                    class="icon-button mr-2 btn-delete-lesson"
                                                                                    data-idlesson="{{ $lesson->id }}">
                                                                                    <i class="fas fa-trash"></i>
                                                                                    <span class="tool-tip">Eliminar</span>
                                                                                </button>

                                                                                <!-- Botón editar -->
                                                                                <button class="icon-button mr-2">
                                                                                    <i class="fas fa-edit"></i>
                                                                                    <span class="tool-tip">Editar</span>
                                                                                </button>

                                                                                <!-- Botón archivar -->
                                                                                <button class="icon-button mr-2">
                                                                                    <i class="fas fa-file-alt"></i>
                                                                                    <span class="tool-tip">Archivar</span>
                                                                                </button>

                                                                                <!-- Ver actividad -->
                                                                                <button class="icon-button mr-2">
                                                                                    <i class="fas fa-eye"></i>
                                                                                    <span class="tool-tip">Preview</span>
                                                                                </button>

                                                                                <!-- Ver resultados -->
                                                                                <button class="icon-button">
                                                                                    <i class="fas fa-tachometer-alt"></i>
                                                                                    <span class="tool-tip">Resultados</span>
                                                                                </button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    @else
                                                        <div class="no-items">
                                                            <div class="icon py-2">
                                                                <i class="fas fa-clipboard"></i>
                                                            </div>
                                                            <p class="my-2 font-weight-bold">Crear actividades para tus
                                                                grupos</p>
                                                            <p class="my-2">Asigna a tus estudiantes actividades
                                                                especificas de <strong>AccountCamp</strong> y luego
                                                                sigue su progreso.</p>
                                                            <button class="btn btn-3-ucamp mt-3" data-toggle="modal"
                                                                data-target="#modal-create-actividad" type="button">
                                                                <i class="fas fa-plus mr-2"></i> Crear actividad
                                                            </button>
                                                        </div>
                                                    @endif
                                                @else
                                                    <div class="no-items">
                                                        <div class="icon py-2">
                                                            <i class="fas fa-clipboard"></i>
                                                        </div>
                                                        <p class="my-2 font-weight-bold">Crear actividades para tus
                                                            grupos</p>
                                                        <p class="my-2">Asigna a tus estudiantes actividades
                                                            especificas de <strong>AccountCamp</strong> y luego sigue su
                                                            progreso.</p>
                                                        <button class="btn btn-3-ucamp mt-3" data-toggle="modal"
                                                            data-target="#modal-create-actividad" type="button">
                                                            <i class="fas fa-plus mr-2"></i> Crear actividad
                                                        </button>
                                                    </div>
                                                @endif
                                            </div>

                                            <!-- Tabla de actividades VENCIDAS -->
                                            <div class="tab-pane" id="vencidas">
                                                @if ($lessons && count($lessons) > 0)
                                                    @php
                                                        // Filtrar la colección original
                                                        $lessons_vencidas = $lessons->filter(function ($lesson_item) {
                                                            if (
                                                                $lesson_item->is_archived == 0 &&
                                                                $lesson_item->status == 'vencida'
                                                            ) {
                                                                return true;
                                                            } else {
                                                                return false;
                                                            }
                                                        });
                                                    @endphp
                                                    @if ($lessons_vencidas && count($lessons_vencidas) > 0)

                                                        <!-- Tabla de actividades -->
                                                        <table class="table-actividades table">
                                                            <thead>
                                                                <tr>
                                                                    <th width="8%">Tipo</th>
                                                                    <th>Nombre actividad</th>
                                                                    <th>Grupo</th>
                                                                    <th width="18%">Vencimiento</th>
                                                                    <th width="7%">Envios</th>
                                                                    <th width="7%">XP</th>
                                                                    <th width="18%" style="text-align: center;">Acciones</th>
                                                                </tr>
                                                            </thead>

                                                            <!-- Listado de grupos -->
                                                            <tbody>
                                                                @foreach ($lessons_vencidas as $lesson)
                                                                    <tr id="lesson-{{ $lesson->id }}">
                                                                        <td>
                                                                            <span class="text-muted">
                                                                                {{ strtoupper($lesson->type) }}
                                                                            </span>
                                                                        </td>
                                                                        <td>{{ $lesson->title }}</td>
                                                                        <td class="color-column">
                                                                            <div class="color-group mr-2"
                                                                                style="background-color: {{ $lesson->group->color }};">
                                                                            </div>
                                                                            {{ $lesson->group->name }}
                                                                        </td>
                                                                        <td><span
                                                                                class="text-muted">{{ \Carbon\Carbon::parse($lesson->expires_at)->format('d - M - Y h:i a') }}</span>
                                                                        </td>
                                                                        <td class="text-weight-bold">11</td>
                                                                        <td class="text-tint-2">
                                                                            {{ $lesson->points_xp }} XP</td>
                                                                        <td>
                                                                            <div class="content-btns">
                                                                                <!-- Botón eliminar -->
                                                                                <button
                                                                                    class="icon-button mr-2 btn-delete-lesson"
                                                                                    data-idlesson="{{ $lesson->id }}">
                                                                                    <i class="fas fa-trash"></i>
                                                                                    <span class="tool-tip">Eliminar</span>
                                                                                </button>

                                                                                <!-- Botón editar -->
                                                                                <button class="icon-button mr-2">
                                                                                    <i class="fas fa-edit"></i>
                                                                                    <span class="tool-tip">Editar</span>
                                                                                </button>

                                                                                <!-- Botón archivar -->
                                                                                <button class="icon-button mr-2">
                                                                                    <i class="fas fa-file-alt"></i>
                                                                                    <span class="tool-tip">Archivar</span>
                                                                                </button>

                                                                                <!-- Ver actividad -->
                                                                                <button class="icon-button mr-2">
                                                                                    <i class="fas fa-eye"></i>
                                                                                    <span class="tool-tip">Preview</span>
                                                                                </button>

                                                                                <!-- Ver resultados -->
                                                                                <button class="icon-button">
                                                                                    <i class="fas fa-tachometer-alt"></i>
                                                                                    <span class="tool-tip">Resultados</span>
                                                                                </button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    @else
                                                        <div class="no-items">
                                                            <div class="icon py-2">
                                                                <i class="fas fa-clipboard"></i>
                                                            </div>
                                                            <p class="my-2 font-weight-bold">Crear actividades para tus
                                                                grupos</p>
                                                            <p class="my-2">Asigna a tus estudiantes actividades
                                                                especificas de <strong>AccountCamp</strong> y luego
                                                                sigue su progreso.</p>
                                                            <button class="btn btn-3-ucamp mt-3" data-toggle="modal"
                                                                data-target="#modal-create-actividad" type="button">
                                                                <i class="fas fa-plus mr-2"></i> Crear actividad
                                                            </button>
                                                        </div>
                                                    @endif
                                                @else
                                                    <div class="no-items">
                                                        <div class="icon py-2">
                                                            <i class="fas fa-clipboard"></i>
                                                        </div>
                                                        <p class="my-2 font-weight-bold">Crear actividades para tus
                                                            grupos</p>
                                                        <p class="my-2">Asigna a tus estudiantes actividades
                                                            especificas de <strong>AccountCamp</strong> y luego sigue su
                                                            progreso.</p>
                                                        <button class="btn btn-3-ucamp mt-3" data-toggle="modal"
                                                            data-target="#modal-create-actividad" type="button">
                                                            <i class="fas fa-plus mr-2"></i> Crear actividad
                                                        </button>
                                                    </div>
                                                @endif
                                            </div>

                                            <!-- Tabla de actividades ARCHIVADAS -->
                                            <div class="tab-pane" id="archivadas">
                                                @if ($lessons && count($lessons) > 0)
                                                    @php
                                                        // Filtrar la colección original
                                                        $lessons_archivadas = $lessons->filter(function ($lesson_item) {
                                                            if ($lesson_item->is_archived == 1) {
                                                                return true;
                                                            } else {
                                                                return false;
                                                            }
                                                        });
                                                    @endphp
                                                    @if ($lessons_archivadas && count($lessons_archivadas) > 0)

                                                        <!-- Tabla de actividades -->
                                                        <table class="table-actividades table">
                                                            <thead>
                                                                <tr>
                                                                    <th width="8%">Tipo</th>
                                                                    <th>Nombre actividad</th>
                                                                    <th>Grupo</th>
                                                                    <th width="18%">Vencimiento</th>
                                                                    <th width="7%">Envios</th>
                                                                    <th width="7%">XP</th>
                                                                    <th width="18%" style="text-align: center;">Acciones</th>
                                                                </tr>
                                                            </thead>

                                                            <!-- Listado de grupos -->
                                                            <tbody>
                                                                @foreach ($lessons_archivadas as $lesson)
                                                                    <tr id="lesson-{{ $lesson->id }}">
                                                                        <td>
                                                                            <span class="text-muted">
                                                                                {{ strtoupper($lesson->type) }}
                                                                            </span>
                                                                        </td>
                                                                        <td>{{ $lesson->title }}</td>
                                                                        <td class="color-column">
                                                                            <div class="color-group mr-2"
                                                                                style="background-color: {{ $lesson->group->color }};">
                                                                            </div>
                                                                            {{ $lesson->group->name }}
                                                                        </td>
                                                                        <td><span
                                                                                class="text-muted">{{ \Carbon\Carbon::parse($lesson->expires_at)->format('d - M - Y h:i a') }}</span>
                                                                        </td>
                                                                        <td class="text-weight-bold">11</td>
                                                                        <td class="text-tint-2">
                                                                            {{ $lesson->points_xp }} XP</td>
                                                                        <td>
                                                                            <div class="content-btns">
                                                                                <!-- Botón eliminar -->
                                                                                <button
                                                                                    class="icon-button mr-2 btn-delete-lesson"
                                                                                    data-idlesson="{{ $lesson->id }}">
                                                                                    <i class="fas fa-trash"></i>
                                                                                    <span class="tool-tip">Eliminar</span>
                                                                                </button>

                                                                                <!-- Botón editar -->
                                                                                <button class="icon-button mr-2">
                                                                                    <i class="fas fa-edit"></i>
                                                                                    <span class="tool-tip">Editar</span>
                                                                                </button>

                                                                                <!-- Botón archivar -->
                                                                                <button class="icon-button mr-2">
                                                                                    <i class="fas fa-file-alt"></i>
                                                                                    <span class="tool-tip">Archivar</span>
                                                                                </button>

                                                                                <!-- Ver actividad -->
                                                                                <button class="icon-button mr-2">
                                                                                    <i class="fas fa-eye"></i>
                                                                                    <span class="tool-tip">Preview</span>
                                                                                </button>

                                                                                <!-- Ver resultados -->
                                                                                <button class="icon-button">
                                                                                    <i class="fas fa-tachometer-alt"></i>
                                                                                    <span class="tool-tip">Resultados</span>
                                                                                </button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    @else
                                                        <div class="no-items">
                                                            <div class="icon py-2">
                                                                <i class="fas fa-clipboard"></i>
                                                            </div>
                                                            <p class="my-2 font-weight-bold">Crear actividades para tus
                                                                grupos</p>
                                                            <p class="my-2">Asigna a tus estudiantes actividades
                                                                especificas de <strong>AccountCamp</strong> y luego
                                                                sigue su progreso.</p>
                                                            <button class="btn btn-3-ucamp mt-3" data-toggle="modal"
                                                                data-target="#modal-create-actividad" type="button">
                                                                <i class="fas fa-plus mr-2"></i> Crear actividad
                                                            </button>
                                                        </div>
                                                    @endif
                                                @else
                                                    <div class="no-items">
                                                        <div class="icon py-2">
                                                            <i class="fas fa-clipboard"></i>
                                                        </div>
                                                        <p class="my-2 font-weight-bold">Crear actividades para tus
                                                            grupos</p>
                                                        <p class="my-2">Asigna a tus estudiantes actividades
                                                            especificas de <strong>AccountCamp</strong> y luego sigue su
                                                            progreso.</p>
                                                        <button class="btn btn-3-ucamp mt-3" data-toggle="modal"
                                                            data-target="#modal-create-actividad" type="button">
                                                            <i class="fas fa-plus mr-2"></i> Crear actividad
                                                        </button>
                                                    </div>
                                                @endif
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>

        <!-- Main footer -->
        @include('curso.components.main-footer')

    </div>

    @include('components.footer')
