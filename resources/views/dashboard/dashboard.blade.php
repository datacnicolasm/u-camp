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
        @include('components.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Contenedor principal -->
            @include('components.wrapper')

        </div>

        <!-- Main footer -->
        @include('curso.components.main-footer')

    </div>

    @include('components.footer')
