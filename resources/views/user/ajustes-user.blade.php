@include('components.header')

<body class="layout-fixed">

    <div class="wrapper">

        <!-- Barra de navegacion superior -->
        @include('components.navbar')

        <!-- Barra de navegacion lateral -->
        @include('components.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <section class="content p-3">
                <div class="container">
                    <div class="row">

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="mb-3">Ajustes de cuenta</h3>

                                    <!-- -->
                                    <form class="form-cuenta" action="{{ route('user.update', $user->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group form-img-user">
                                            <label for="profile_image">Imagen de perfil</label>
                                            @if ($user->profile_image)
                                                <div class="cont-img">
                                                    <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image" width="150">
                                                    <div class="over-img">
                                                        <i class="fa fa-camera"></i>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="cont-img">
                                                    <img src="{{ asset('img/user-default.png') }}" alt="Profile Image" width="150">
                                                    <div class="over-img">
                                                        <i class="fa fa-camera"></i>
                                                    </div>
                                                </div>
                                            @endif
                                            <input type="file" class="form-control-file" id="profile_image"
                                                name="profile_image">
                                        </div>

                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input type="text" class="form-control form-control-sm" id="first_name"
                                                name="first_name" value="{{ $user->first_name }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" class="form-control form-control-sm" id="last_name"
                                                name="last_name" value="{{ $user->last_name }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control form-control-sm" id="password"
                                                name="password">
                                        </div>

                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <input type="text" class="form-control form-control-sm" id="country"
                                                name="country" value="{{ $user->country }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control form-control-sm" id="city"
                                                name="city" value="{{ $user->city }}">
                                        </div>

                                        <button type="submit" class="btn btn-sm btn-ucamp">Update</button>
                                    </form>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </div>

        <!-- Main footer -->
        @include('curso.components.main-footer')

    </div>

    @include('components.footer')
