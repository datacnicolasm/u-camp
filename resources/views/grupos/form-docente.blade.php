@include('components.header')

<body class="layout-fixed">

    <div class="wrapper">

        <!-- Barra de navegacion superior -->
        @include('components.navbar')

        <!-- Barra de navegacion lateral -->
        @include('components.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <div class="container form-docente">

                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <h1 class="m-0">Solicitar cuenta docente</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="header-form-docente">
                                            <div class="icon py-2">
                                                <i class="fas fa-clipboard"></i>
                                            </div>
                                            <p class="my-2 font-weight-bold">¡Solicita tu cuenta docente!</p>
                                            <p class="my-2">Mejora el aprendizaje en tus clases gracias a los espacios interactivos de <strong>AccountCamp</strong>.</p>
                                        </div>

                                        <!-- Formulario de solicitud de cuenta docente -->
                                        <form class="mx-auto form-cuenta-docente" action="{{ route('crear-solicitud-docente') }}" method="POST">
                                            @csrf <!-- Token CSRF para protección -->
                                            <div class="form-group">
                                                
                                                <!-- Nombre de la institución educativa -->
                                                <div class="form-group">
                                                    <label class="mb-2">Nombre de la institución educativa</label>
                                                    <input type="text" class="form-control form-control-sm" id="nombre_institucion" name="nombre_institucion" placeholder="" required>
                                                </div>

                                                <!-- Pais de la institución -->
                                                <div class="form-group">
                                                    <label class="mb-2">Pais de la institución</label>
                                                    <input type="text" class="form-control form-control-sm" id="pais_docente" name="pais_docente" placeholder="" required>
                                                </div>

                                                <!-- Departamento de la institución -->
                                                <div class="form-group">
                                                    <label class="mb-2"> Departamento de la institución</label>
                                                    <input type="text" class="form-control form-control-sm" id="departamento_docente" name="departamento_docente" placeholder="" required>
                                                </div>

                                                <!-- Area del conocimiento -->
                                                <div class="form-group">
                                                    <label class="mb-2">Area del conocimiento</label>
                                                    <select class="form-control form-control-sm" id="conocimiento_docente" name="conocimiento_docente">
                                                        <option value="impuestos">Impuestos</option>
                                                        <option value="finanzas">Finanzas</option>
                                                        <option value="niif">NIIF</option>
                                                        <option value="auditoria">Auditoría</option>
                                                    </select>
                                                </div>

                                                <!-- Submit -->
                                                <div class="form-group d-flex justify-content-center mt-4">
                                                    <button type="submit" id="btn-form-docente" class="btn btn-sm btn-ucamp px-3 py-2">Enviar solicitud</button>
                                                </div>
                                            </div>
                                        </form>
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