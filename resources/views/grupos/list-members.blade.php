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
        @include('grupos.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <div class="container list-members">

                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-6 title-members">
                                <span>Estuidantes /</span>
                                <div class="select-group ml-2">
                                    <div id="label-group">
                                        <span class="selected">Todos los grupos</span>
                                        <i class="fas fa-chevron-down icon"></i>
                                    </div>
                                    <ul class="select-options-group">
                                        <li class="item-list-group-all">
                                            <div style="background-color: #fff;" class="color-item"></div>
                                            <div class="ml-3 name-item">Todos los grupos</div>
                                        </li>

                                        <!-- Listado de grupos -->
                                        <?php $list_groups = \App\Models\Group::getGroupsUser(Auth::user()); ?>
                                        @if ($list_groups)
                                            @foreach ($list_groups as $group)
                                                <li data-color="{{ $group->color }}" data-idgroup="{{ $group->id }}"
                                                    class="item-list-group">
                                                    <div style="background-color: {{ $group->color }};"
                                                        class="color-item"></div>
                                                    <div class="ml-3 name-item">{{ $group->name }}</div>
                                                    <div class="ml-2 count-item">{{ '( ' . $group->users_count . ' )' }}
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex justify-content-end align-items-center">
                                <button class="btn btn-ucamp" type="button">
                                    <i class="mr-2 fas fa-link"></i> Crear link de invitacion
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">

                        <!-- Modal para eliminar de un gruppo -->
                        <div class="modal fade" data-idgroup="0" id="modal-delete-group" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Eliminar estudiante de grupo</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12">
                                                Seleccione el grupo del cual desea eliminar al estudiante:
                                                <div class="usuario font-weight-bold ml-3 my-3"></div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <select class="custom-select rounded-0" id="modal-group-select">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Cancelar</button>
                                        <button id="eliminar-btn-modal" type="button" class="btn btn-primary">Eliminar estudiante</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">

                                    <!-- Card header -->
                                    <div class="card-header py-3">
                                        <div class="row">
                                            <div class="col-5">Este es el listado de estudiantes que pertenecen a tus
                                                grupos.</div>
                                            <div class="col-7 tools-table">
                                                <button id="export-csv" class="btn btn-tool-table btn-sm"
                                                    type="button">
                                                    <i class="mr-2 fas fa-file-csv"></i>Exportar CSV
                                                </button>

                                                <button id="delete-group" class="btn btn-tool-table btn-sm mx-3"
                                                    type="button">
                                                    <i class="mr-2 fas fa-user-minus"></i>Eliminar del grupo
                                                </button>

                                                <div class="input-group input-group-sm" style="width: 200px;">
                                                    <input id="search-estudiantes" type="text" name="table_search"
                                                        class="form-control" placeholder="Search">

                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-default">
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card body -->
                                    <div class="card-body p-0">
                                        <div class="loading-overlay">
                                            <div class="content-loading">
                                                <i class="fas fa-spinner spinner"></i>
                                            </div>
                                        </div>
                                        <table class="table-estudiantes table">
                                            <thead>
                                                <tr>
                                                    <th style="width: 20px">
                                                        <input type="checkbox">
                                                    </th>
                                                    <th>Nombre del estudiante</th>
                                                    <th>Correo del estudiante</th>
                                                    <th>Grupos asignados</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $lis_estudiantes = \App\Models\Group::getUsersGroups(Auth::user()); ?>
                                                @if ($lis_estudiantes)
                                                    @foreach ($lis_estudiantes as $estudiante)
                                                        @php
                                                            $name_user =
                                                                $estudiante->first_name . ' ' . $estudiante->last_name;

                                                            $groupsToShow = $estudiante->group->slice(0, 2);
                                                            $remainingGroupsCount =
                                                                $estudiante->group->count() - $groupsToShow->count();

                                                            $array_groups = $estudiante->group->toArray();

                                                            $idArray = array_map(function ($obj) {
                                                                return $obj['id'];
                                                            }, $array_groups);

                                                            $idString = implode(',', $idArray);

                                                            $groupsArray = array_map(function ($obj) {
                                                                return $obj['name'];
                                                            }, $array_groups);

                                                            $groupsString = implode(',', $groupsArray);
                                                        @endphp
                                                        <tr data-sgroups="<?php echo htmlspecialchars($groupsString); ?>"
                                                            data-idgroups="<?php echo htmlspecialchars($idString); ?>"
                                                            data-iduser="{{ $estudiante->id }}"
                                                            data-nameuser="<?php echo $name_user; ?>"
                                                            data-emailuser="{{ $estudiante->email }}">
                                                            <td><input type="checkbox" class="single-checkbox"></td>
                                                            <td><?php echo $name_user; ?></td>
                                                            <td>{{ $estudiante->email }}</td>
                                                            <td>
                                                                @foreach ($groupsToShow as $group)
                                                                    <span
                                                                        style="background-color: {{ $group->color }};"
                                                                        data-idgroup="{{ $group->id }}"
                                                                        class="text-white badge-grupo badge">{{ $group->name }}</span>
                                                                @endforeach

                                                                @if ($remainingGroupsCount > 0)
                                                                    <span
                                                                        class="badge badge-info">+{{ $remainingGroupsCount }}</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>

    </div>

    @include('components.footer')
