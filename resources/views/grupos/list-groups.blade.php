@include('components.header')

<body class="sidebar-mini layout-fixed">

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

            <div class="container list-groups">

                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Grupos</h1>
                            </div>
                            <div class="col-sm-6">
                                <div class="float-sm-right">
                                    <button class="btn btn-ucamp btn-add-group" data-toggle="modal"
                                        data-target="#crear-modal" type="button">
                                        <i class="fas fa-plus"></i> Crear grupo
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">

                        <!-- Modal para editar un grupo -->
                        @include('grupos.modal.modal-edit-group')

                        <!-- Modal para crear un grupo -->
                        @include('grupos.modal.modal-create-group')

                        <div class="row">
                            <div class="col-12">
                                <div class="card">

                                    @php
                                        $list_groups = \App\Models\Group::getGroupsUser(Auth::user());
                                    @endphp

                                    @if (count($list_groups) == 0)
                                        <div class="card-body p-0">
                                            <div class="no-items">
                                                <div class="icon">
                                                    <i class="fas fa-users-slash"></i>
                                                </div>
                                                <div class="text">No tienes ningun grupo creado</div>
                                            </div>
                                        </div>
                                    @endif

                                    @if (count($list_groups) > 0)

                                        <!-- Card header -->
                                        <div class="card-header py-3">
                                            Este es el listado de tus grupos
                                        </div>

                                        <!-- Card body -->
                                        <div class="card-body p-0">
                                            <!-- Tabla de grupos -->
                                            <table class="table-groups table">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 20px">#</th>
                                                        <th style="width: 20px"></th>
                                                        <th>Nombre</th>
                                                        <th>Estudiantes</th>
                                                        <th style="width: 100px"></th>
                                                    </tr>
                                                </thead>

                                                <!-- Listado de grupos -->
                                                <tbody>
                                                    @if ($list_groups)
                                                        @foreach ($list_groups as $group)
                                                            <tr>
                                                                <td>{{ $group->id }}</td>
                                                                <td>
                                                                    <div class="color-group"
                                                                        style="background-color: {{ $group->color }};">
                                                                    </div>
                                                                </td>
                                                                <td>{{ $group->name }}</td>
                                                                <td>{{ $group->users_count }}</td>
                                                                <td>
                                                                    <div class="content-btns">
                                                                        <!-- Botón Eliminar Grupo -->
                                                                        <button data-idgroup="{{ $group->id }}"
                                                                            class="icon-button mr-3 btn-delete-group">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>

                                                                        <!-- Botón Editar Grupo -->
                                                                        <button data-toggle="modal"
                                                                            data-target="#edit-modal" type="button"
                                                                            data-idgroup="{{ $group->id }}"
                                                                            class="icon-button btn-edit-group">
                                                                            <i class="fas fa-edit"></i>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>

                                    @endif


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
