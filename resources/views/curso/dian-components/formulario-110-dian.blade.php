@include('components.header')

<body class="layout-top-nav">

    <div class="wrapper">

        <div class="wrapper">

            <!-- Barra de navegacion superior -->
            @include('curso.components.navbar-curso')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-formularios">            
                <!-- -->
                @include('curso.dian-components.header-dian')

                <!-- Paneles laterales -->
                <div id="left-panel" class="side-panel">
                    <!-- -->
                    @include('curso.dian-components.left-panel')
                </div>
                <div id="right-panel" class="side-panel">
                    <!-- -->
                    @include('curso.dian-components.right-panel')
                </div>

                 <!-- Botones para mostrar paneles -->
                 <button id="left-panel-btn" class="panel-btn left-btn">
                    <i class="fas fa-arrow-right"></i>
                    <span class="panel-btn-text">Ver estados financieros</span>
                </button>
                <button id="right-panel-btn" class="panel-btn right-btn">
                    <i class="fas fa-arrow-left"></i>
                    <span class="panel-btn-text">Ver instrucciones</span>
                </button>
            
                <!-- -->
                <div class="content-formulario">
                    <div class="accordion">
                        <h3 class="accordion-header">Sección 1 <i class="fas fa-chevron-down arrow-icon"></i></h3>
                        <div class="accordion-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <p class="label-input">Input 1</p>
                                                <input type="text" class="form-control" id="input1" placeholder="Input 1">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <p class="label-input">Input 1</p>
                                                <input type="text" class="form-control" id="input2" placeholder="Input 2">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="border-title">Título</h4>
                                    <div class="content-right"></div>
                                </div>
                            </div>
                        </div>
                        <h3 class="accordion-header">Sección 2 <i class="fas fa-chevron-down arrow-icon"></i></h3>
                        <div class="accordion-content">
                            <p>Contenido de la sección 2.</p>
                        </div>
                        <h3 class="accordion-header">Sección 3 <i class="fas fa-chevron-down arrow-icon"></i></h3>
                        <div class="accordion-content">
                            <p>Contenido de la sección 3.</p>
                        </div>
                    </div>
                </div>
                
            </div>

            <!-- Barra de navegacion inferior -->
            @include('curso.components.footer-curso')

        </div>

    </div>

    @include('components.footer')