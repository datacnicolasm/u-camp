<div class="interactivo-view-curso">

    <!-- Paneles laterales -->
    <div id="left-interactivo" class="side-panel">
        @include('curso.interactivo.left-interactivo')
    </div>
    <div id="right-interactivo" class="side-panel">
        @include('curso.interactivo.right-interactivo')
    </div>

    <!-- Botones para mostrar paneles -->
    <button id="btn-left-panel" class="panel-btn btn-left-panel">
        <i class="fas fa-arrow-right"></i>
        <span class="panel-btn-text">Ver estados financieros</span>
    </button>
    <button id="btn-right-panel" class="panel-btn btn-right-panel">
        <i class="fas fa-arrow-left"></i>
        <span class="panel-btn-text">Ver instrucciones</span>
    </button>

    <!-- Contenedor de contenido interactivo -->
    <div id="workshop-account" data-workshop-account="0" class="container-fluid content-workshop-account">
        <div class="container-paneles-c">
            <div class="panel-c left-panel-c content-causaciones">
                @include('curso.interactivo.content-causaciones')
            </div>
            <div class="resizer">
                <div class="resizer-icon">
                    <i class="fas fa-arrows-alt-h"></i>
                </div>
            </div>
            <div class="panel-c right-panel-c">
                <h1>sss</h1>
            </div>
        </div>
    </div>

</div>
