@include('components.header')

<body class="hold-transition create-page">
    <div class="login-box">
        <!-- -->
        <a href="{{ route('home-page') }}">
            @include('components.logo')
        </a>
        <div class="card card-outline card-outline-ibero card-primary">
            <div class="card-body">
                <!-- -->
                <div class="text-create text-center">
                    <p class="text-center">Crea tu cuenta gratis y mejora tus habilidades en contabilidad y finanzas</p>
                </div>
                <!-- -->
                <form method="POST" action="{{ route('process-sign-up') }}" >
                    @csrf <!-- Directiva Blade para incluir el token CSRF -->
                    <div class="input-group mb-3">
                        <input type="text" id="first_name" class="form-control" name="first_name" placeholder="Nombres" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" id="last_name" class="form-control" name="last_name" placeholder="Apellidos" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" id="email" class="form-control" name="email" placeholder="Correo electrónico" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-ucamp btn-block">Empieza a aprender gratis</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="m-2 text-muted text-small">
                    Al continuar, aceptas nuestros Términos y condiciones, nuestra Política de Privacidad y que tus datos sean almacenados.
                </p>
            </div>
        </div>
        <!-- -->
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
