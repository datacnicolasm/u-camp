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
                                    <button class="btn btn-ucamp btn-add-group" data-toggle="modal" data-target="#crear-modal" type="button">
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
                        <div class="modal fade" data-idgroup="0" id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Editar grupo de clase</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Nombre del grupo</label>
                                                    <input id="name"type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label>Color del grupo</label>
                                                <div class="my-2 content-colors">
                                                    <div class="color-circle">
                                                        <div class="color" data-hexcolor="#009fff" style="background-color: #009fff"></div>
                                                    </div>
                                                    <div class="color-circle">
                                                        <div class="color" data-hexcolor="#00ff58" style="background-color: #00ff58"></div>
                                                    </div>
                                                    <div class="color-circle">
                                                        <div class="color" data-hexcolor="#ff6000" style="background-color: #ff6000"></div>
                                                    </div>
                                                    <div class="color-circle">
                                                        <div class="color" data-hexcolor="#ff1818" style="background-color: #ff1818"></div>
                                                    </div>
                                                    <div class="color-circle">
                                                        <div class="color" data-hexcolor="#ff5ecf" style="background-color: #ff5ecf"></div>
                                                    </div>
                                                    <div class="color-circle">
                                                        <div class="color" data-hexcolor="#b531ff" style="background-color: #b531ff"></div>
                                                    </div>
                                                </div>
                                                <input id="color-group" type="text" class="form-control" style="display: none;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Cancelar</button>
                                        <button id="save-modal" type="button" class="btn btn-primary">Guardar cambios</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal para crear un grupo -->
                        <div class="modal fade" id="crear-modal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Crear grupo de clase</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Nombre del grupo</label>
                                                    <input id="name"type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label>Color del grupo</label>
                                                <div class="my-2 content-colors">
                                                    <div class="color-circle">
                                                        <div class="color" data-hexcolor="#009fff" style="background-color: #009fff"></div>
                                                    </div>
                                                    <div class="color-circle">
                                                        <div class="color" data-hexcolor="#00ff58" style="background-color: #00ff58"></div>
                                                    </div>
                                                    <div class="color-circle">
                                                        <div class="color" data-hexcolor="#ff6000" style="background-color: #ff6000"></div>
                                                    </div>
                                                    <div class="color-circle">
                                                        <div class="color" data-hexcolor="#ff1818" style="background-color: #ff1818"></div>
                                                    </div>
                                                    <div class="color-circle">
                                                        <div class="color" data-hexcolor="#ff5ecf" style="background-color: #ff5ecf"></div>
                                                    </div>
                                                    <div class="color-circle">
                                                        <div class="color" data-hexcolor="#b531ff" style="background-color: #b531ff"></div>
                                                    </div>
                                                </div>
                                                <input id="color-group" type="text" class="form-control" style="display: none;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Cancelar</button>
                                        <button id="create-modal" type="button" class="btn btn-primary">Crear grupo</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">

                                    <!-- Card header -->
                                    <div class="card-header py-3">
                                        <h3 class="card-title">Este es el listado de tus grupos</h3>
                                    </div>

                                    <!-- Card body -->
                                    <div class="card-body p-0">
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
                                            <tbody>
                                                <?php $list_groups = \App\Models\Group::getGroupsUser(Auth::user()); ?>
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
                                                                    <button data-idgroup="{{ $group->id }}" class="icon-button mr-3 btn-delete-group">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>

                                                                    <!-- Botón Editar Grupo -->
                                                                    <button data-toggle="modal" data-target="#edit-modal" type="button" data-idgroup="{{ $group->id }}" class="icon-button btn-edit-group">
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
