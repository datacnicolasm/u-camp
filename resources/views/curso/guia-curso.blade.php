@php
    $formattedName = ucwords(strtolower(Auth::user()->first_name));
@endphp

<section class="container-guia">
    <input type="number" name="step-guia" id="step-guia" value="0">
    <div class="modal-content-guia">
        <div class="modal-header-guia">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body-guia">
            <i class="fas fa-check-circle"></i>
            <h4 class="mb-3">Hola {{ $formattedName }}</h4>
            @php
                echo $obj_guia['text_portada'];
            @endphp
            <button id="vamos-guia" class="btn mb-2 btn-3-ucamp">{{ $obj_guia['text_btn'] }}</button>
        </div>
    </div>
        @php
            foreach ($obj_guia["steps_guia"] as $key => $step) {
                echo '<div class="' . $step["selector_callout"] . ' callout callout-info callout-curso">';
                echo $step["text_callout"];
                echo '<div class="mt-2 content-next-step">';
                echo '<div data-callout="'.$step["selector_callout"].'" data-selector="'.$step["selector"].'" class="next-step">';
                echo 'Siguiente';
                echo '<i class="ml-1 fas fas fa-chevron-right"></i>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        @endphp
</section>
