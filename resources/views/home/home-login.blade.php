<div class="home-log-in">
    <div class="card card-outline card-outline-ibero card-primary">
        <div class="card-body">
            <!-- -->
            <div class="text-create text-center">
                <p class="text-center">¡Bienvenido de nuevo!</p>
            </div>
            @if (session('message'))
                <div class="alert alert-danger">
                    Los datos suministrados son incorrectos.
                </div>
            @endif
            <form method="POST" action="{{ route('process-login') }}">
                @csrf <!-- Directiva Blade para incluir el token CSRF -->
                <div class="input-group mb-3">
                    <input type="email" id="email" class="form-control" name="email" placeholder="Email Address"
                        required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-ucamp btn-block">Iniciar sesión</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="m-2 text-muted text-small">
                Al continuar, aceptas nuestros Términos y condiciones, nuestra Política de Privacidad y que tus datos
                sean almacenados.
            </p>
        </div>
    </div>
</div>
