window.$ = window.jQuery = require('jquery');
import { GLOBAL_VARS } from '@globals';
import { gsap } from 'gsap';

$(function ($) {
    // Inicializar el selector de fecha y hora
    $('#datetime-edit').datetimepicker({
        format: 'YYYY-MM-DD hh:mm a',
        icons: {
            time: 'fas fa-clock',
            date: 'fas fa-calendar',
            up: 'fas fa-chevron-up',
            down: 'fas fa-chevron-down',
            previous: 'fas fa-chevron-left',
            next: 'fas fa-chevron-right',
            today: 'fas fa-calendar-check',
            clear: 'fas fa-trash',
            close: 'fas fa-times'
        },
        defaultDate: $('#datetime-edit').data('datetime')
    });

    const configSummernote = {
        height: 200,
        placeholder: 'Escribe aquí...',
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['para', ['ul', 'ol', 'justify']],
        ]
    }
    //Add text editor
    $('#textarea-contexto').summernote(configSummernote);
    $('#textarea-indicaciones').summernote(configSummernote);


    $(".accordion-camp .header-edit-lesson").each(function (index, element) {
        $(element).on("click", function () {
            var content = $(this).next();
            var icon = $(this).find(".arrow-icon");

            // Alterna la visibilidad del contenido
            content.slideToggle();

            if (!icon.hasClass("actived")) {
                gsap.fromTo(
                    icon,
                    {
                        rotation: 0,
                        backgroundColor: "#d31a71"
                    },
                    {
                        rotation: 180,
                        backgroundColor: "#05bd9b",
                        duration: .5,
                        ease: "power1.out",
                        onComplete: function () {
                            icon.addClass("actived")
                        }
                    }
                );
            } else {
                gsap.fromTo(
                    icon,
                    {
                        rotation: 180,
                        backgroundColor: "#05bd9b"
                    },
                    {
                        rotation: 0,
                        backgroundColor: "#d31a71",
                        duration: .5,
                        ease: "power1.out",
                        onComplete: function () {
                            icon.removeClass("actived")
                        }
                    }
                );
            }
        });
    })

    $(".accordion-dian .accordion-header").each(function (index, element) {
        $(element).on("click", function () {
            var content = $(this).next();
            var icon = $(this).find(".arrow-icon");

            // Alterna la visibilidad del contenido
            content.slideToggle();

            if (!icon.hasClass("actived")) {
                gsap.fromTo(
                    icon,
                    {
                        rotation: 0,
                    },
                    {
                        rotation: 180,
                        duration: .5,
                        ease: "power1.out",
                        onComplete: function () {
                            icon.addClass("actived")
                        }
                    }
                );
            } else {
                gsap.fromTo(
                    icon,
                    {
                        rotation: 180,
                    },
                    {
                        rotation: 0,
                        duration: .5,
                        ease: "power1.out",
                        onComplete: function () {
                            icon.removeClass("actived")
                        }
                    }
                );
            }
        });
    })

    $("#btn-edit-workshop").on("click", function(){

        const codWorkshop = $("#workshop-edit").data("cod-workshop")
        const contexto = $("#textarea-contexto").val()
        const indicaciones = $("#textarea-indicaciones").val()

        var matrix_inputs = []

        $("input.input-dian").each(function (index, element) {
            var val_input = $(element).val() ? parseFloat($(element).val().replace(/\./g, '').replace(',', '.')) : 0
            var name_input = $(element).data("cod-field")
            var name_section = $(element).data("section")

            matrix_inputs.push({
                name: name_input,
                val: val_input,
                name_section: name_section
            })
        })

        const dataSend = {
            id_workshop: codWorkshop,
            contexto: contexto,
            indicaciones: indicaciones,
            campos: matrix_inputs,
            _token: $('meta[name="csrf-token"]').attr('content')
        }

        $.ajax({
            url: GLOBAL_VARS.api_url + 'workshop/' + codWorkshop + '/editWorkshop',
            type: 'POST',
            data: dataSend,
            success: function (response) {
                console.log(response)
                location.reload();
            },
            error: function (xhr) {
                console.log(xhr)
            }
        });

        console.log(dataSend)
    })

});