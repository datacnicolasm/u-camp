window.$ = window.jQuery = require('jquery');
import { gsap } from 'gsap';

function formatCurrency(value) {
    // Redondear
    let roundedValue = (Math.round(value / 1000) * 1000).toFixed(0);
    
    // Convertir a formato de moneda con separador de miles
    let parts = roundedValue.split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    return parts.join(",");
}

$(function ($) {

    $(".accordion-header").on("click", function () {

        var content = $(this).next();
        var icon = $(this).find(".arrow-icon");

        // Alterna la visibilidad del contenido
        content.slideToggle();

        // Alterna la clase 'rotate' en el icono
        icon.toggleClass("rotate");
    });

    $("#btn-show").on("click", function (event) {

        const btn_send = $("#btn-send")

        const icon_plus = $("#btn-show i")

        if ($("#btn-show").hasClass("on-show")) {
            gsap.fromTo(
                icon_plus,
                {
                    rotation: 0,
                },
                {
                    rotation: 360,
                    duration: .5
                }
            );
            // Ocultar botones
            gsap.to(
                btn_send,
                {
                    display: "none",
                    opacity: 0,
                    y: 50,
                    duration: .5,
                    ease: "power1.out",
                    onComplete: function () {
                        $("#btn-show").removeClass("on-show")
                    }
                }
            );
        } else {
            gsap.fromTo(
                icon_plus,
                {
                    rotation: 0,
                },
                {
                    rotation: 360,
                    duration: .5
                }
            );
            // Mostrar botones
            gsap.fromTo(
                btn_send,
                {
                    opacity: 0,
                    y: 50,
                },
                {
                    display: "flex",
                    opacity: 1,
                    y: 0,
                    duration: .5,
                    ease: "power1.out",
                    onComplete: function () {
                        $("#btn-show").addClass("on-show")
                    }
                }
            );
        }
    })

    $("input.input-dian").each(function(index, element){
        $(element).on('keydown', function(e) {
            // Permitir teclas de control como backspace, tab, enter, escape, delete y flechas
            if (
                e.key === "Backspace" || e.key === "Tab" || e.key === "Enter" || 
                e.key === "Escape" || e.key === "Delete" || 
                (e.key >= "ArrowLeft" && e.key <= "ArrowDown")
            ) {
                return; // Permitir el evento
            }

            // Permitir teclas numéricas (0-9)
            if ((e.key >= '0' && e.key <= '9') || e.key === "0") {
                return; // Permitir el evento
            }

            // Prevenir el evento por defecto para cualquier otra tecla
            e.preventDefault();
        });       

        $(element).on('focus', function() {
            // Al hacer foco, eliminar los puntos
            let value = $(this).val().replace(/\./g, '').replace(',', '.');
            $(this).val(value);
        });
    
        $(element).on('blur', function() {
            // Al desenfocar, formatear el valor
            let value = parseFloat($(this).val().replace(/\./g, '').replace(',', '.'));
            if (!isNaN(value)) {
                let formattedValue = formatCurrency(value);
                $(this).val(formattedValue);
            }
        });
    })

    $("#btn-send").on("click", function(){
        var matrix_inputs = []
        $("input.input-dian").each(function(index, element){
            var val_input = $(element).val() ? $(element).val() : 0
            var name_input = $(element).data("cod-field")  

            matrix_inputs.push({
                name: name_input,
                val: val_input
            })
        })

        console.log(matrix_inputs)
    })

});