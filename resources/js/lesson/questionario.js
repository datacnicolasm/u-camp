window.$ = window.jQuery = require('jquery');
import { GLOBAL_VARS } from '@globals';
import { gsap } from 'gsap';

$(function ($) {

    // Enviar respuesta del cuestonario
    $("#submit-respuesta").on("click", function (e) {
        e.preventDefault;

        $('input[name="option"]').each(function (index, element) {
            $(element.parentElement).removeClass("is-valid").removeClass("is-invalid")
        })

        // Obtener la opción seleccionada
        var selectedOption = $('input[name="option"]:checked').val();

        // Verificar si hay una opción seleccionada
        if (selectedOption) {

            var lessonId = $("#content-cuest").data("idlesson");
            var url = `${GLOBAL_VARS.api_url}lessons/${lessonId}/verifyResponse`;

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

                        const respuesta_correcta = $(".response-options .respuesta-correcta");
                        gsap.fromTo(
                            respuesta_correcta,
                            {
                                opacity: 0
                            },
                            {
                                display: "flex",
                                opacity: 1,
                                duration: .5,
                                ease: "power1.out",
                                onComplete: () => {
                                    $(respuesta_correcta).find(".aprobado").show()
                                }
                            }
                        );
                    } else {
                        $($('input[name="option"]:checked')[0].parentElement).addClass("is-invalid")

                        const respuesta_correcta = $(".response-options .respuesta-correcta");
                        gsap.fromTo(
                            respuesta_correcta,
                            {
                                opacity: 0
                            },
                            {
                                display: "flex",
                                opacity: 1,
                                duration: .5,
                                ease: "power1.out",
                                onComplete: () => {
                                    $(respuesta_correcta).find(".no-aprobado").show()
                                }
                            }
                        );
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

    // Volver a intentar
    $("#nuevo-intento").on("click", function(){
        const respuesta_correcta = $(".response-options .respuesta-correcta");

        $(respuesta_correcta).find(".no-aprobado").hide()

        gsap.fromTo(
            respuesta_correcta,
            {
                opacity: 1
            },
            {
                display: "none",
                opacity: 0,
                duration: .5,
                ease: "power1.out"
            }
        );
    })
});