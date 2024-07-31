<div class="container-resultados-DIAN">
    <div class="container card-resultados">
        <div class="row">
            <div class="col-12">
                <div class="card">

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
                                                <div style="width: 80%; margin: auto;">
                                                    <canvas id="progress-circle"></canvas>
                                                </div>
                                                <table class="table-general mt-4 table table-sm table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center text-muted text-sm"
                                                                style="width: 50%">Aciertos</th>
                                                            <th class="text-center text-muted text-sm"
                                                                style="width: 50%">Errores</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-success text-center">75</td>
                                                            <td class="text-danger text-center">25</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
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
                                                            <th style="width: 40px">Puntaje</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1.</td>
                                                            <td>Datos informativos</td>
                                                            <td class="progress-td">
                                                                <div class="progress progress-xs">
                                                                    <div class="progress-bar progress-bar-danger"
                                                                        style="width: 55%"></div>
                                                                </div>
                                                            </td>
                                                            <td class="text-center"><span
                                                                    class="badge bg-danger">55%</span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- Formulario generado -->
                            <div class="tab-pane" id="formulario">
                                <div class="container-fluid content-formulario-generate">
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
                                                                <dis class="col-6 value-info-dian font-weight-bold">
                                                                    172.000.000</dis>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="row">
                                                                <dis class="col-6">34. Aportes de seguridad social
                                                                </dis>
                                                                <dis class="col-6 value-info-dian font-weight-bold">
                                                                    172.000.000</dis>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="row">
                                                                <dis class="col-6">35. Aportes al SENA, ICBF, caja de
                                                                    compensacion</dis>
                                                                <dis class="col-6 value-info-dian font-weight-bold">
                                                                    172.000.000</dis>
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
                                                    <div class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 37 Inversiones e instrumentos financieros derivados -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Inversiones e instrumentos financieros derivados
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        37
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 38 Cuentas, documentos y arrendamientos financieros por cobrar -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Cuentas, documentos y arrendamientos financieros por cobrar
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        38
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 39 Inventarios -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Inventarios
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        39
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 40 Activos intangibles -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Activos intangibles
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        40
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 41 Activos biológicos -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Activos biológicos
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        41
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 42 Propiedades, planta y equipo, propiedades de inversion y ANCMV -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Propiedades, planta y equipo, propiedades de inversion y ANCMV
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        42
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 43 Otros activos -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Otros activos
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        43
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 44 Total patrimonio bruto -->
                                                    <div class="col-7 py-1 name-input-form font-weight-bold">
                                                        Total patrimonio bruto
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form font-weight-bold">
                                                        44
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form font-weight-bold">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 45 Pasivos -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Pasivos
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        45
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 46 Total patrimonio liquido -->
                                                    <div class="col-7 py-1 name-input-form font-weight-bold">
                                                        Total patrimonio líquido
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form font-weight-bold">
                                                        46
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form font-weight-bold">
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
                                                    <div class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 48 Ingresos financieros -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Ingresos financieros
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        48
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form">
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
                                                    <div class="col-4 py-1 number-input-form">
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
                                                    <div class="col-4 py-1 number-input-form">
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
                                                    <div class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 52 Dividendos y participaciones gravadas recibidas por personas naturales sin residencia fiscal (año 2016 y anteriores) -->
                                                    <div class="col-7 py-1 name-input-form name-input-form-sm">
                                                        Dividendos y participaciones gravadas recibidas por personas
                                                        naturales sin residencia fiscal (año 2016 y anteriores)
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        52
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 53 Dividendos y participaciones gravadas recibidas por personas naturales sin residencia fiscal (año 2017 y anteriores) -->
                                                    <div class="col-7 py-1 name-input-form name-input-form-sm">
                                                        Dividendos y participaciones gravadas recibidas por personas
                                                        naturales sin residencia fiscal (año 2017 y siguientes)
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        53
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 54 Dividendos y participaciones gravadas a las tarifas de los articulos 245 a 246 E.T. -->
                                                    <div class="col-7 py-1 name-input-form name-input-form-sm">
                                                        Dividendos y participaciones gravadas a las tarifas de los
                                                        articulos 245 a 246 E.T.
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        54
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form">
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
                                                    <div class="col-4 py-1 number-input-form">
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
                                                    <div class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 57 Otros ingresos -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Otros ingresos
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        57
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 58 Total ingresos brutos -->
                                                    <div class="col-7 py-1 name-input-form font-weight-bold">
                                                        Total ingresos brutos
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form font-weight-bold">
                                                        58
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form font-weight-bold">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 59 Devoluciones, rebajas y descuentos en ventas  -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Devoluciones, rebajas y descuentos en ventas
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        59
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 60 Ingresos no constitutivos de renta ni ganancia ocasional  -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Ingresos no constitutivos de renta ni ganancia ocasional
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        60
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 61 Total ingresos netos -->
                                                    <div class="col-7 py-1 name-input-form font-weight-bold">
                                                        Total ingresos netos
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form font-weight-bold">
                                                        61
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form font-weight-bold">
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
                                                    <div class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 63 Gastos de administracion -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Gastos de administracion
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        63
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 64 Gastos de distribucion y ventas -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Gastos de distribucion y ventas
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        64
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 65 Gastos financieros -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Gastos financieros
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        65
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 66 Otros gasto y deducciones -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Otros gastos y deducciones
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        66
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 67 Total costos y gastos deducibles -->
                                                    <div class="col-7 py-1 name-input-form font-weight-bold">
                                                        Total costos y gastos deducibles
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form font-weight-bold">
                                                        67
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form font-weight-bold">
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
                                                    <div class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 69 Inversiones liquidadas en períodos gravables anteriores -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Inversiones liquidadas en períodos gravables anteriores
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        69
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form">
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
                                                    <div class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 71 Renta pasiva - ECE sin residencia fiscal en Colombia -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Renta pasiva - ECE sin residencia fiscal en Colombia
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        71
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 72 Renta líquida ordinaria del ejercicio -->
                                                    <div class="col-7 py-1 name-input-form font-weight-bold">
                                                        Renta líquida ordinaria del ejercicio
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form font-weight-bold">
                                                        72
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form font-weight-bold">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 73 Pérdida líquida del ejercicio -->
                                                    <div class="col-7 py-1 name-input-form font-weight-bold">
                                                        Pérdida líquida del ejercicio
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form font-weight-bold">
                                                        73
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form font-weight-bold">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 74 Compensaciones -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Compensaciones
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        74
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 75 Renta líquida -->
                                                    <div class="col-7 py-1 name-input-form font-weight-bold">
                                                        Renta líquida
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form font-weight-bold">
                                                        75
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form font-weight-bold">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 76 Renta presuntiva -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Renta presuntiva
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        76
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form">
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
                                                    <div class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 78 Rentas gravables -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Rentas gravables
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        78
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 79 Renta líquida gravable -->
                                                    <div class="col-7 py-1 name-input-form font-weight-bold">
                                                        Renta líquida gravable
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form font-weight-bold">
                                                        79
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form font-weight-bold">
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
                                                    <div class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 81 Costos por ganancias ocasionales -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Costos por ganancias ocasionales
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        81
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 82 Ganancias ocasionales no gravadas y exentas -->
                                                    <div class="col-7 py-1 name-input-form">
                                                        Ganancias ocasionales no gravadas y exentas
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form">
                                                        82
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                    <!-- 83 Ganancias ocasionales gravables -->
                                                    <div class="col-7 py-1 name-input-form font-weight-bold">
                                                        Ganancias ocasionales gravables
                                                    </div>
                                                    <div class="col-1 py-1 cod-input-form font-weight-bold">
                                                        83
                                                    </div>
                                                    <div class="col-4 py-1 number-input-form font-weight-bold">
                                                        <span class="mr-2">0</span>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="sect-patrimonio sect-dian-form-number">
                                                <div class="verticla-sect-text-dian">Liquidación privada</div>
                                                <div class="row content-inputs-number padre-content-inputs-number">

                                                    <div class="col-12 sub-sect-dian-form-number">
                                                        <div class="sub-verticla-sect-text-dian">
                                                            Impuesto sobre las rentas<br>liquidas gravables
                                                        </div>
                                                        <div class="row sub-content-inputs-number">
                                                            <!-- 80 Ingresos por ganancias ocasionales -->
                                                            <div class="col-7 py-1 name-input-form">
                                                                Ingresos por ganancias ocasionales
                                                            </div>
                                                            <div class="col-1 py-1 cod-input-form">
                                                                80
                                                            </div>
                                                            <div class="col-4 py-1 number-input-form">
                                                                <span class="mr-2">0</span>
                                                            </div>

                                                            <!-- 80 Ingresos por ganancias ocasionales -->
                                                            <div class="col-7 py-1 name-input-form">
                                                                Ingresos por ganancias ocasionales
                                                            </div>
                                                            <div class="col-1 py-1 cod-input-form">
                                                                80
                                                            </div>
                                                            <div class="col-4 py-1 number-input-form">
                                                                <span class="mr-2">0</span>
                                                            </div>

                                                            <!-- 80 Ingresos por ganancias ocasionales -->
                                                            <div class="col-7 py-1 name-input-form">
                                                                Ingresos por ganancias ocasionales
                                                            </div>
                                                            <div class="col-1 py-1 cod-input-form">
                                                                80
                                                            </div>
                                                            <div class="col-4 py-1 number-input-form">
                                                                <span class="mr-2">0</span>
                                                            </div>

                                                            <!-- 80 Ingresos por ganancias ocasionales -->
                                                            <div class="col-7 py-1 name-input-form">
                                                                Ingresos por ganancias ocasionales
                                                            </div>
                                                            <div class="col-1 py-1 cod-input-form">
                                                                80
                                                            </div>
                                                            <div class="col-4 py-1 number-input-form">
                                                                <span class="mr-2">0</span>
                                                            </div>

                                                            <!-- 80 Ingresos por ganancias ocasionales -->
                                                            <div class="col-7 py-1 name-input-form">
                                                                Ingresos por ganancias ocasionales
                                                            </div>
                                                            <div class="col-1 py-1 cod-input-form">
                                                                80
                                                            </div>
                                                            <div class="col-4 py-1 number-input-form">
                                                                <span class="mr-2">0</span>
                                                            </div>

                                                            <!-- 80 Ingresos por ganancias ocasionales -->
                                                            <div class="col-7 py-1 name-input-form">
                                                                Ingresos por ganancias ocasionales
                                                            </div>
                                                            <div class="col-1 py-1 cod-input-form">
                                                                80
                                                            </div>
                                                            <div class="col-4 py-1 number-input-form">
                                                                <span class="mr-2">0</span>
                                                            </div>

                                                            <!-- 81 Costos por ganancias ocasionales -->
                                                            <div class="col-7 py-1 name-input-form">
                                                                Costos por ganancias ocasionales
                                                            </div>
                                                            <div class="col-1 py-1 cod-input-form">
                                                                81
                                                            </div>
                                                            <div class="col-4 py-1 number-input-form">
                                                                <span class="mr-2">0</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="logo-fondo-form">
                                        <span class="u-logo">Account</span>
                                        <span class="camp-logo">Camp</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="content-btn">
        <div class="btn btn-2-ucamp-border btn-resultados">Ocultar resultados</div>
    </div>
</div>
