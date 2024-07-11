@include('components.header')

<body class="page-home-camp page-pricing">

    @include('home.home-navbar')

    <!--  -->
    <section id="price-section" class="section-home">
        <div class="container content">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center font-weight-bold text-white">Aprende
                        <span class="text-three-camp"> contabilidad y finanzas </span>
                        para avanzar en tu carrera
                    </h1>
                </div>

                <table class="my-5 table pricing-table">
                    <thead>
                        <tr>
                            <th width="40%" class="none-header"></th>
                            <th width="30%" class="free-plan">
                                <h3 class="m-0 font-weight-bold">Basico</h3>
                                <span class="acceso">ACCESO LIMITADO</span>
                                <div class="my-3 value-plan">
                                    <span class="amount-value font-weight-bold">Gratis</span>
                                </div>
                                <a class="btn btn-block btn-ucamp-border" href="{{ route('sign-up') }}">Crear cuenta</a>
                            </th>
                            <th width="30%" class="premium-header">
                                <div class="alert-premium">
                                    <span>RECOMENDADO</span>
                                </div>
                                <h3 class="m-0 font-weight-bold text-three-camp">Premium</h3>
                                <span class="acceso">ACCESO ILIMITADO</span>
                                <div class="my-3 value-plan">
                                    <span class="amount-value font-weight-bold">$13</span>
                                    <div class="ml-2 info-value">
                                        <span>/mes</span><span>pago mensual</span>
                                    </div>
                                </div>
                                <a class="btn btn-block btn-3-ucamp font-weight-bold" href="{{ route('purchase-home') }}">Iniciar aprendizaje</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Acceso a Cursos</td>
                            <td class="text-center">Limitado</td>
                            <td class="premium text-center">Ilimitado</td>
                        </tr>
                        <tr>
                            <td>Soporte</td>
                            <td class="text-center"><i class="fas fa-envelope"></i></td>
                            <td class="premium text-center"><i class="fas fa-headset"></i></td>
                        </tr>
                        <tr>
                            <td>Certificaciones</td>
                            <td class="text-center"><i class="fas fa-times text-danger"></i></td>
                            <td class="premium text-center"><i class="fas fa-check text-success"></i></td>
                        </tr>
                        <tr>
                            <td>Contenido Exclusivo</td>
                            <td class="text-center"><i class="fas fa-times text-danger"></i></td>
                            <td class="premium text-center"><i class="fas fa-check text-success"></i></td>
                        </tr>
                        <tr>
                            <td>Contenido Exclusivo</td>
                            <td class="text-center"><i class="fas fa-times text-danger"></i></td>
                            <td class="premium text-center"><i class="fas fa-check text-success"></i></td>
                        </tr>
                        <tr>
                            <td>Contenido Exclusivo</td>
                            <td class="text-center"><i class="fas fa-times text-danger"></i></td>
                            <td class="premium text-center"><i class="fas fa-check text-success"></i></td>
                        </tr>
                        <tr>
                            <td>Contenido Exclusivo</td>
                            <td class="text-center"><i class="fas fa-times text-danger"></i></td>
                            <td class="premium text-center"><i class="fas fa-check text-success"></i></td>
                        </tr>
                        <tr>
                            <td>Contenido Exclusivo</td>
                            <td class="text-center"><i class="fas fa-times text-danger"></i></td>
                            <td class="premium text-center"><i class="fas fa-check text-success"></i></td>
                        </tr>
                        <tr>
                            <td>Contenido Exclusivo</td>
                            <td class="text-center"><i class="fas fa-times text-danger"></i></td>
                            <td class="premium text-center"><i class="fas fa-check text-success"></i></td>
                        </tr>
                        <tr>
                            <td>Contenido Exclusivo</td>
                            <td class="text-center"><i class="fas fa-times text-danger"></i></td>
                            <td class="premium text-center"><i class="fas fa-check text-success"></i></td>
                        </tr>
                        <tr>
                            <td>Contenido Exclusivo</td>
                            <td class="text-center"><i class="fas fa-times text-danger"></i></td>
                            <td class="premium text-center"><i class="fas fa-check text-success"></i></td>
                        </tr>
                        <tr>
                            <td>Contenido Exclusivo</td>
                            <td class="text-center"><i class="fas fa-times text-danger"></i></td>
                            <td class="premium text-center"><i class="fas fa-check text-success"></i></td>
                        </tr>
                        <tr>
                            <td>Contenido Exclusivo</td>
                            <td class="text-center"><i class="fas fa-times text-danger"></i></td>
                            <td class="premium text-center"><i class="fas fa-check text-success"></i></td>
                        </tr>
                        <tr>
                            <td>Contenido Exclusivo</td>
                            <td class="text-center"><i class="fas fa-times text-danger"></i></td>
                            <td class="premium text-center"><i class="fas fa-check text-success"></i></td>
                        </tr>
                    </tbody>
                </table>
                
                
            </div>


        </div>
        </div>
    </section>

    <!-- Footer -->
    @include('home.home-footer')

    @include('components.footer')
