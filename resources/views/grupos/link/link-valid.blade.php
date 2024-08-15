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
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- -->
            <div class="col-12">
                <div class="row justify-content-md-center">
                    <div class="col-6">
                        <div class="card create-cuenta-info">
                            <div class="card-body">
                                <p class="my-3">Para unirte al grupo <strong>{{ $group->name }}</strong>, debes iniciar sesión con tu cuenta:</p>

                                <div class="my-4 row justify-content-md-center">
                                    <div class="col-8">
                                        <!-- Formulario de creación de usuario -->
                                        <form method="POST" action="{{ route('link-attach-group') }}" id="link-new-user">
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

                                            <input type="text" id="key" name="key" value="{{ $invitation_key }}">

                                            <!-- Botón de envío -->
                                            <div class="row">
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-ucamp btn-block">
                                                        Iniciar sesión
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

             <!-- -->
             <div class="mb-5 col-12">
                <div class="row justify-content-md-center">
                    <p class="text-center m-0">
                        <form id="linkIsUserForm" action="{{ route('link-new-user-view') }}" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="user_create" value="{{ $user_create->id }}">
                            <input type="hidden" name="group" value="{{ $group->id }}">
                            <input type="hidden" name="invitation_key" value="{{ $invitation_key }}">
                        </form>
                        
                        ¿Ya tienes una cuenta? <a href="#" onclick="document.getElementById('linkIsUserForm').submit();"><b>Clic aquí</b></a> para iniciar sesión.
                    </p>
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
