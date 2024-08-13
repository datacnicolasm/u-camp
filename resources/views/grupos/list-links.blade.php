@include('components.header')

<body>

    <div class="wrapper">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('user') }}
            </div>
        @endif

        <!-- Barra de navegacion superior -->
        @include('components.navbar')

        <!-- Barra de navegacion lateral -->
        @include('grupos.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <div class="container list-groups">

                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-12">
                                <h1 class="m-0">Enlaces de invitación</h1>
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

                                    @php
                                        $list_links = \App\Models\GroupInvitationLink::getListLinksUser(Auth::user());
                                    @endphp

                                    @if (count($list_links) == 0)
                                        <div class="card-body p-0">
                                            <div class="no-items">
                                                <div class="icon">
                                                    <i class="fas fa-users-slash"></i>
                                                </div>
                                                <div class="text">No tienes enlaces creados</div>
                                            </div>
                                        </div>
                                    @endif

                                    @if (count($list_links) > 0)

                                        <!-- Card body -->
                                        <div class="card-body p-0">
                                            <!-- Tabla de grupos -->
                                            <table class="table-groups table">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 20px">#</th>
                                                        <th style="width: 25%">Nombre grupo</th>
                                                        <th style="width: 20%">Vencimiento</th>
                                                        <th>Enlace</th>
                                                    </tr>
                                                </thead>

                                                <!-- Listado de grupos -->
                                                <tbody>
                                                    @if ($list_links)
                                                        @foreach ($list_links as $link)
                                                            <tr>
                                                                <td style="vertical-align: middle;"><span>{{ $link->id }}</span></td>
                                                                <td style="vertical-align: middle;"><span>{{ $link->group->name }}</span></td>
                                                                <td style="vertical-align: middle;">
                                                                    <span>{{ \Carbon\Carbon::parse($link->expires_at)->format('d - M - Y') }}</span>
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="link-generate" class="form-control" value="{{ route('join-group', ['key' => $link->invitation_key]) }}" readonly>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>

                                    @endif


                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>

        <!-- Main footer -->
        @include('curso.components.main-footer')

    </div>

    @include('components.footer')
