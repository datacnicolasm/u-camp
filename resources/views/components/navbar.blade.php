<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <div class="logo-navbar">
        <span class="u-logo">Account</span>
        <span class="camp-logo">Camp</span>
    </div>

    <!-- Left navbar links -->
    <ul class="navbar-nav">

        <li class="nav-item mr-2">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

        <li class="nav-item-camp nav-item d-none d-sm-inline-block">
            <a href="{{ route('login-dashboard') }}" class="nav-link">Inicio</a>
        </li>

        <?php $class_items_grupos = "" ?>
        @if (Route::currentRouteName() == 'dashboard-grupos')
            <?php $class_items_grupos .= "active-item-bar" ?>
        @endif

        @if ( Auth::user()->has_groups )
            <li class="nav-item-camp nav-item d-none d-sm-inline-block <?php echo $class_items_grupos ?>">
                <a href="{{ route('dashboard-grupos') }}" class="nav-link">Grupos</a>
            </li>
        @endif
        
    </ul>
</nav>
<!-- /.navbar -->