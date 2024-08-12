@include('components.header')

<body class="hold-transition create-page">
    <div class="login-box">
        <!-- Enlace al logo que redirige a la página principal -->
        <a href="{{ route('home-page') }}">
            @include('components.logo')
        </a>
        <div class="card card-outline card-outline-ibero card-primary">
            <div class="card-body">
                <!-- Título de creación de cuenta -->
                <div class="text-create text-center">
                    <p class="text-center">Crea tu cuenta gratis y mejora tus habilidades en contabilidad y finanzas</p>
                </div>
                <!-- Formulario de creación de usuario -->
                <form method="POST" action="{{ route('process-sign-up') }}">
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
                        <input type="text" id="first_name" class="form-control" name="first_name"
                            placeholder="Nombres" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Campo de apellidos -->
                    <div class="input-group mb-3">
                        <input type="text" id="last_name" class="form-control" name="last_name"
                            placeholder="Apellidos" required>
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
                    </div>

                    <!-- Campo de contraseña -->
                    <div class="input-group mb-3">
                        <input type="password" id="password" name="password" class="form-control"
                            placeholder="Contraseña" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Campo de confirmación de contraseña -->
                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Confirme la contraseña" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Botón de envío del formulario -->
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-ucamp btn-block">Empieza a aprender gratis</button>
                        </div>
                    </div>
                </form>

                <!-- Términos y condiciones -->
                <p class="m-2 text-muted text-small">
                    Al continuar, aceptas nuestros Términos y condiciones, nuestra Política de Privacidad y que tus
                    datos sean almacenados.
                </p>
            </div>
        </div>

        <!-- Enlace para iniciar sesión -->
        <div class="card card-outline p-3 mt-3">
            <p class="text-center m-0">
                O haz <a href="{{ route('login') }}"><b>Clic aquí</b></a> para iniciar sesión.
            </p>
        </div>
    </div>

    <!-- Llamado al archivo JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>