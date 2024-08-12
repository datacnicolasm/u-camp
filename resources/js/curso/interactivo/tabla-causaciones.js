window.$ = window.jQuery = require('jquery');
import { GLOBAL_VARS } from '@globals';
import { gsap } from 'gsap';

function formatCurrency(value) {
    // Redondear
    let roundedValue = value.toString();

    // Convertir a formato de moneda con separador de miles
    let parts = roundedValue.split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    return parts.join(",");
}

function setCuentasInput(data) {

    const data_cuentas = data;

    $('input.codigo-cuenta').each(function (index, element) {
        $(element).on('change', function () {
            const codigoCuenta = $(this).val();
            const cuenta = data_cuentas.find(cuenta => cuenta.codigo_cuenta === codigoCuenta);

            if (cuenta) {
                console.log(cuenta);
            } else {
                console.log('No se encontró ninguna cuenta con ese código.');
            }
        });
    });

}

$(function ($) {

    $("input.val-causacion").each(function (index, element) {
        $(element).on('keydown', function (e) {
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

        $(element).on('focus', function () {
            // Al hacer foco, eliminar los puntos
            let value = $(this).val().replace(/\./g, '').replace(',', '.');
            $(this).val(value);
        });

        $(element).on('blur', function () {
            // Al desenfocar, formatear el valor
            let value = parseFloat($(this).val().replace(/\./g, '').replace(',', '.'));
            if (!isNaN(value)) {
                let formattedValue = formatCurrency(value);
                $(this).val(formattedValue);
            }
        });
    })

    $(".btn-mark-asiento").each(function (index, element) {
        $(element).on('click', function () {

            if (!$(element.parentNode).hasClass('asiento-marked')) {
                $(element.parentNode).toggleClass('asiento-marked');

                $(element.parentNode).find('.form-causacion').each(function (index, element) {
                    $(element).css('background-color', "rgb(103, 222, 200)")
                });
            } else {
                $(element.parentNode).toggleClass('asiento-marked');

                $(element.parentNode).find('.form-causacion').each(function (index, element) {
                    $(element).css('background-color', "rgb(255, 255, 255)")
                });
            }
        });
    });
});