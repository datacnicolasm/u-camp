window.$ = window.jQuery = require('jquery');
import { gsap } from 'gsap';

$(function ($) {

    // Enviar respuesta del cuestonario
    $("#submit-respuesta").on("click", function (e) {
        e.preventDefault;

        $('input[name="option"]').each(function(index, element){
            $(element.parentElement).removeClass("is-valid").removeClass("is-invalid")
        })

        // Obtener la opción seleccionada
        var selectedOption = $('input[name="option"]:checked').val();

        // Verificar si hay una opción seleccionada
        if (selectedOption) {

            var lessonId = $("#content-cuest").data("idlesson");
            var url = `/ibero-lab/public/lessons/${lessonId}/verifyResponse`;

            // Enviar la opción seleccionada por AJAX
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    option: selectedOption,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.data.success) {
                        $($('input[name="option"]:checked')[0].parentElement).addClass("is-valid")

                        $(".response-options").find(".callout-danger").hide()
                        $(".response-options").find(".callout-success-incorrect").hide()
                        $("#submit-respuesta").hide()
                        $(".response-options").find(".callout-success").show()
                        $("#next-lesson-respuesta").show()
                    } else {
                        $($('input[name="option"]:checked')[0].parentElement).addClass("is-invalid")

                        $(".response-options").find(".callout-success").hide()
                        $(".response-options").find(".callout-danger").hide()
                        $(".response-options").find(".callout-success-incorrect").show()
                    }
                },
                error: function (xhr) {
                    $(".response-options").find(".callout-danger").show()
                }
            });
        } else {
            // Mostrar aviso
            $(".response-options").find(".callout-danger").show()
        }
    })
});