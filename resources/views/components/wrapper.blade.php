<div class="container dashboard-container pt-4">

    @php
        $formattedName = ucwords(strtolower(Auth::user()->first_name));
    @endphp

    <!-- Notificaciones -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if (!Auth::user()->hasVerifiedEmail())
                    <div class="callout callout-danger">
                        <h5>{{ $formattedName }}, verifica tu dirección de correo electrónico para comenzar</h5>
                        <p>¡Ya casi está todo listo! Para completar tu registro, por favor verifica tu dirección de
                            correo electrónico.</p>
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit" class="btn btn-3-ucamp">Reenviar correo de verificación</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>



    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-sm-right">
                        <button class="btn btn-ucamp btn-add-group" data-toggle="modal" data-target="#crear-modal"
                            type="button">
                            <i class="fas fa-plus"></i> Crear grupo
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <!-- Card header -->
                        <div class="card-header py-3">
                            <h3 class="card-title">Este es el listado de tus grupos</h3>
                        </div>

                        <!-- Card body -->
                        <div class="card-body p-0">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
