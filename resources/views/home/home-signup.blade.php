<div class="home-signup">
    <div class="card m-0">
        <div class="card-body">
            <!-- -->
            <div class="text-create text-center">
                <p class="text-center">Crea tu cuenta gratis</p>
            </div>
            <!-- -->
            <form method="POST" action="{{ route('process-sign-up') }}">
                @csrf <!-- Directiva Blade para incluir el token CSRF -->
                <div class="input-group mb-3">
                    <input type="text" id="first_name" class="form-control" name="first_name" placeholder="First name"
                        required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" id="last_name" class="form-control" name="last_name" placeholder="Last name"
                        required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
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
                        <button type="submit" class="btn btn-ucamp btn-block">Empieza a aprender gratis</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mt-3 mb-0 text-muted text-small">
                Al continuar, aceptas nuestros Términos y condiciones, nuestra Política de Privacidad y que tus datos sean almacenados.
            </p>
        </div>
    </div>
</div>
