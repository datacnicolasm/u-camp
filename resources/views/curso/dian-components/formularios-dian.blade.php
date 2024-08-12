<div class="content-formularios">
    @php
        if (isset($guia)) {
            foreach ($guia as $key => $value) {
                if ($value['name_visita'] == 'DIAN_110') {
                    $obj_guia = $value;
                }
            }
        }
    @endphp

    <!-- -->
    @include('curso.dian-components.header-dian')

    <!-- -->
    @include('curso.dian-components.new-dian')

    <!-- -->
    <!-- include('curso.guia-curso') -->
</div>
