<!-- Navbar -->
<nav class="view-curso-navbar">

    <div class="container">
        <div class="row">
            
            <!-- Tools de curso-->
            <div class="col-4 container-course-tools">Elemento a la izquierda</div>

            <!-- Guia del curso-->
            <div class="col-4 container-course-guide">Elemento en el centro</div>

            <!-- Breadcrumb -->
            <div class="col-4 container-breadcrumb">

                <ol class="view-curso-breadcrumb float-right">
                    <li class="item-breadcrumb"><a href="#">Aprendizaje</a></li>
                    <li class="item-breadcrumb"><a href="#">Cursos</a></li>
                    <li class="item-breadcrumb active">{{$curso->titulo}}</li>
                </ol>

            </div>
        </div>
    </div>

</nav>
<!-- /.navbar -->
