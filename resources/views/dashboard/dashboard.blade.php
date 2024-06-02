@include('components.header')

<body>

    <div class="wrapper">

        <!-- Barra de navegacion superior -->
        @include('components.navbar')

        <!-- Barra de navegacion lateral -->
        @include('components.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Contenedor principal -->
            @include('components.wrapper')

        </div>

    </div>

    @include('components.footer')
