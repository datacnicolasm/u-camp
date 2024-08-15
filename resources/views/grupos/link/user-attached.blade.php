@include('components.header')

<body class="page-notice-link">

    <div class="container content">
        <div class="row">

            <!-- Logo de plataforma -->
            <div class="col-12 mb-3 logo-col">
                <div class="logo-notice">
                    <span class="u-logo">Account</span>
                    <span class="camp-logo">Camp</span>
                </div>
            </div>

            <!-- -->
            <div class="col-12">
                <div class="row justify-content-md-center">
                    <div class="col-6">
                        <div class="card notice-info">
                            <div class="card-body">
                                <h2>¡Bienvenido!</h2>
                                <p class="my-3">Te han invitado a unirte a un grupo en <strong>AccountCamp</strong>.
                                </p>
                                <div class="my-3 icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <p class="my-3">El grupo fue creado por
                                    <strong>{{ $user_create->first_name . ' ' . $user_create->last_name }}</strong>.
                                </p>
                                <p class="my-3">
                                    Ya eres parte del grupo <strong>{{ $group->name }}</strong>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- -->
            <div class="mt-5 col-12">
                <div class="row justify-content-md-center">
                    <div class="col-8">
                        <footer class="footer-notice">
                            <strong>&copy; {{ date('Y') }} AcoountCamp, Inc.</strong>
                            All rights reserved.
                            <div class="float-right d-none d-sm-inline-block">
                                <b>Version</b> Beta 1.0.0
                            </div>
                        </footer>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('components.footer')