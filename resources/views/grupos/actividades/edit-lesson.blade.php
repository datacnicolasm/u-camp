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

            <div class="container">

                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-12">
                                <h1 class="m-0">Edición de actividad</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">

                                <!-- Informacion general de actividad -->
                                <div class="card card-top-camp">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="general-info-lesson">
                                                    <h4 class="font-weight-bold">{{ $lesson->title }}</h4>
                                                    <span class="d-block text-muted">Tipo de actividad:
                                                        {{ strtoupper($lesson->type) }}</span>
                                                    <span class="d-block text-muted">Puntos: <span
                                                            class="text-tint-2 font-weight-bold">{{ $lesson->points_xp }}
                                                            XP</span></span>
                                                    <div class="row mt-3">
                                                        <div class="col-12">
                                                            <form class="form-edit-lesson" method="POST"
                                                                action="{{ route('form-edit-assignment', ['lesson' => $lesson->id]) }}">
                                                                @csrf <!-- Token CSRF para protección -->
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="mb-2">Titulo de la
                                                                                actividad</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-sm"
                                                                                id="titulo_actividad"
                                                                                name="titulo_actividad"
                                                                                value="{{ $lesson->title }}" required>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="mb-2">Tipo de
                                                                                actividad</label>
                                                                            <select class="form-control form-control-sm"
                                                                                id="tipo_actividad"
                                                                                name="tipo_actividad" disabled="true">
                                                                                <option value="dian">DIAN</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="mb-2">Grupo</label>
                                                                            <select class="form-control form-control-sm"
                                                                                id="grupo_id" name="grupo_id"
                                                                                disabled="true">
                                                                                <option
                                                                                    value="{{ $lesson->group->id }}">
                                                                                    {{ $lesson->group->name }}</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="mb-2">Orden</label>
                                                                            <input type="number"
                                                                                class="form-control form-control-sm"
                                                                                id="orden_actividad" name="orden"
                                                                                value="{{ $lesson->order }}">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="mb-2">Puntos XP</label>
                                                                            <input type="number"
                                                                                class="form-control form-control-sm"
                                                                                id="puntos_actividad" name="puntos_xp"
                                                                                value="{{ $lesson->points_xp }}">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Vencimiento:</label>
                                                                            <div class="form-group">
                                                                                <div class="input-group date"
                                                                                    id="datetime-edit"
                                                                                    data-datetime="{{ \Carbon\Carbon::parse($lesson->expires_at)->format('c') }}"
                                                                                    data-target-input="nearest">
                                                                                    <input type="text"
                                                                                        class="form-control form-control-sm datetimepicker-input"
                                                                                        id="vencimiento_actividad"
                                                                                        name="vencimiento"
                                                                                        data-target="#datetime-edit" />
                                                                                    <div class="input-group-append"
                                                                                        data-target="#datetime-edit"
                                                                                        data-toggle="datetimepicker">
                                                                                        <div class="input-group-text"><i
                                                                                                class="fa fa-calendar"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-3 col-12">
                                                                        <button type="submit" id="btn-edit-lesson"
                                                                            class="btn btn-sm btn-ucamp">
                                                                            <i class="fas fa-save mr-2"></i>Guardar
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Informacion general de Workshop -->
                                <div class="card" id="workshop-edit" data-cod-workshop="{{ $lesson->workshop->id }}">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5 class="title-section-card">Edición de actividad interactiva DIAN</h5>
                                            </div>
                                            <div class="col-12">
                                                <p class="mt-3 text-justify">Edita los siguientes campos para proporcionar el contexto y las indicaciones necesarias, de manera que el estudiante comprenda el propósito de la actividad e interiorice los conceptos.</p>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group accordion-camp">
                                                    <div class="header-edit-lesson">
                                                        Contexto del ejercicio
                                                        <i class="fas fa-chevron-down arrow-icon"></i>
                                                    </div>
                                                    <div class="body-edit-lesson">
                                                        <span class="text-muted text-justify">
                                                            <p>Es crucial que las actividades prácticas diseñadas para estudiantes universitarios en temas tributarios y contables vayan acompañadas de un contexto bien definido. Este contexto no solo facilita la comprensión del propósito de la actividad, sino que también posiciona al estudiante dentro de un entorno profesional realista, lo cual es esencial para su formación integral como futuros contadores y profesionales en finanzas.</p>
                                                            <p>Según teorías pedagógicas como las propuestas por autores como Lev Vygotsky y David Ausubel, el aprendizaje se potencia cuando se conecta con situaciones reales y significativas. Vygotsky, con su concepto de zona de desarrollo próximo, enfatiza que los estudiantes aprenden mejor cuando se les proporciona un contexto que los desafíe pero que esté al alcance de sus capacidades con la adecuada orientación. Asimismo, Ausubel sugiere que el aprendizaje significativo ocurre cuando los estudiantes pueden relacionar la nueva información con conocimientos previos en un contexto concreto.</p>
                                                            <p>La formulación de un contexto claro y aplicable en las actividades prácticas es una metodología constructivista que permite al estudiante construir conocimiento a partir de experiencias previas y aplicarlo en situaciones nuevas y reales. Este enfoque también está alineado con las teorías de John Dewey, quien propuso que el aprendizaje debe ser activo y conectado con la experiencia. La enseñanza a través de actividades prácticas no solo ayuda a los estudiantes a adquirir habilidades técnicas, sino también a desarrollar un pensamiento crítico y a enfrentar los desafíos del mundo profesional.</p>
                                                            <p>Por lo tanto, se recomienda a los docentes que formulen un contexto para cada actividad práctica que no solo describa la tarea, sino que también conecte al estudiante con el propósito profesional de la misma. Es importante que se pregunten: ¿Qué se espera que el estudiante aprenda con esta actividad? ¿Cómo se conecta esta actividad con situaciones reales que enfrentarán en su carrera profesional? La claridad y relevancia del contexto no solo contribuyen a un mejor entendimiento, sino que también motivan a los estudiantes a involucrarse activamente en el proceso de aprendizaje.</p>
                                                            <p class="font-weight-bold ">Ejemplo de texto para formular un contexto:</p>
                                                            <p class="font-italic">"En esta actividad, se te asignará la tarea de preparar la declaración de renta para personas jurídicas en Colombia. Este ejercicio te permitirá aplicar los conocimientos adquiridos en clase sobre la conciliación entre la información contable y tributaria, un proceso fundamental en la determinación de la renta líquida de una empresa. Debes tener en cuenta las Normas Internacionales de Información Financiera (NIIF), ya que la correcta aplicación de estas normas es esencial para identificar las diferencias que surgen en el marco técnico actual.</p>
                                                            <p class="font-italic">El objetivo de esta actividad es que adquieras experiencia práctica en el manejo de situaciones tributarias reales, lo cual es un aspecto crítico en la profesión contable. Considera los estados financieros suministrados, las normativas vigentes y las instrucciones dadas en clase. Esta actividad no solo te ayudará a consolidar tus conocimientos teóricos, sino que también te brindará una visión clara de las responsabilidades que asumirás como futuro contador en un entorno profesional.</p>
                                                            <p class="font-italic">Al finalizar esta actividad, habrás fortalecido tus habilidades en la interpretación y aplicación de normativas tributarias, y estarás mejor preparado para enfrentar los desafíos que conlleva el ejercicio de la contaduría pública en Colombia."</p>
                                                            <p class="font-weight-bold ">A continuación, formula el contexto para tu actividad:</p>
                                                        </span>
                                                        <textarea id="textarea-contexto" class="form-control">
                                                            @php
                                                            echo $lesson->workshop->context_workshop;
                                                            @endphp
                                                        </textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group accordion-camp">
                                                    <div class="header-edit-lesson">
                                                        Indicaciones del ejercicio
                                                        <i class="fas fa-chevron-down arrow-icon"></i>
                                                    </div>
                                                    <div class="body-edit-lesson">
                                                        <span class="text-muted text-justify">
                                                            <p>Es fundamental que las actividades prácticas diseñadas para estudiantes en el ámbito tributario y contable incluyan indicaciones detalladas que reflejen escenarios reales a los que se enfrentarán en su futura práctica profesional. Al proporcionar estas indicaciones, los docentes deben enfocarse en reproducir situaciones que representen la complejidad y los desafíos reales del campo tributario, permitiendo que los estudiantes no solo apliquen conceptos teóricos, sino que también desarrollen un pensamiento crítico y habilidades para la resolución de problemas.</p>
                                                            <p>En la práctica profesional, los contadores deben considerar múltiples variables y normativas que pueden afectar el resultado de un proceso tributario. La inclusión de elementos como activos fijos, ganancias ocasionales, sanciones por presentación extemporánea, y la correcta valoración de los costos históricos de los activos son cruciales para reflejar la realidad de la labor contable y tributaria. Estos detalles no solo enriquecen la actividad, sino que también preparan a los estudiantes para las complejidades de la legislación tributaria y las diversas situaciones que pueden surgir en su ejercicio profesional.</p>
                                                            <p>Al formular estas indicaciones, los docentes deben utilizar su experiencia profesional para crear escenarios que sean lo más realistas posible. Esto ayudará a los estudiantes a entender la importancia de cada detalle y a visualizar el impacto de sus decisiones en un contexto profesional real. Además, permitirá que los estudiantes experimenten de primera mano cómo se aplican las normativas tributarias en situaciones prácticas, facilitando un aprendizaje más profundo y significativo.</p>
                                                            <p class="font-weight-bold ">Ejemplo de texto:</p>
                                                            <p class="font-italic">"En esta actividad, se te asignará la tarea de preparar la declaración de renta para una empresa, con especial atención en los activos fijos reportados en los estados financieros. Debes verificar la correcta aplicación de las ganancias ocasionales derivadas de la venta de activos por un valor de $150,000,000. Estos activos, con un costo en libros de $70,000,000, fueron adquiridos por la empresa hace 3 años, por lo que es fundamental considerar la normativa aplicable para calcular la ganancia ocasional y su impacto en la declaración.</p>
                                                            <p class="font-italic">Además, la empresa presenta la declaración con tres meses de retraso respecto a la fecha límite del 23 de marzo, lo que implica una sanción por declaración extemporánea. Es importante que apliques correctamente las disposiciones legales para calcular esta sanción y que la incluyas en la declaración final. La precisión en estos cálculos y en la aplicación de la normativa tributaria es esencial para asegurar que la empresa cumpla con sus obligaciones fiscales."</p>
                                                            <p class="font-weight-bold ">A continuación, formula las indicaciones para tu actividad:</p>
                                                        </span>
                                                        <textarea id="textarea-indicaciones" class="form-control">
                                                            @php
                                                            echo $lesson->workshop->indicaciones_workshop;
                                                            @endphp
                                                        </textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group accordion-camp">
                                                    <div class="header-edit-lesson">
                                                        Formulario 110
                                                        <i class="fas fa-chevron-down arrow-icon"></i>
                                                    </div>
                                                    <div class="body-edit-lesson">
                                                        <span class="text-muted text-justify">
                                                            <p>Los campos del formulario serán verificados en comparación con los diligenciados por los estudiantes, para brindarles una retroalimentación inmediata. Esto les permitirá evaluar sus falencias y volver a intentar la actividad.</p>
                                                            <p class="font-weight-bold ">A continuación, diligencie los campos del formulario de la DIAN:</p>
                                                        </span>
                                                        <div class="accordion-dian">
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
                                                                                                class="form-control input-dian" value="{{ $field['val_input'] }}">
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
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3 col-12">
                                                <button id="btn-edit-workshop"
                                                    class="btn btn-sm btn-ucamp">
                                                    <i class="fas fa-save mr-2"></i>Guardar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Informacion de EEFF -->
                                <div class="card" id="statement-edit">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5 class="title-section-card">Edición de estados financieros para actividad DIAN</h5>
                                            </div>
                                            <div class="col-12">
                                                <p class="mt-3 text-justify">Dado que la declaración de renta para empresas exige el uso de estados financieros y la depuración de los valores fiscales tanto de la situación financiera como del estado de resultados, en esta sección te invitamos a preparar los estados financieros que los estudiantes utilizarán para desarrollar la actividad.</p>
                                            </div>
                                            <div class="col-12">

                                                <!-- Estado de Situación Financiera -->
                                                <div class="form-group accordion-camp">
                                                    <div class="header-edit-lesson">
                                                        Estado de Situación Financiera
                                                        <i class="fas fa-chevron-down arrow-icon"></i>
                                                    </div>
                                                    <div class="body-edit-lesson">
                                                        <div class="eeff-lesson">
                                                            <p class="subtle-title text-center my-1">EMPRESAS COMERCIALES DE COLOMBIA S.A.S</p>
                                                            <p class="subtle-title text-center my-1">Nit: 900.000.001-0</p>
                                                            <p class="subtle-title text-center my-1"><strong>Estado de Situación Financiera</strong></p>
                                                            <p class="subtle-title text-center my-1">Saldos a 31 de Diciembre de {{ $lesson->workshop->year_form }}</p>

                                                            <table class="table financial-table">
                                                                @php
                                                                    $color_row = "#e2efff";
                                                                @endphp
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th width="80px"></th>
                                                                        <th width="170px" class="text-center">Valor (COP)</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>

                                                            <!-- Accordion activos -->
                                                            <div class="container-fluid">
                                                                <div class="eeff-accordion row">
                                                                    <div class="eeff-header col-12">
                                                                        <strong>Activos</strong>
                                                                        <i class="fas fa-chevron-down arrow-icon"></i>
                                                                    </div>
                                                                    <div class="eeff-body col-12">
                                                                        <table class="table financial-table">
                                                                            <tbody>            
                                                                                <!-- Activos corrientes -->
                                                                                @if ($statement_entries && count($statement_entries) > 0)
                                                                                    @php
                                                                                        $sum_activos_corrientes = 0;
                                                                                        // Filtrar la colección original
                                                                                        $entries_assets = $statement_entries->filter(function ($statement_entry) {
                                                                                            if (
                                                                                                $statement_entry->entry->sub_type_group == 'current-assets'
                                                                                            ) {
                                                                                                return true;
                                                                                            } else {
                                                                                                return false;
                                                                                            }
                                                                                        });
            
                                                                                        // Filtrar la coleccion de entries
                                                                                        $entries_current_assets = $entries_table->filter(function ($entry_t) {
                                                                                            if (
                                                                                                $entry_t->sub_type_group == 'current-assets'
                                                                                            ) {
                                                                                                return true;
                                                                                            } else {
                                                                                                return false;
                                                                                            }
                                                                                        });
                                                                                    @endphp
                                                                                    @foreach ($entries_assets as $item)
                                                                                        @php
                                                                                            $sum_activos_corrientes += $item->value;
                                                                                        @endphp
                                                                                        <tr class="line-item-statement">
                                                                                            <td class="name_es">
                                                                                                <select disabled="true" name="entry_id" class="form-control form-control-sm entry-select">
                                                                                                    @foreach( $entries_current_assets as $entri_t )
                                                                                                        <option value="{{ $entri_t->id }}"
                                                                                                            {{ $entri_t->id == $item->entry->id ? 'selected' : '' }}>
                                                                                                            {{ $entri_t->name_es }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </td>
                                                                                            <!-- Contenedor de botones -->
                                                                                            @include('grupos.actividades.edit-lesson.btns-entry')
                                                                                            <td  width="170px" class="text-right value-entry">
                                                                                                <input disabled="true" type="text" class="form-control form-control-sm input-dian" value="{{ $item->value }}">
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endforeach
                                                                                    <tr>
                                                                                        <td style="background-color: {{$color_row}};" class="total-eeff"><strong>Total Activos Corrientes</strong></td>
                                                                                        <td style="background-color: {{$color_row}};"></td>
                                                                                        <td style="background-color: {{$color_row}};" class="text-right value-entry">
                                                                                            <input disabled="true" type="text" class="form-control form-control-sm input-dian float-right" value="{{ $sum_activos_corrientes }}">
                                                                                        </td>
                                                                                    </tr>
                                                                                @endif
            
                                                                                <!-- Activos NO corrientes -->
                                                                                @if ($statement_entries && count($statement_entries) > 0)
                                                                                    @php
                                                                                        $sum_activos_nocorrientes = 0;
                                                                                        // Filtrar la colección original
                                                                                        $entries_assets_nocorrientes = $statement_entries->filter(function ($statement_entry) {
                                                                                            if (
                                                                                                $statement_entry->entry->sub_type_group == 'non-current-assets'
                                                                                            ) {
                                                                                                return true;
                                                                                            } else {
                                                                                                return false;
                                                                                            }
                                                                                        });
            
                                                                                        // Filtrar la coleccion de entries
                                                                                        $entries_noncurrent_assets = $entries_table->filter(function ($entry_t) {
                                                                                            if (
                                                                                                $entry_t->sub_type_group == 'non-current-assets'
                                                                                            ) {
                                                                                                return true;
                                                                                            } else {
                                                                                                return false;
                                                                                            }
                                                                                        });
                                                                                    @endphp
                                                                                    @foreach ($entries_assets_nocorrientes as $item)
                                                                                        @php
                                                                                            $sum_activos_nocorrientes += $item->value;
                                                                                        @endphp
                                                                                        <tr class="line-item-statement">
                                                                                            <td class="name_es">
                                                                                                <select disabled="true" name="entry_id" class="form-control form-control-sm entry-select">
                                                                                                    @foreach( $entries_noncurrent_assets as $entri_t )
                                                                                                        <option value="{{ $entri_t->id }}"
                                                                                                            {{ $entri_t->id == $item->entry->id ? 'selected' : '' }}>
                                                                                                            {{ $entri_t->name_es }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </td>
                                                                                            <!-- Contenedor de botones -->
                                                                                            @include('grupos.actividades.edit-lesson.btns-entry')
                                                                                            <td  width="170px" class="text-right value-entry">
                                                                                                <input disabled="true" type="text" class="form-control form-control-sm input-dian" value="{{ $item->value }}">
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endforeach
                                                                                    <tr>
                                                                                        <td style="background-color: {{$color_row}};" class="total-eeff"><strong>Total Activos No Corrientes</strong></td>
                                                                                        <td style="background-color: {{$color_row}};"></td>
                                                                                        <td style="background-color: {{$color_row}};" class="text-right value-entry">
                                                                                            <input disabled="true" type="text" class="form-control form-control-sm input-dian float-right" value="{{ $sum_activos_nocorrientes }}">
                                                                                        </td>
                                                                                    </tr>
                                                                                @endif
                                                                                
                                                                                <!-- Total activos -->
                                                                                <tr>
                                                                                    <td style="background-color: {{$color_row}};" class="total-eeff"><strong>Total Activos</strong></td>
                                                                                    <td style="background-color: {{$color_row}};"></td>
                                                                                    <td style="background-color: {{$color_row}};" class="text-right value-entry">
                                                                                        <input disabled="true" type="text" class="form-control form-control-sm input-dian float-right" value="{{ $sum_activos_nocorrientes + $sum_activos_corrientes }}">
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <!-- Accordion pasivos -->
                                                            <div class="container-fluid">
                                                                <div class="eeff-accordion row">
                                                                    <div class="eeff-header col-12">
                                                                        <strong>Pasivos</strong>
                                                                        <i class="fas fa-chevron-down arrow-icon"></i>
                                                                    </div>
                                                                    <div class="eeff-body col-12">
                                                                        <table class="table financial-table">
                                                                            <tbody>
            
                                                                                <!-- Total Pasivos Corrientes -->
                                                                                @if ($statement_entries && count($statement_entries) > 0)
                                                                                    @php
                                                                                        $sum_pasivos_corrientes = 0;
                                                                                        // Filtrar la colección original
                                                                                        $entries_pasivos_corrientes = $statement_entries->filter(function ($statement_entry) {
                                                                                            if (
                                                                                                $statement_entry->entry->sub_type_group == 'current-liabilities'
                                                                                            ) {
                                                                                                return true;
                                                                                            } else {
                                                                                                return false;
                                                                                            }
                                                                                        });
            
                                                                                         // Filtrar la coleccion de entries
                                                                                         $entries_current_pasivos = $entries_table->filter(function ($entry_t) {
                                                                                            if (
                                                                                                $entry_t->sub_type_group == 'current-liabilities'
                                                                                            ) {
                                                                                                return true;
                                                                                            } else {
                                                                                                return false;
                                                                                            }
                                                                                        });
                                                                                    @endphp
                                                                                    @foreach ($entries_pasivos_corrientes as $item)
                                                                                        @php
                                                                                            $sum_pasivos_corrientes += $item->value;
                                                                                        @endphp
                                                                                        <tr class="line-item-statement">
                                                                                            <td class="name_es">
                                                                                                <select disabled="true" name="entry_id" class="form-control form-control-sm entry-select">
                                                                                                    @foreach( $entries_current_pasivos as $entri_t )
                                                                                                        <option value="{{ $entri_t->id }}"
                                                                                                            {{ $entri_t->id == $item->entry->id ? 'selected' : '' }}>
                                                                                                            {{ $entri_t->name_es }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </td>
                                                                                            <!-- Contenedor de botones -->
                                                                                            @include('grupos.actividades.edit-lesson.btns-entry')
                                                                                            <td width="170px" class="text-right value-entry">
                                                                                                <input disabled="true" type="text" class="form-control form-control-sm input-dian" value="{{ $item->value }}">
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endforeach
                                                                                    <tr>
                                                                                        <td style="background-color: {{$color_row}};" class="total-eeff"><strong>Total Pasivos Corrientes</strong></td>
                                                                                        <td style="background-color: {{$color_row}};"></td>
                                                                                        <td style="background-color: {{$color_row}};" class="text-right value-entry">
                                                                                            <input disabled="true" type="text" class="form-control form-control-sm input-dian float-right" value="{{ $sum_pasivos_corrientes }}">
                                                                                        </td>
                                                                                    </tr>    
                                                                                @endif
            
                                                                                <!-- Total Pasivos No Corrientes -->
                                                                                @if ($statement_entries && count($statement_entries) > 0)
                                                                                    @php
                                                                                        $sum_pasivos_nocorrientes = 0;
                                                                                        // Filtrar la colección original
                                                                                        $entries_pasivos_nocorrientes = $statement_entries->filter(function ($statement_entry) {
                                                                                            if (
                                                                                                $statement_entry->entry->sub_type_group == 'non-current-liabilities'
                                                                                            ) {
                                                                                                return true;
                                                                                            } else {
                                                                                                return false;
                                                                                            }
                                                                                        });
            
                                                                                        // Filtrar la coleccion de entries
                                                                                        $entries_noncurrent_pasivos = $entries_table->filter(function ($entry_t) {
                                                                                            if (
                                                                                                $entry_t->sub_type_group == 'non-current-liabilities'
                                                                                            ) {
                                                                                                return true;
                                                                                            } else {
                                                                                                return false;
                                                                                            }
                                                                                        });
                                                                                    @endphp
                                                                                    @foreach ($entries_pasivos_nocorrientes as $item)
                                                                                        @php
                                                                                            $sum_pasivos_nocorrientes += $item->value;
                                                                                        @endphp
                                                                                        <tr class="line-item-statement">
                                                                                            <td class="name_es">
                                                                                                <select disabled="true" name="entry_id" class="form-control form-control-sm entry-select">
                                                                                                    @foreach( $entries_noncurrent_pasivos as $entri_t )
                                                                                                        <option value="{{ $entri_t->id }}"
                                                                                                            {{ $entri_t->id == $item->entry->id ? 'selected' : '' }}>
                                                                                                            {{ $entri_t->name_es }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </td>
                                                                                            <!-- Contenedor de botones -->
                                                                                            @include('grupos.actividades.edit-lesson.btns-entry')
                                                                                            <td width="170px" class="text-right value-entry">
                                                                                                <input disabled="true" type="text" class="form-control form-control-sm input-dian" value="{{ $item->value }}">
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endforeach
                                                                                    <tr>
                                                                                        <td style="background-color: {{$color_row}};" class="total-eeff"><strong>Total Pasivos No Corrientes</strong></td>
                                                                                        <td style="background-color: {{$color_row}};"></td>
                                                                                        <td style="background-color: {{$color_row}};" class="text-right value-entry">
                                                                                            <input disabled="true" type="text" class="form-control form-control-sm input-dian float-right" value="{{ $sum_pasivos_nocorrientes }}">
                                                                                        </td>
                                                                                    </tr>    
                                                                                @endif
            
                                                                                <!-- Total pasivos -->
                                                                                <tr>
                                                                                    <td style="background-color: {{$color_row}};" class="total-eeff"><strong>Total Pasivos</strong></td>
                                                                                    <td style="background-color: {{$color_row}};"></td>
                                                                                    <td style="background-color: {{$color_row}};" class="text-right value-entry">
                                                                                        <input disabled="true" type="text" class="form-control form-control-sm input-dian float-right" value="{{ $sum_pasivos_corrientes + $sum_pasivos_nocorrientes }}">
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Accordion patrimonio -->
                                                            <div class="container-fluid">
                                                                <div class="eeff-accordion row">
                                                                    <div class="eeff-header col-12">
                                                                        <strong>Patrimonio</strong>
                                                                        <i class="fas fa-chevron-down arrow-icon"></i>
                                                                    </div>
                                                                    <div class="eeff-body col-12">
                                                                        <table class="table financial-table">
                                                                            <tbody>
            
                                                                                <!-- Patrimonio -->
                                                                                @if ($statement_entries && count($statement_entries) > 0)
                                                                                    @php
                                                                                        $sum_equity = 0;
                                                                                        // Filtrar la colección original
                                                                                        $entries_equity = $statement_entries->filter(function ($statement_entry) {
                                                                                            if (
                                                                                                $statement_entry->entry->type_group == 'equity'
                                                                                            ) {
                                                                                                return true;
                                                                                            } else {
                                                                                                return false;
                                                                                            }
                                                                                        });

                                                                                         // Filtrar la coleccion de entries
                                                                                         $entries_equity_st = $entries_table->filter(function ($entry_t) {
                                                                                            if (
                                                                                                $entry_t->type_group == 'equity'
                                                                                            ) {
                                                                                                return true;
                                                                                            } else {
                                                                                                return false;
                                                                                            }
                                                                                        });
                                                                                    @endphp
                                                                                    @foreach ($entries_equity as $item)
                                                                                        @php
                                                                                            $sum_equity += $item->value;
                                                                                        @endphp
                                                                                        <tr class="line-item-statement">
                                                                                            <td class="name_es">
                                                                                                <select disabled="true" name="entry_id" class="form-control form-control-sm entry-select">
                                                                                                    @foreach( $entries_equity_st as $entri_t )
                                                                                                        <option value="{{ $entri_t->id }}"
                                                                                                            {{ $entri_t->id == $item->entry->id ? 'selected' : '' }}>
                                                                                                            {{ $entri_t->name_es }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </td>
                                                                                            <!-- Contenedor de botones -->
                                                                                            @include('grupos.actividades.edit-lesson.btns-entry')
                                                                                            <td width="170px" class="text-right value-entry">
                                                                                                <input disabled="true" type="text" class="form-control form-control-sm input-dian" value="{{ $item->value }}">
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endforeach
                                                                                    <!-- Total patrimonio -->
                                                                                    <tr>
                                                                                        <td style="background-color: {{$color_row}};" class="total-eeff"><strong>Total Patrimonio</strong></td>
                                                                                        <td style="background-color: {{$color_row}};"></td>
                                                                                        <td style="background-color: {{$color_row}};" class="text-right value-entry">
                                                                                            <input disabled="true" type="text" class="form-control form-control-sm input-dian float-right" value="{{ $sum_equity }}">
                                                                                        </td>
                                                                                    </tr>    
                                                                                @endif
            
                                                                                <!-- Total Pasivos y Patrimonio -->
                                                                                <tr>
                                                                                    <td style="background-color: {{$color_row}};" class="total-eeff"><strong>Total Pasivos y Patrimonio</strong></td>
                                                                                    <td style="background-color: {{$color_row}};"></td>
                                                                                    <td style="background-color: {{$color_row}};" class="text-right value-entry">
                                                                                        <input disabled="true" type="text" class="form-control form-control-sm input-dian float-right" value="{{ $sum_equity + $sum_pasivos_corrientes + $sum_pasivos_nocorrientes }}">
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Estado de Resultados Integral -->
                                                <div class="form-group accordion-camp">
                                                    <div class="header-edit-lesson">
                                                        Estado de Resultados Integral
                                                        <i class="fas fa-chevron-down arrow-icon"></i>
                                                    </div>
                                                    <div class="body-edit-lesson">
                                                        <div class="eeff-lesson">
                                                            <p class="subtle-title text-center my-1">EMPRESAS COMERCIALES DE COLOMBIA S.A.S</p>
                                                            <p class="subtle-title text-center my-1">Nit: 900.000.001-0</p>
                                                            <p class="subtle-title text-center my-1"><strong>Estado de Resultados Integral</strong></p>
                                                            <p class="subtle-title text-center my-1">Saldos a 31 de Diciembre de {{ $lesson->workshop->year_form }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Informacion de articulos y leyes -->
                                <div class="card" id="laws-edit">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5 class="title-section-card">Edición de normativa relacionada con actividad DIAN</h5>
                                            </div>
                                        </div>
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
