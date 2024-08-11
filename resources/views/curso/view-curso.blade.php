@include('components.header')

<body class="layout-top-nav">

    <div class="wrapper">

        <div class="wrapper">

            <!-- Barra de navegacion superior -->
            @include('curso.components.navbar-curso')

            <div class="content-type-lesson">
                <!-- Content Wrapper. Contains page content -->
                @if ( $lesson->type == 'video' )
                    @include('curso.components.video-curso')
                @elseif ( $lesson->type == 'questionnaire' )
                    @include('curso.components.cuestionario-curso')
                @elseif ( $lesson->type == 'interactive' )
                    @include('curso.interactivo.interactivo-curso')
                @elseif ( $lesson->type == 'dian' )
                    @include('curso.dian-components.formularios-dian')
                @endif
            </div>

            <!-- Barra de navegacion inferior -->
            @include('curso.components.footer-curso')

        </div>

    </div>

    @include('components.footer')