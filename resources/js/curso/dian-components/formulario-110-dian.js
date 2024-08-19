window.$ = window.jQuery = require('jquery');
import { GLOBAL_VARS } from '@globals';
import { gsap } from 'gsap';
import Chart from 'chart.js/auto';

function formatCurrency(value) {
    // Redondear
    let roundedValue = (Math.round(value / 1000) * 1000).toFixed(0);

    // Convertir a formato de moneda con separador de miles
    let parts = roundedValue.split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    return parts.join(",");
}

function getValueByName(name, data) {
    // Encontrar el objeto
    const obj = data.find(item => item.name === name);
    // Asignar el valor del objeto a una variable
    let value = obj ? obj.val : null;
    return value;
}

function updateFormValues() {
    // Inicializar variables en 0
    var total_patrimonio = 0;
    var ingresos_brutos = 0;
    var ingresos_netos = 0;
    var total_costos_gastos = 0;
    var renta_liquida = 0;
    var perdida_liquida = 0;
    var total_impuesto_rentas = 0;

    // Construccion de matriz con valores
    var matrix_inputs = []

    $("input.input-dian").each(function (index, element) {
        var val_input = $(element).val() ? $(element).val() : "0"
        var float_input = parseFloat(val_input.replace(/\./g, '').replace(',', '.'))
        var name_input = $(element).data("cod-field")

        matrix_inputs.push({
            name: name_input,
            val: float_input
        })
    })

    // Iteracion para sumar variables
    $("input.input-dian").each(function (index, element) {
        var val_input = $(element).val() ? $(element).val() : "0"
        var float_input = parseFloat(val_input.replace(/\./g, '').replace(',', '.'))
        var group_input = $(element).data("group-field")

        switch (group_input) {
            case "patrimonio-bruto":
                total_patrimonio += float_input
                break;
            case "ingresos-brutos":
                ingresos_brutos += float_input
                break;
            case "ingresos-netos":
                ingresos_netos -= float_input
                break;
            case "costos-deducibles":
                total_costos_gastos += float_input
                break;
            case "tota-impuesto-rentas-liquidas":
                total_impuesto_rentas += float_input
                break;
            default:
                break;
        }
    })

    // Pasivos
    var pasivos_float = getValueByName('110-013', matrix_inputs)

    // Asignacion de totales en casillas
    $("#input-012").val(formatCurrency(total_patrimonio))
    $("#input-014").val(formatCurrency(total_patrimonio - pasivos_float))
    $("#input-026").val(formatCurrency(ingresos_brutos))
    $("#input-029").val(formatCurrency(ingresos_brutos + ingresos_netos))
    $("#input-035").val(formatCurrency(total_costos_gastos))
    $("#input-059").val(formatCurrency(total_impuesto_rentas))

    // Renta liquida ordinaria del ejercicio
    var input_69 = getValueByName('110-037', matrix_inputs)
    var input_70 = getValueByName('110-038', matrix_inputs)
    var input_71 = getValueByName('110-039', matrix_inputs)
    var input_52 = getValueByName('110-020', matrix_inputs)
    var input_53 = getValueByName('110-021', matrix_inputs)
    var input_54 = getValueByName('110-022', matrix_inputs)
    var input_55 = getValueByName('110-023', matrix_inputs)
    var input_56 = getValueByName('110-024', matrix_inputs)
    var input_68 = getValueByName('110-036', matrix_inputs)

    renta_liquida = ingresos_brutos + ingresos_netos
    renta_liquida += input_69 + input_70 + input_71
    renta_liquida -= (input_52 + input_53 + input_54 + input_55 + input_56 + total_costos_gastos + input_68)

    if (renta_liquida > 0) {
        $("#input-040").val(formatCurrency(renta_liquida))
        $("#input-041").val(0)
        $("#input-043").val(formatCurrency(renta_liquida - getValueByName('110-042', matrix_inputs)))

        var renta_liquida_75 = getValueByName('110-043', matrix_inputs)
        var renta_presuntiva = getValueByName('110-044', matrix_inputs)
        var renta_exenta = getValueByName('110-045', matrix_inputs)
        var rentas_gravables = getValueByName('110-046', matrix_inputs)
        var renta_liquida_gravable = renta_liquida_75 - renta_exenta + rentas_gravables

        $("#input-047").val(formatCurrency(renta_liquida_gravable))
    } else {
        perdida_liquida = Math.abs(renta_liquida)
        $("#input-041").val(formatCurrency(perdida_liquida))
        $("#input-040").val(0)
        $("#input-043").val(0)
    }

    // Ganancias ocasionales
    var input_80 = getValueByName('110-048', matrix_inputs)
    var input_81 = getValueByName('110-049', matrix_inputs)
    var input_82 = getValueByName('110-050', matrix_inputs)
    var input_83 = input_80 - input_81 - input_82

    if (input_83 > 0) {
        $("#input-051").val(formatCurrency(input_83))
    } else {
        $("#input-051").val(0)
    }

    // Impuesto neto de renta
    var input_92 = getValueByName('110-060', matrix_inputs)
    var input_93 = getValueByName('110-061', matrix_inputs)
    var input_94 = total_impuesto_rentas + input_92 - input_93

    if (input_94 > 0) {
        $("#input-062").val(formatCurrency(input_94))
    } else {
        $("#input-062").val(0)
    }

    // Impuesto neto de renta + adicionado
    var input_95 = getValueByName('110-063', matrix_inputs)
    var input_96 = input_94 + input_95

    if (input_96 > 0) {
        $("#input-064").val(formatCurrency(input_96))
    } else {
        $("#input-064").val(0)
    }

    // Total impuesto a cargo
    var input_97 = getValueByName('110-065', matrix_inputs)
    var input_98 = getValueByName('110-066', matrix_inputs)
    var input_99 = input_96 + input_97 - input_98

    if (input_99 > 0) {
        $("#input-067").val(formatCurrency(input_99))
    } else {
        $("#input-067").val(0)
    }

    // Total retenciones
    var input_105 = getValueByName('110-077', matrix_inputs)
    var input_106 = getValueByName('110-076', matrix_inputs)
    var input_107 = input_105 + input_106

    if (input_107 > 0) {
        $("#input-075").val(formatCurrency(input_107))
    } else {
        $("#input-075").val(0)
    }

    // Saldo a pagar
    var input_108 = getValueByName('110-076', matrix_inputs)
    var input_110 = getValueByName('110-076', matrix_inputs)
    var input_100 = getValueByName('110-076', matrix_inputs)
    var input_101 = getValueByName('110-076', matrix_inputs)
    var input_102 = getValueByName('110-076', matrix_inputs)
    var input_103 = getValueByName('110-076', matrix_inputs)
    var input_104 = getValueByName('110-076', matrix_inputs)
    var input_109 = getValueByName('110-076', matrix_inputs)
    var input_111 = input_99 + input_108 + input_110 - input_100 - input_101 - input_102 - input_103 - input_104 - input_107 - input_109

    if (input_111 > 0) {
        $("#input-079").val(formatCurrency(input_111))
    } else {
        $("#input-079").val(0)
    }

    var input_112 = getValueByName('110-080', matrix_inputs)
    var input_113 = input_111 + input_112
    if (input_113 > 0) {
        $("#input-081").val(formatCurrency(input_113))
        $("#input-082").val(0)
    } else {
        $("#input-082").val(formatCurrency(Math.abs(input_113)))
        $("#input-081").val(0)
    }

}

$(function ($) {

    $(".content-formulario .accordion-header").on("click", function () {

        var content = $(this).next();
        var icon = $(this).find(".arrow-icon");

        // Alterna la visibilidad del contenido
        content.slideToggle();

        if (!icon.hasClass("actived")) {
            gsap.fromTo(
                icon,
                {
                    rotation: 0
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
                    rotation: 180
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

    $("#btn-show").on("click", function (event) {

        const btn_send = $(".btns-forms")

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

    $("input.input-dian").each(function (index, element) {
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
            updateFormValues();
        });
    })

    // Ocultar resultados
    $(".btn-resultados").on("click", function () {
        const cont_resultados = $(".container-resultados-DIAN")
        const resultados_item = $(".container-resultados-DIAN .card-resultados")

        gsap.fromTo(
            resultados_item,
            {
                opacity: 1,
                y: 0,
                duration: .5,
                ease: "power1.out"
            },
            {
                opacity: 0,
                y: 200,
                onComplete: function () {
                    cont_resultados.hide()
                }
            }
        );
    })

    $("input.input-dian").each(function (index, element) {
        $(element).on('focus', function (e) {

            const top_position = $(element.parentNode).position().top - 2

            const cod_field = $(element).data("cod-field")

            console.log(cod_field)

            $("#110-" + cod_field).show()
            $("#110-" + cod_field).css("margin-top", top_position + "px")

        });

        $(element).on('blur', function (e) {

            const cod_field = $(element).data("cod-field")

            $("#110-" + cod_field).hide()

        });
    })

});