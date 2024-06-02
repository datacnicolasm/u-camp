<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título de la página</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Llamado al archivo CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-outline-ibero card-primary">
            <div class="card-header text-center">
                <a class="h1"><b>U</b>Camp</a>
            </div>
            <div class="card-body">
                @if($message == false)
                    <div class="alert alert-danger">
                        Los datos suministrados son incorrectos.
                    </div>
                @endif
                <form method="POST" action="{{ route('process-login') }}" >
                    @csrf <!-- Directiva Blade para incluir el token CSRF -->
                    <div class="input-group mb-3">
                        <input type="email" id="email" class="form-control" name="email" placeholder="Email Address" required>
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
                            <button type="submit" class="btn btn-ucamp btn-block">Empezar a aprender Gratis</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="m-2 text-muted text-small">
                    Al continuar, aceptas nuestros Términos y condiciones, nuestra Política de Privacidad y que tus datos sean almacenados.
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <!-- Llamado al archivo JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
