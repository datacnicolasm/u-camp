@include('components.header')

<body class="layout-top-nav">

    <div class="wrapper">

        <div class="wrapper">

            <!-- Barra de navegacion superior -->
            @include('curso.components.navbar-curso')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-formularios">

                <!-- Header de formularios DIAN -->
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

                <!-- Contenido de campos del formulario -->
                <div id="workshop" data-cod-workshop="{{ $lesson->workshop->id }}" class="content-formulario">
                    <div class="accordion">
                        <!-- Datos Declarante -->
                        <h3 class="accordion-header">Datos Declarante<i class="fas fa-chevron-down arrow-icon"></i></h3>
                        <div class="accordion-content">
                            <div class="row">
                                <div class="col-5">
                                    <p class="border-title text-right m-0">SECCIÓN DATOS DEL DECLARANTE</p>
                                    <div class="content-right"></div>
                                </div>

                                <!-- Datos Declarante -->
                                <div class="col-7">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-10">
                                                <p class="label-input">5. Identificación Tributaria NIT</p>
                                                <input disabled type="text"
                                                    class="form-control"placeholder="900000001">
                                            </div>
                                            <div class="form-group col-2">
                                                <p class="label-input">6. DV</p>
                                                <input disabled type="text" class="form-control" placeholder="0">
                                            </div>
                                            <div class="form-group col-6">
                                                <p class="label-input">7. Primer apellido</p>
                                                <input disabled type="text" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group col-6">
                                                <p class="label-input">8. Segundo apellido</p>
                                                <input disabled type="text" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group col-6">
                                                <p class="label-input">9. Primer nombre</p>
                                                <input disabled type="text" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group col-6">
                                                <p class="label-input">10. Otros nombres</p>
                                                <input disabled type="text" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group col-10">
                                                <p class="label-input">11. Razón social</p>
                                                <input disabled type="text" class="form-control"
                                                    placeholder="EMPRESAS COMERCIALES DE COLOMBIA S.A.S">
                                            </div>
                                            <div class="form-group col-2">
                                                <p class="label-input">12. Cod</p>
                                                <input disabled type="text" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group col-6">
                                                <p class="label-input">24. Actividad Económica</p>
                                                <select disabled class="custom-select rounded-0">
                                                    <option>Actividad Económica</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-6">
                                                <p class="label-input">Si es una correccioón indique 25. Cod</p>
                                                <input disabled type="text" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group col-12">
                                                <p class="label-input">26. Nro. formulario anterior</p>
                                                <input disabled type="text" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group col-4">
                                                <p class="label-input">29. Fracción año gravable siguiente</p>
                                                <input type="checkbox">
                                            </div>
                                            <div class="form-group col-4">
                                                <p class="label-input">30. Renuncio a pertenecer al régimen tributario
                                                    especial</p>
                                                <input type="checkbox">
                                            </div>
                                            <div class="form-group col-4">
                                                <p class="label-input">31. Vinculado al pago de obras por impuestos</p>
                                                <input type="checkbox">
                                            </div>
                                            <div class="form-group col-12">
                                                <p class="label-input">163. Género</p>
                                                <select disabled class="custom-select rounded-0">
                                                    <option>No aplica</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        @foreach ($campos as $campo)
                            <!-- {{ $campo['title'] }} -->
                            <h3 class="accordion-header">{{ $campo['title'] }}<i
                                    class="fas fa-chevron-down arrow-icon"></i></h3>
                            <div class="accordion-content">
                                <div class="row">
                                    <div class="col-6">
                                        <p class="border-title text-right m-0">{{ $campo['description'] }}</p>
                                        <div class="content-right">
                                            <div class="content-notas-DIAN">
                                                @foreach ($campo['fields'] as $title => $field)
                                                    @if ($field['nota'])
                                                        <div class="item-nota" id="110-{{ $title }}">
                                                            <?php echo $field['nota']; ?>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <!-- {{ $campo['title'] }} -->
                                    <div class="col-6 py-3">
                                        <form>
                                            <div class="form-row">
                                                @foreach ($campo['fields'] as $title => $field)
                                                    <div class="form-group <?php echo $field['col-#']; ?>">
                                                        <p class="<?php echo $field['class']; ?> label-input"><?php echo $field['number'] . '. ' . $field['title']; ?>
                                                        </p>
                                                        <input id="input-{{ $title }}" <?php
                                                        $group_field = isset($field['group']) ? 'data-group-field="' . $field['group'] . '"' : '';
                                                        echo $group_field;
                                                        $disabled_field = isset($field['disabled']) ? 'disabled' : '';
                                                        echo $disabled_field;
                                                        ?>
                                                            data-cod-field="{{ $title }}"
                                                            data-section="{{ $campo['title'] }}"type="text"
                                                            class="form-control input-dian" placeholder="0">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!-- FRIMAS -->
                        <h3 class="accordion-header">Firmas<i class="fas fa-chevron-down arrow-icon"></i></h3>
                        <div class="accordion-content">
                            <div class="row">
                                <div class="col-6">
                                    <p class="border-title text-right m-0">SECCIÓN FIRMAS</p>
                                    <div class="content-right"></div>
                                </div>

                                <!-- FRIMAS -->
                                <div class="col-6">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-8">
                                                <p class="label-input">994. Con salvedades</p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btns-content">
                        <div class="btns-forms">
                            <div id="btn-resultados" class="mt-2 btn-form-dian">
                                <i class="fas fa-check-circle"></i>
                                <span class="help-msg">Ver calificación</span>
                            </div>
                            <div id="btn-send" class="mt-2 btn-form-dian">
                                <i class="fas fa-paper-plane"></i>
                                <span class="help-msg">Enviar ejercicio</span>
                            </div>
                        </div>
                        <div id="btn-show" class="mt-2 btn-form-dian">
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>
                </div>

                <!-- Contenido de campos del formulario -->
                @include('curso.dian-components.resultados-dian')

            </div>

            <!-- Barra de navegacion inferior -->
            @include('curso.components.footer-curso')

        </div>

    </div>

    @include('components.footer')
