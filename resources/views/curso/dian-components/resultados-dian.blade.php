<div class="container-resultados-DIAN">
    <div class="container" id="card-resultados">
        <div class="row">
            <div class="col-12 pb-3">
                <div class="card card-resultados">

                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#resultados"
                                    data-toggle="tab">Calificación</a></li>
                            <li class="nav-item"><a class="nav-link" href="#formulario" data-toggle="tab">Formulario</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body card-body-resultados">

                        <div class="tab-content">

                            <!-- Calificacion de ejercicio -->
                            <div class="active tab-pane" id="resultados">
                                <div class="row">

                                    <div class="col-4">
                                        <div class="card card-resultados card-left m-0">
                                            <div class="card-body">
                                                <p class="font-weight-bold my-2 text-center">Resultados generales - Formulario 110</p>
                                                <div style="width: 80%; margin: auto;">
                                                    <canvas id="progress-circle"></canvas>
                                                </div>
                                                <div class="table-general mt-4 p-2">
                                                    <div class="item-general aciertos">
                                                        <div class="icon-general">
                                                            <i class="fas fa-check-circle"></i>
                                                        </div>
                                                        <p class="m-0">75</p>
                                                        <span class="text-muted">
                                                            Aciertos
                                                        </span>
                                                    </div>
                                                    <div class="item-general errores">
                                                        <div class="icon-general">
                                                            <i class="fas fa-times-circle"></i>
                                                        </div>
                                                        <p class="m-0">75</p>
                                                        <span class="text-muted">
                                                            Errores
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-8">
                                        <div class="card card-resultados card-right m-0">
                                            <div class="card-body">
                                                <p class="font-weight-bold my-2">Resultados especificos:</p>
                                                <table class="table table-especificos">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 10px">#</th>
                                                            <th>Seccion</th>
                                                            <th>Calificacion</th>
                                                            <th style="width: 60px">Puntaje</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="body-resultados">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- Formulario generado -->
                            <div class="tab-pane" id="formulario">
                                <div class="container-fluid content-formulario-generate pb-2">
                                    <div class="row">
                                        <div class="col-2 casilla-general-dian logo-dian-form">
                                            <div class="logo-dian-form">
                                                <span class="u-logo">Account</span>
                                                <span class="camp-logo">Camp</span>
                                            </div>
                                        </div>
                                        <div class="col-8 casilla-general-dian text-center title-dian px-4 py-2">
                                            Declaración de renta y complementario para personas jurídicas y asimiladas y
                                            personas naturales y asimiladas no residentes y sucesiones ilíquidas de
                                            causantes no residentes o de ingresos y patrimonio para entidades obligadas
                                            a declarar
                                        </div>
                                        <div class="col-2 casilla-general-dian number-dian">
                                            <span>110</span>
                                        </div>
                                        <div class="col-6 casilla-general-dian">
                                            <div class="row">
                                                <div class="col-4 year-input-space">
                                                    <span class="input-year-dian mr-2">
                                                        1. Año
                                                    </span>
                                                    <div class="cuadro-input-dian"></div>
                                                    <div class="cuadro-input-dian"></div>
                                                    <div class="cuadro-input-dian"></div>
                                                    <div class="cuadro-input-dian"></div>
                                                </div>
                                                <div class="col-8 year-input-space">
                                                    <span class="input-year-dian mr-2">
                                                        29. Fracción año gravable siguiente
                                                    </span>
                                                    <div class="cuadro-input-dian"></div>
                                                </div>
                                                <div class="col-12 mt-3 mb-5">
                                                    Espacio reservado para la DIAN
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 casilla-general-dian pb-5">
                                            4. Número de formulario
                                        </div>
                                        <div class="col-12 content-info-sect">
                                            <div class="row">
                                                <div class="col-1 casilla-general-dian casilla-verticla-text-dian">
                                                    <div class="verticla-text-dian">
                                                        <span>
                                                            Datos del <br> declarante
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-11 info-text-dian">
                                                    <div class="row">
                                                        <div class="col-3 casilla-general-dian">
                                                            <div class="row">
                                                                <div class="col-9">
                                                                    <div class="label-dian-info-form">
                                                                        5. NIT
                                                                    </div>
                                                                    <div
                                                                        class="input-dian-info-form input-dian-info-form-1 font-weight-bold">
                                                                        900000000
                                                                    </div>
                                                                </div>
                                                                <div class="col-3">
                                                                    <div class="label-dian-info-form">
                                                                        6. DV
                                                                    </div>
                                                                    <div
                                                                        class="input-dian-info-form input-dian-info-form font-weight-bold">
                                                                        0
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-9 casilla-general-dian">
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <div class="label-dian-info-form">
                                                                        7. Primer apellido
                                                                    </div>
                                                                    <div
                                                                        class="input-dian-info-form input-dian-info-form-1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-3">
                                                                    <div class="label-dian-info-form">
                                                                        8. Segundo apellido
                                                                    </div>
                                                                    <div
                                                                        class="input-dian-info-form input-dian-info-form-1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-3">
                                                                    <div class="label-dian-info-form">
                                                                        9. Primer nombre
                                                                    </div>
                                                                    <div
                                                                        class="input-dian-info-form input-dian-info-form-1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-3">
                                                                    <div class="label-dian-info-form">
                                                                        10. Otros nombres
                                                                    </div>
                                                                    <div
                                                                        class="input-dian-info-form input-dian-info-form">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-8 casilla-general-dian">
                                                            <div class="label-dian-info-form">
                                                                11. Razón social
                                                            </div>
                                                            <div
                                                                class="input-dian-info-form input-dian-info-form font-weight-bold">
                                                                EMPRESAS COMERCIALES DE COLOMBIA SAS
                                                            </div>
                                                        </div>
                                                        <div class="col-2 casilla-general-dian">
                                                            <div class="label-dian-info-form">
                                                                12. Cod. Seccional
                                                            </div>
                                                            <div class="input-dian-info-form input-dian-info-form">
                                                            </div>
                                                        </div>
                                                        <div class="col-2 casilla-general-dian">
                                                            <div class="label-dian-info-form">
                                                                24. Actividad
                                                            </div>
                                                            <div class="input-dian-info-form input-dian-info-form">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 casilla-general-dian">
                                            <div class="row">
                                                <div class="col-1">
                                                    Datos informativos
                                                </div>
                                                <div class="col-11 py-1">
                                                    <dis class="row">
                                                        <div class="col-4">
                                                            <div class="row">
                                                                <dis class="col-6">33. Total costos y gastos de nómina
                                                                </dis>
                                                                <dis id="form-001" class="col-6 value-info-dian font-weight-bold">0</dis>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="row">
                                                                <dis class="col-6">34. Aportes de seguridad social
                                                                </dis>
                                                                <dis id="form-002" class="col-6 value-info-dian font-weight-bold">0</dis>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="row">
                                                                <dis class="col-6">35. Aportes al SENA, ICBF, caja de
                                                                    compensacion</dis>
                                                                <dis id="form-003" class="col-6 value-info-dian font-weight-bold">0</dis>
                                                            </div>
                                                        </div>
                                                    </dis>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 casilla-general-dian">
                                            <div class="sect-patrimonio sect-dian-form-number">
                                                <div class="verticla-sect-text-dian">Patrimonio</div>
                                                <div class="row content-inputs-number">

                                                    <!-- 36 Efectivo y equivalentes al efectivo  -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Efectivo y equivalentes al efectivo
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        36
                                                    </div>
                                                    <div id="form-004" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 37 Inversiones e instrumentos financieros derivados -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Inversiones e instrumentos financieros derivados
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        37
                                                    </div>
                                                    <div id="form-005" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 38 Cuentas, documentos y arrendamientos financieros por cobrar -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Cuentas, documentos y arrendamientos financieros por cobrar
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        38
                                                    </div>
                                                    <div id="form-006" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 39 Inventarios -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Inventarios
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        39
                                                    </div>
                                                    <div id="form-007" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 40 Activos intangibles -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Activos intangibles
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        40
                                                    </div>
                                                    <div id="form-008" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 41 Activos biológicos -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Activos biológicos
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        41
                                                    </div>
                                                    <div id="form-009" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 42 Propiedades, planta y equipo, propiedades de inversion y ANCMV -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Propiedades, planta y equipo, propiedades de inversion y ANCMV
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        42
                                                    </div>
                                                    <div id="form-010" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 43 Otros activos -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Otros activos
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        43
                                                    </div>
                                                    <div id="form-011" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 44 Total patrimonio bruto -->
                                                    <div class="col-7 py-1 name-input-form font-weight-bold">
                                                        Total patrimonio bruto
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form font-weight-bold">
                                                        44
                                                    </div>
                                                    <div id="form-012" class="col-4 py-1 number-input-form font-weight-bold">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 45 Pasivos -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Pasivos
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        45
                                                    </div>
                                                    <div id="form-013" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 46 Total patrimonio liquido -->
                                                    <div class="col-7 py-1 name-input-form font-weight-bold">
                                                        Total patrimonio líquido
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form font-weight-bold">
                                                        46
                                                    </div>
                                                    <div id="form-014" class="col-4 py-1 number-input-form font-weight-bold">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="sect-patrimonio sect-dian-form-number">
                                                <div class="verticla-sect-text-dian">Ingresos</div>
                                                <div class="row content-inputs-number">

                                                    <!-- 47 Ingresos brutos de actividades ordinarias -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Ingresos brutos de actividades ordinarias
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        47
                                                    </div>
                                                    <div id="form-015" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 48 Ingresos financieros -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Ingresos financieros
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        48
                                                    </div>
                                                    <div id="form-016" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 49 Dividendos y participaciones no constitutivos de renta ni ganancia ocasional -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Dividendos y participaciones no constitutivos de renta ni
                                                        ganancia ocasional
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        49
                                                    </div>
                                                    <div id="form-017" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 50 Dividendos y participaciones distribuidos por entidades no residentes en Colombia a una chc y prima en colocacion de acciones -->
                                                    <div class="col-7 py-1 name-input-form name-input-form-sm">
                                                        Dividendos y participaciones distribuidos por entidades no
                                                        residentes en Colombia a una CHC y prima en colocación de
                                                        acciones
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        50
                                                    </div>
                                                    <div id="form-018" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 51 Dividendos y participaciones gravadas a la tarifa general provenientes de entidades extranjeras o nacionales -->
                                                    <div class="col-7 py-1 name-input-form name-input-form-sm">
                                                        Dividendos y participaciones gravadas a la tarifa general
                                                        provenientes de entidades extranjeras o nacionales
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        51
                                                    </div>
                                                    <div id="form-019" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 54 Dividendos y participaciones gravadas a las tarifas de los articulos 245 a 246 E.T. -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Dividendos y participaciones gravadas a las tarifas de los
                                                        articulos 245 a 246 E.T.
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        54
                                                    </div>
                                                    <div id="form-022" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 55 Dividendos y participaciones gravadas a las tarifa general (EP y sociedades extranjeras - utilidades generadas a partir del año 2017) -->
                                                    <div class="col-7 py-1 name-input-form name-input-form-sm">
                                                        Dividendos y participaciones gravadas a las tarifa general (EP y
                                                        sociedades extranjeras - utilidades generadas a partir del año
                                                        2017)
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        55
                                                    </div>
                                                    <div id="form-023" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 56 Dividendos y participaciones gravadas a la tarifa general (EP y sociedades extranjeras - utilidades generadas a partir del año 2017) -->
                                                    <div class="col-7 py-1 name-input-form name-input-form-sm">
                                                        Dividendos y participaciones gravadas a la tarifa general (EP y
                                                        sociedades extranjeras - utilidades generadas a partir del año
                                                        2017)
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        56
                                                    </div>
                                                    <div id="form-024" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 57 Otros ingresos -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Otros ingresos
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        57
                                                    </div>
                                                    <div id="form-025" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 58 Total ingresos brutos -->
                                                    <div class="col-7 py-1 name-input-form font-weight-bold">
                                                        Total ingresos brutos
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form font-weight-bold">
                                                        58
                                                    </div>
                                                    <div id="form-026" class="col-4 py-1 number-input-form font-weight-bold">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 59 Devoluciones, rebajas y descuentos en ventas  -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Devoluciones, rebajas y descuentos en ventas
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        59
                                                    </div>
                                                    <div id="form-027" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 60 Ingresos no constitutivos de renta ni ganancia ocasional  -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Ingresos no constitutivos de renta ni ganancia ocasional
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        60
                                                    </div>
                                                    <div id="form-028" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 61 Total ingresos netos -->
                                                    <div class="col-7 py-1 name-input-form font-weight-bold">
                                                        Total ingresos netos
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form font-weight-bold">
                                                        61
                                                    </div>
                                                    <div id="form-029" class="col-4 py-1 number-input-form font-weight-bold">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="sect-patrimonio sect-dian-form-number">
                                                <div class="verticla-sect-text-dian">Costos y deducciones</div>
                                                <div class="row content-inputs-number">

                                                    <!-- 62 Costos -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Costos
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        62
                                                    </div>
                                                    <div id="form-030" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 63 Gastos de administracion -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Gastos de administracion
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        63
                                                    </div>
                                                    <div id="form-031" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 64 Gastos de distribucion y ventas -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Gastos de distribucion y ventas
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        64
                                                    </div>
                                                    <div id="form-032" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 65 Gastos financieros -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Gastos financieros
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        65
                                                    </div>
                                                    <div id="form-033" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 66 Otros gasto y deducciones -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Otros gastos y deducciones
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        66
                                                    </div>
                                                    <div id="form-034" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 67 Total costos y gastos deducibles -->
                                                    <div class="col-7 py-1 name-input-form font-weight-bold">
                                                        Total costos y gastos deducibles
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form font-weight-bold">
                                                        67
                                                    </div>
                                                    <div id="form-035" class="col-4 py-1 number-input-form font-weight-bold">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="sect-patrimonio sect-dian-form-number">
                                                <div class="verticla-sect-text-dian">ESAL<br>(R.T.E.)</div>
                                                <div class="row content-inputs-number">

                                                    <!-- 68 Inversiones efectuadas en el año -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Inversiones efectuadas en el año
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        68
                                                    </div>
                                                    <div id="form-036" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 69 Inversiones liquidadas en períodos gravables anteriores -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Inversiones liquidadas en períodos gravables anteriores
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        69
                                                    </div>
                                                    <div id="form-037" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="sect-patrimonio sect-dian-form-number">
                                                <div class="verticla-sect-text-dian">Renta</div>
                                                <div class="row content-inputs-number">

                                                    <!-- 70 Renta por recuperación de deducciones -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Renta por recuperación de deducciones
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        70
                                                    </div>
                                                    <div id="form-038" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 71 Renta pasiva - ECE sin residencia fiscal en Colombia -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Renta pasiva - ECE sin residencia fiscal en Colombia
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        71
                                                    </div>
                                                    <div id="form-039" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 72 Renta líquida ordinaria del ejercicio -->
                                                    <div class="col-7 py-1 name-input-form font-weight-bold">
                                                        Renta líquida ordinaria del ejercicio
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form font-weight-bold">
                                                        72
                                                    </div>
                                                    <div id="form-040" class="col-4 py-1 number-input-form font-weight-bold">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 73 Pérdida líquida del ejercicio -->
                                                    <div class="col-7 py-1 name-input-form font-weight-bold">
                                                        Pérdida líquida del ejercicio
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form font-weight-bold">
                                                        73
                                                    </div>
                                                    <div id="form-041" class="col-4 py-1 number-input-form font-weight-bold">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 74 Compensaciones -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Compensaciones
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        74
                                                    </div>
                                                    <div id="form-042" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 75 Renta líquida -->
                                                    <div class="col-7 py-1 name-input-form font-weight-bold">
                                                        Renta líquida
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form font-weight-bold">
                                                        75
                                                    </div>
                                                    <div id="form-043" class="col-4 py-1 number-input-form font-weight-bold">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 76 Renta presuntiva -->
                                                    <div class="col-7 pt-1 pb-2 name-input-form">
                                                        Renta presuntiva
                                                    </div>
                                                    <div class="col-1 pt-1 pb-2 cod-input-form">
                                                        76
                                                    </div>
                                                    <div id="form-044" class="col-4 pt-1 pb-2 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 casilla-general-dian">
                                            <div class="sect-patrimonio sect-dian-form-number">
                                                <div class="verticla-sect-text-dian">Renta</div>
                                                <div class="row content-inputs-number">

                                                    <!-- 77 Renta exenta -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Renta exenta
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        77
                                                    </div>
                                                    <div id="form-045" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 78 Rentas gravables -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Rentas gravables
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        78
                                                    </div>
                                                    <div id="form-046" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 79 Renta líquida gravable -->
                                                    <div class="col-7 py-1 name-input-form font-weight-bold">
                                                        Renta líquida gravable
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form font-weight-bold">
                                                        79
                                                    </div>
                                                    <div id="form-047" class="col-4 py-1 number-input-form font-weight-bold">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="sect-patrimonio sect-dian-form-number">
                                                <div class="verticla-sect-text-dian">Ganancias<br>ocasionales</div>
                                                <div class="row content-inputs-number">

                                                    <!-- 80 Ingresos por ganancias ocasionales -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Ingresos por ganancias ocasionales
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        80
                                                    </div>
                                                    <div id="form-048" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 81 Costos por ganancias ocasionales -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Costos por ganancias ocasionales
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        81
                                                    </div>
                                                    <div id="form-049" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 82 Ganancias ocasionales no gravadas y exentas -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Ganancias ocasionales no gravadas y exentas
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        82
                                                    </div>
                                                    <div id="form-050" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 83 Ganancias ocasionales gravables -->
                                                    <div class="col-7 py-1 name-input-form font-weight-bold" id="input-dian-110">
                                                        Ganancias ocasionales gravables
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form font-weight-bold" id="cod-input-dian-110">
                                                        83
                                                    </div>
                                                    <div id="form-051" class="col-4 py-1 number-input-form font-weight-bold" id="val-input-dian-110">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="sect-patrimonio sect-dian-form-number">
                                                <div class="verticla-sect-text-dian">Liquidación privada</div>
                                                <div class="row content-inputs-number padre-content-inputs-number">

                                                    <div class="col-12 sub-sect-dian-form-number">
                                                        <div class="sub-verticla-sect-text-dian font-weight-bold">
                                                            Impuesto sobre las rentas<br>liquidas gravables
                                                        </div>
                                                        <div class="row sub-content-inputs-number">
                                                            
                                                            <!-- 84 Sobre la renta liquida gravable -->
                                                            <div class="py-1 sub-name-input-form">
                                                                Sobre la renta liquida gravable
                                                            </div>
                                                            <div class="py-1 sub-cod-input-form">
                                                                84
                                                            </div>
                                                            <div id="form-052" class="py-1 sub-number-input-form">
                                                                <span>0</span>
                                                            </div>

                                                            <!-- 85 Puntos adicionales a la tarifa del impuesto renta -->
                                                            <div class="py-1 sub-name-input-form">
                                                                Puntos adicionales a la tarifa del impuesto renta
                                                            </div>
                                                            <div class="py-1 sub-cod-input-form">
                                                                85
                                                            </div>
                                                            <div id="form-053" class="py-1 sub-number-input-form">
                                                                <span>0</span>
                                                            </div>

                                                            <!-- 86 De dividendos y participaciones 10% año 2022 y 20% año 2023 -->
                                                            <div class="py-1 sub-name-input-form">
                                                                De dividendos y participaciones 10% año 2022 y 20% año 2023 (base casilla 54)
                                                            </div>
                                                            <div class="py-1 sub-cod-input-form">
                                                                86
                                                            </div>
                                                            <div id="form-054" class="py-1 sub-number-input-form">
                                                                <span>0</span>
                                                            </div>

                                                            <!-- 87 De dividendos y participaciones gravadas a la tarifa art. 240 (base casilla 56) -->
                                                            <div class="py-1 sub-name-input-form">
                                                                De dividendos y participaciones gravadas a la tarifa art. 240 (base casilla 56)
                                                            </div>
                                                            <div class="py-1 sub-cod-input-form">
                                                                87
                                                            </div>
                                                            <div id="form-055" class="py-1 sub-number-input-form">
                                                                <span>0</span>
                                                            </div>

                                                            <!-- 88 De dividendos y participaciones gravadas a la tarifa del 27% (base casilla 56) -->
                                                            <div class="py-1 sub-name-input-form">
                                                                De dividendos y participaciones gravadas a la tarifa del 27% (base casilla 56)
                                                            </div>
                                                            <div class="py-1 sub-cod-input-form">
                                                                88
                                                            </div>
                                                            <div id="form-056" class="py-1 sub-number-input-form">
                                                                <span>0</span>
                                                            </div>

                                                            <!-- 89 De dividendos y participaciones gravadas a la tarifa art. 240 (base casilla 53) -->
                                                            <div class="py-1 sub-name-input-form">
                                                                De dividendos y participaciones gravadas a la tarifa art. 240 (base casilla 53)
                                                            </div>
                                                            <div class="py-1 sub-cod-input-form">
                                                                89
                                                            </div>
                                                            <div id="form-057" class="py-1 sub-number-input-form">
                                                                <span>0</span>
                                                            </div>

                                                            <!-- 90 De dividendos y participaciones gravadas a la tarifa del 33% (base casilla 52) -->
                                                            <div class="py-1 sub-name-input-form">
                                                                De dividendos y participaciones gravadas a la tarifa del 33% (base casilla 52)
                                                            </div>
                                                            <div class="py-1 sub-cod-input-form">
                                                                90
                                                            </div>
                                                            <div id="form-058" class="py-1 sub-number-input-form">
                                                                <span>0</span>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="sect-sub-dian-form-number">
                                                        <!-- 91 Total impuesto sobre las rentas líquidas gravadas -->
                                                        <div class="col-7 py-1 name-sub-input-form font-weight-bold">
                                                            Total impuesto sobre las rentas líquidas gravadas
                                                        </div>
                                                        <div class="col-1 py-1 cod-sub-input-form font-weight-bold">
                                                            91
                                                        </div>
                                                        <div id="form-059" class="col-4 py-1 number-sub-input-form font-weight-bold">
                                                            <span class="mr-2">0</span>
                                                        </div>

                                                        <!-- 92 Valor a adicionar (VAA) -->
                                                        <div class="col-7 py-1 name-sub-input-form">
                                                            Valor a adicionar (VAA)
                                                        </div>
                                                        <div class="col-1 py-1 cod-sub-input-form">
                                                            92
                                                        </div>
                                                        <div id="form-060" class="col-4 py-1 number-sub-input-form">
                                                            <span class="mr-2">0</span>
                                                        </div>

                                                        <!-- 93 Descuentos tributarios -->
                                                        <div class="col-7 py-1 name-sub-input-form">
                                                            Descuentos tributarios
                                                        </div>
                                                        <div class="col-1 py-1 cod-sub-input-form">
                                                            93
                                                        </div>
                                                        <div id="form-061" class="col-4 py-1 number-sub-input-form">
                                                            <span class="mr-2">0</span>
                                                        </div>

                                                        <!-- 94 Impuesto neto de renta (sin adicionado) -->
                                                        <div class="col-7 py-1 name-sub-input-form">
                                                            <strong>Impuesto neto de renta</strong> (sin adicionado)
                                                        </div>
                                                        <div class="col-1 py-1 cod-sub-input-form font-weight-bold">
                                                            94
                                                        </div>
                                                        <div id="form-062" class="col-4 py-1 number-sub-input-form font-weight-bold">
                                                            <span class="mr-2">0</span>
                                                        </div>

                                                        <!-- 95 Impuesto a adicionar (IA) -->
                                                        <div class="col-7 py-1 name-sub-input-form">
                                                            Impuesto a adicionar (IA)
                                                        </div>
                                                        <div class="col-1 py-1 cod-sub-input-form">
                                                            95
                                                        </div>
                                                        <div id="form-063" class="col-4 py-1 number-sub-input-form">
                                                            <span class="mr-2">0</span>
                                                        </div>

                                                        <!-- 96 Impuesto neto de renta (con adicionado) -->
                                                        <div class="col-7 py-1 name-sub-input-form">
                                                            <strong>Impuesto neto de renta</strong> (con adicionado)
                                                        </div>
                                                        <div class="col-1 py-1 cod-sub-input-form font-weight-bold">
                                                            96
                                                        </div>
                                                        <div id="form-064" class="col-4 py-1 number-sub-input-form font-weight-bold">
                                                            <span class="mr-2">0</span>
                                                        </div>

                                                        <!-- 97 Impuesto de ganancias ocasionales -->
                                                        <div class="col-7 py-1 name-sub-input-form font-weight-bold">
                                                            Impuesto de ganancias ocasionales
                                                        </div>
                                                        <div class="col-1 py-1 cod-sub-input-form font-weight-bold">
                                                            97
                                                        </div>
                                                        <div id="form-065" class="col-4 py-1 number-sub-input-form font-weight-bold">
                                                            <span class="mr-2">0</span>
                                                        </div>

                                                        <!-- 98 Descuento por impuestos pagados en el exterior por ganancias ocasionales -->
                                                        <div class="col-7 py-1 name-sub-input-form">
                                                            Descuento por impuestos pagados en el exterior por ganancias ocasionales
                                                        </div>
                                                        <div class="col-1 py-1 cod-sub-input-form">
                                                            98
                                                        </div>
                                                        <div id="form-066" class="col-4 py-1 number-sub-input-form">
                                                            <span class="mr-2">0</span>
                                                        </div>

                                                        <!-- 99 Total impuesto a cargo -->
                                                        <div class="col-7 py-1 name-sub-input-form font-weight-bold">
                                                            Total impuesto a cargo
                                                        </div>
                                                        <div class="col-1 py-1 cod-sub-input-form font-weight-bold">
                                                            99
                                                        </div>
                                                        <div id="form-067" class="col-4 py-1 number-sub-input-form font-weight-bold">
                                                            <span class="mr-2">0</span>
                                                        </div>

                                                        <!-- 100 Valos inversión obras por impuestos hasta el 50% del valor de la casilla 99 (Modalidad de pago 1) -->
                                                        <div class="col-7 py-1 name-sub-input-form">
                                                            Valos inversión obras por impuestos hasta el 50% del valor de la casilla 99 (Modalidad de pago 1)
                                                        </div>
                                                        <div class="col-1 py-1 cod-sub-input-form">
                                                            100
                                                        </div>
                                                        <div id="form-068" class="col-4 py-1 number-sub-input-form">
                                                            <span class="mr-2">0</span>
                                                        </div>

                                                        <!-- 101 Descuento efectivo inversión obras por impuestos (Modalidad de pago 2) -->
                                                        <div class="col-7 py-1 name-sub-input-form">
                                                            Descuento efectivo inversión obras por impuestos (Modalidad de pago 2)
                                                        </div>
                                                        <div class="col-1 py-1 cod-sub-input-form">
                                                            101
                                                        </div>
                                                        <div id="form-069" class="col-4 py-1 number-sub-input-form">
                                                            <span class="mr-2">0</span>
                                                        </div>

                                                        <!-- 102 Crédito fiscal artículo 256-1 E.T. -->
                                                        <div class="col-7 py-1 name-sub-input-form">
                                                            Crédito fiscal artículo 256-1 E.T.
                                                        </div>
                                                        <div class="col-1 py-1 cod-sub-input-form">
                                                            102
                                                        </div>
                                                        <div id="form-070" class="col-4 py-1 number-sub-input-form">
                                                            <span class="mr-2">0</span>
                                                        </div>

                                                        <!-- 103 Anticipo renta liquidado año gravable anterior -->
                                                        <div class="col-7 py-1 name-sub-input-form">
                                                            Anticipo renta liquidado año gravable anterior
                                                        </div>
                                                        <div class="col-1 py-1 cod-sub-input-form">
                                                            103
                                                        </div>
                                                        <div id="form-071" class="col-4 py-1 number-sub-input-form">
                                                            <span class="mr-2">0</span>
                                                        </div>

                                                        <!-- 104 Saldo a favor año gravable anterior sin solicitud de devolución y compensación -->
                                                        <div class="col-7 py-1 name-sub-input-form">
                                                            Saldo a favor año gravable anterior sin solicitud de devolución y compensación
                                                        </div>
                                                        <div class="col-1 py-1 cod-sub-input-form">
                                                            104
                                                        </div>
                                                        <div id="form-072" class="col-4 py-1 number-sub-input-form">
                                                            <span class="mr-2">0</span>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 sub-sect-dian-form-number">
                                                        <div class="sub-verticla-sect-text-dian font-weight-bold">
                                                            Retenciones
                                                        </div>
                                                        <div class="row sub-content-inputs-number">
                                                            
                                                            <!-- 105 Autorretenciones -->
                                                            <div class="py-1 sub-name-input-form">
                                                                Autorretenciones
                                                            </div>
                                                            <div class="py-1 sub-cod-input-form">
                                                                105
                                                            </div>
                                                            <div id="form-073" class="py-1 sub-number-input-form">
                                                                <span>0</span>
                                                            </div>

                                                            <!-- 106 Otras retenciones -->
                                                            <div class="py-1 sub-name-input-form">
                                                                Otras retenciones
                                                            </div>
                                                            <div class="py-1 sub-cod-input-form">
                                                                106
                                                            </div>
                                                            <div id="form-074" class="py-1 sub-number-input-form">
                                                                <span>0</span>
                                                            </div>

                                                            <!-- 107 Total retenciones año gravable a declarar -->
                                                            <div class="py-1 sub-name-input-form font-weight-bold">
                                                                Total retenciones año gravable
                                                            </div>
                                                            <div class="py-1 sub-cod-input-form font-weight-bold">
                                                                107
                                                            </div>
                                                            <div id="form-075" class="py-1 sub-number-input-form font-weight-bold">
                                                                <span>0</span>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="sect-sub-dian-form-number">
                                                        <!-- 108 Anticipo renta para el año gravable siguiente -->
                                                        <div class="col-7 py-1 name-sub-input-form">
                                                            Anticipo renta para el año gravable siguiente
                                                        </div>
                                                        <div class="col-1 py-1 cod-sub-input-form">
                                                            108
                                                        </div>
                                                        <div id="form-076" class="col-4 py-1 number-sub-input-form">
                                                            <span class="mr-2">0</span>
                                                        </div>

                                                        <!-- 109 Anticipo puntos adicionales año gravable anterior -->
                                                        <div class="col-7 py-1 name-sub-input-form">
                                                            Anticipo puntos adicionales año gravable anterior
                                                        </div>
                                                        <div class="col-1 py-1 cod-sub-input-form">
                                                            109
                                                        </div>
                                                        <div id="form-077" class="col-4 py-1 number-sub-input-form">
                                                            <span class="mr-2">0</span>
                                                        </div>

                                                        <!-- 110 Anticipo puntos adicionales año gravable siguiente -->
                                                        <div class="col-7 py-1 name-sub-input-form">
                                                            Anticipo puntos adicionales año gravable siguiente
                                                        </div>
                                                        <div class="col-1 py-1 cod-sub-input-form">
                                                            110
                                                        </div>
                                                        <div id="form-078" class="col-4 py-1 number-sub-input-form">
                                                            <span class="mr-2">0</span>
                                                        </div>

                                                        <!-- 111 Saldo a pagar por impuesto -->
                                                        <div class="col-7 py-1 name-sub-input-form font-weight-bold">
                                                            Saldo a pagar por impuesto
                                                        </div>
                                                        <div class="col-1 py-1 cod-sub-input-form font-weight-bold">
                                                            111
                                                        </div>
                                                        <div id="form-079" class="col-4 py-1 number-sub-input-form font-weight-bold">
                                                            <span class="mr-2">0</span>
                                                        </div>

                                                        <!-- 112 Sanciones -->
                                                        <div class="col-7 py-1 name-sub-input-form">
                                                            Sanciones
                                                        </div>
                                                        <div class="col-1 py-1 cod-sub-input-form">
                                                            112
                                                        </div>
                                                        <div id="form-080" class="col-4 py-1 number-sub-input-form">
                                                            <span class="mr-2">0</span>
                                                        </div>

                                                        <!-- 113 Total saldo a pagar -->
                                                        <div class="col-7 py-1 name-sub-input-form font-weight-bold">
                                                            Total saldo a pagar
                                                        </div>
                                                        <div class="col-1 py-1 cod-sub-input-form font-weight-bold">
                                                            113
                                                        </div>
                                                        <div id="form-081" class="col-4 py-1 number-sub-input-form font-weight-bold">
                                                            <span class="mr-2">0</span>
                                                        </div>

                                                        <!-- 114 Total saldo a favor -->
                                                        <div class="col-7 py-1 name-sub-input-form font-weight-bold">
                                                            Total saldo a favor
                                                        </div>
                                                        <div class="col-1 py-1 cod-sub-input-form font-weight-bold">
                                                            114
                                                        </div>
                                                        <div id="form-082" class="col-4 py-1 number-sub-input-form font-weight-bold">
                                                            <span class="mr-2">0</span>
                                                        </div>
                                                        
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="sect-patrimonio sect-dian-form-number">
                                                <div class="verticla-sect-text-dian"><br></div>
                                                <div class="row content-inputs-number">

                                                    <!-- 115 Obras por impuesto Modalidad de pago 1 -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Obras por impuesto Modalidad de pago 1
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        115
                                                    </div>
                                                    <div id="form-083" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 116 Obras por impuesto Modalidad de pago 2 -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Obras por impuesto Modalidad de pago 2
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        116
                                                    </div>
                                                    <div id="form-084" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 117 Aporte voluntario Art. 244-1 E.T -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Aporte voluntario Art. 244-1 E.T.
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        117
                                                    </div>
                                                    <div id="form-085" class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="content-result-aviso">

                            <!-- NO Aprobado --> 
                            <div class="info-resultado no-aprobado">
                                <i class="fas fa-times-circle"></i>
                                <h3 class="font-weight-bold">¡Incorrecto!</h3>
                                <p class="my-4">Has tenido demasiados errores, revisa tus resultados y vuelve a intentarlo.</p>
                                <button class="btn-result-aviso btn-3-ucamp btn">Ver resultados</button>
                            </div>

                            <!-- Aprobado --> 
                            <div class="info-resultado si-aprobado">
                                <i class="fas fa-check-circle"></i>
                                <h3 class="font-weight-bold">¡Felicitaciones!</h3>
                                <p class="my-4">Has aprobado el ejercicio.</p>
                                <button class="btn-result-aviso btn-3-ucamp btn">Ver resultados</button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="content-btn">
        <div class="btn btn-2-ucamp btn-resultados">Ocultar resultados</div>
    </div>
</div>
