<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <div class="logo-navbar">
        <span class="u-logo">Account</span>
        <span class="camp-logo">Camp</span>
    </div>

    <!-- Left navbar links -->
    <ul class="navbar-nav">

        <li class="nav-item mr-2">
            <a id="btn-pushmenu" class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

    </ul>

    <!--  Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown show mr-4">
            <a class="nav-link user-nav" data-toggle="dropdown" href="#" aria-expanded="true">
                <i class="far fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="{{ route('user-cuenta') }}" class="dropdown-item">
                    <i class="fas fa-cog mr-2"></i>
                    Ajustes de cuenta
                </a>
                <div class="dropdown-divider"></div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="#" class="dropdown-item dropdown-footer" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-right-from-bracket mr-2"></i>
                    Cerrar sesión
                </a>
            </div>
        </li>

    </ul>
</nav>
<!-- /.navbar -->
