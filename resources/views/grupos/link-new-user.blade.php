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
                    <div class="col-8">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- -->
            <div class="col-12">
                <div class="row justify-content-md-center">
                    <div class="col-8">
                        <div class="card create-cuenta-info">
                            <div class="card-body">
                                <p class="my-3">Para unirte al grupo <strong>{{ $group->name }}</strong>, primero
                                    crea tu cuenta personal:</p>

                                <div class="my-4 row justify-content-md-center">
                                    <div class="col-6">
                                        <!-- Formulario de creación de usuario -->
                                        <form method="POST" action="{{ route('link-new-user') }}" id="link-new-user">
                                            @csrf <!-- Directiva Blade para incluir el token CSRF -->

                                            <!-- Mostrar mensajes de error -->
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <!-- Campo de nombres -->
                                            <div class="input-group mb-3">
                                                <input type="text" id="first_name" class="form-control"
                                                    name="first_name" placeholder="Nombres" required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-user"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Campo de apellidos -->
                                            <div class="input-group mb-3">
                                                <input type="text" id="last_name" class="form-control"
                                                    name="last_name" placeholder="Apellidos" required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-user"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Campo de correo electrónico -->
                                            <div class="input-group mb-3">
                                                <input type="email" id="email" class="form-control" name="email"
                                                    placeholder="Correo electrónico" required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-envelope"></span>
                                                    </div>
                                                </div>
                                                <div class="feedback-msg">
                                                    <span class="msg email-invalid">El correo electronico no es valido.</span>
                                                    <span class="msg email-exist">Ya existe una cuenta con este correo.</span>
                                                </div>
                                            </div>

                                            <!-- Campo de contraseña -->
                                            <div class="input-group mb-3">
                                                <input type="password" id="password" name="password"
                                                    class="form-control" placeholder="Contraseña" required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-lock"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="password" name="password_confirmation" class="form-control"
                                                    placeholder="Confirme la contraseña" required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-lock"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="text" id="key" name="key" value="{{ $invitation_key }}">

                                            <!-- Botón de envío -->
                                            <div class="row">
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-ucamp btn-block">Empieza a
                                                        aprender
                                                        gratis</button>
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

            <!-- -->
            <div class="col-12">
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