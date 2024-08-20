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

            <div class="container dashboard-container pt-4">

                <!-- Notificaciones -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            
                        </div>
                    </div>
                </div>

                <!-- Main content -->
                <section class="mt-3 content">
                    <div class="container-fluid">
                        <div class="row">
                        </div>
                    </div>
                </section>

            </div>

        </div>

        <!-- Main footer -->
        @include('curso.components.main-footer')

    </div>

    @include('components.footer')
