<div class="home-signup">
    <div class="card m-0">
        <div class="card-body">
            <!-- Título de creación de cuenta -->
            <div class="text-create text-center">
                <p class="text-center">Crea tu cuenta gratis</p>
            </div>
            <!-- Formulario de creación de usuario -->
            <form method="POST" action="{{ route('process-sign-up') }}" id="signup-form">
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
                    <input type="text" id="first_name" class="form-control" name="first_name" placeholder="Nombres" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <!-- Campo de apellidos -->
                <div class="input-group mb-3">
                    <input type="text" id="last_name" class="form-control" name="last_name" placeholder="Apellidos" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <!-- Campo de correo electrónico -->
                <div class="input-group mb-3">
                    <input type="email" id="email" class="form-control" name="email" placeholder="Correo electrónico" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <!-- Campo de contraseña -->
                <div class="input-group mb-3">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirme la contraseña" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <!-- Botón de envío -->
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-ucamp btn-block">Empieza a aprender gratis</button>
                    </div>
                </div>
            </form>

            <!-- Términos y condiciones -->
            <p class="mt-3 mb-0 text-muted text-small">
                Al continuar, aceptas nuestros <a href="{{ route('terminos-home') }}">Términos y condiciones</a>, nuestra <a href="{{ route('privacidad-home') }}">Politica de Privacidad</a> y que tus datos sean almacenados.
            </p>
        </div>
    </div>
</div>

<!-- JavaScript para validar la longitud mínima de la contraseña -->
<script>
    document.getElementById('signup-form').addEventListener('submit', function(event) {
        var password = document.getElementById('password').value;
        if (password.length < 6) {
            event.preventDefault();
            alert('La contraseña debe tener al menos 6 caracteres.');
        }
    });
</script>