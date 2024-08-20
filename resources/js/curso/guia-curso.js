window.$ = window.jQuery = require('jquery');
import { gsap } from 'gsap';
import { GLOBAL_VARS } from '@globals';

function getScreenSize() {
    const width = window.innerWidth;
    const height = window.innerHeight;
    return {
        width: width,
        height: height
    };
}

function getElementDimensions(element) {
    // Obtener el rectángulo delimitador del elemento
    const rect = element.getBoundingClientRect();

    // Obtener los estilos computados del elemento
    const style = window.getComputedStyle(element);

    // Obtener los márgenes
    const marginTop = parseFloat(style.marginTop);
    const marginBottom = parseFloat(style.marginBottom);
    const marginLeft = parseFloat(style.marginLeft);
    const marginRight = parseFloat(style.marginRight);

    // Calcular el ancho y alto total
    const totalWidth = rect.width + marginLeft + marginRight;
    const totalHeight = rect.height + marginTop + marginBottom;

    return {
        width: totalWidth,
        height: totalHeight
    };
}

function getElementPosition(element) {
    const rect = element.getBoundingClientRect();
    return {
        x: rect.left + window.scrollX,
        y: rect.top + window.scrollY
    };
}

function getQuerter(element) {
    var quarter = 0;
    const dimensions = getElementDimensions(element)
    const position = getElementPosition(element);
    const screenSize = getScreenSize();

    const x_position = position.x > (screenSize.width / 2);
    const y_position = position.y > (screenSize.height / 2);

    const y_double = dimensions.height > (screenSize.height * 0.5)

    if (x_position) {
        if (y_double) {
            quarter = "2-4";
        } else {
            if (y_position) {
                quarter = 4;
            } else {
                quarter = 2;
            }
        }
    } else {
        if (y_double) {
            quarter = "1-3";
        } else {
            if (y_position) {
                quarter = 3;
            } else {
                quarter = 1;
            }
        }
    }

    return quarter

}

function showNextStep(data) {

    const element_HTML = $(data.selector)
    const quarter_HTML = getQuerter(element_HTML[0])
    const position = getElementPosition(element_HTML[0]);
    const dimensions = getElementDimensions(element_HTML[0]);

    const callout_HTML = $("." + data.selector_callout)
    callout_HTML.show()

    switch (quarter_HTML) {
        case 1:
            var pos_top = Math.round(position.y) + (dimensions.height) + 10

            callout_HTML.css("top", pos_top)
            callout_HTML.css("left", Math.round(position.x))
            break;
        case 3:
            var pos_bottom = Math.round(position.y) - 10
            var pos_left = Math.round(position.x) + (dimensions.width) + 10

            callout_HTML.css("bottom", Math.round(pos_bottom))
            callout_HTML.css("left", Math.round(pos_left))
            break;

        case 2:
            var pos_top = Math.round(position.y) + (dimensions.height) + 10
            var pos_right = Math.round(position.x) - 10

            callout_HTML.css("top", Math.round(pos_top))
            callout_HTML.css("right", Math.round(pos_right))
            break;

        case 4:
            var pos_bottom = Math.round(position.y) - 20
            var pos_right = Math.round(position.x) - 510

            callout_HTML.css("top", Math.round(pos_bottom))
            callout_HTML.css("left", Math.round(pos_right))
            break;

        case "1-3":
            var pos_top = Math.round(position.y) + 20
            var pos_left = Math.round(position.x) + (dimensions.width) + 10

            callout_HTML.css("top", Math.round(pos_top))
            callout_HTML.css("left", Math.round(pos_left))
            break;

        case "2-4":
            var pos_top = Math.round(position.y) + 20
            var pos_left = Math.round(position.x) - 510

            callout_HTML.css("top", Math.round(pos_top))
            callout_HTML.css("left", Math.round(pos_left))
            break;

        default:
            break;
    }

    element_HTML.css("z-index", "9999")
    element_HTML.css("border", data.border)
    element_HTML.css("border-radius", data.border_radius)
    element_HTML.css("background-color", data.background_color)
}

function generateGuia(data) {

    $("#vamos-guia").on("click", function () {
        $(".modal-content-guia").css("display", "none")

        const step_current = parseInt($("#step-guia").val())
        const step_first = data.steps_guia[step_current]
        const element_HTML = $(step_first.selector)
        const quarter_HTML = getQuerter(element_HTML[0])
        const callout_HTML = $("." + step_first.selector_callout)
        const position = getElementPosition(element_HTML[0]);
        const dimensions = getElementDimensions(element_HTML[0]);

        callout_HTML.show()

        switch (quarter_HTML) {
            case 1:
                const pos_top = Math.round(position.y) + (dimensions.height * 1.1)

                callout_HTML.css("top", pos_top)
                callout_HTML.css("left", Math.round(position.x))
                break;

            default:
                break;
        }

        element_HTML.css("z-index", "9999")
        element_HTML.css("border", step_first.border)
        element_HTML.css("border-radius", step_first.border_radius)
        element_HTML.css("background-color", step_first.background_color)
    })

    $(".next-step").each(function (index, element) {
        // Eliminar cualquier evento previo para evitar duplicados
        $(element).off("click");

        // Agregar el evento click
        $(element).on("click", function () {

            const step_current = parseInt($("#step-guia").val());
            const selector_HTML = $($(element).data("selector"));
            const callout_HTML = $("." + $(element).data("callout"));

            callout_HTML.hide();

            selector_HTML.css({
                "z-index": "",
                "border": "",
                "border-radius": "",
                "background-color": ""
            });

            const max_step = data.steps_guia.length - 1;
            const next_step_num = step_current + 1;

            if (data.steps_guia[step_current].last_page) {
                $("#step-guia").val(0);
                $(".container-guia").hide();
                sessionStorage.setItem('guiaCamp', next_step_num);
            } else {
                $("#step-guia").val(next_step_num);
                showNextStep(data.steps_guia[next_step_num]);
            }
        });
    });

}

function generateGuiaContinue(data, index) {

    $("#step-guia").val(parseInt(index))

    const step_current = parseInt(index)
    const step_first = data[step_current]
    const element_HTML = $(step_first.selector)
    const quarter_HTML = getQuerter(element_HTML[0])
    const callout_HTML = $("." + step_first.selector_callout)
    const position = getElementPosition(element_HTML[0]);
    const dimensions = getElementDimensions(element_HTML[0]);

    callout_HTML.show()

    switch (quarter_HTML) {
        case 1:
            const pos_top = Math.round(position.y) + (dimensions.height * 1.1)

            callout_HTML.css("top", pos_top)
            callout_HTML.css("left", Math.round(position.x))
            break;

        default:
            break;
    }

    element_HTML.css("z-index", "9999")
    element_HTML.css("border", step_first.border)
    element_HTML.css("border-radius", step_first.border_radius)
    element_HTML.css("background-color", step_first.background_color)

    $(".next-step").each(function (index, element) {
        // Eliminar cualquier evento previo para evitar duplicados
        $(element).off("click");

        // Agregar el evento click
        $(element).on("click", function () {
            const step_current = parseInt($("#step-guia").val());
            const selector_HTML = $($(element).data("selector"));
            const callout_HTML = $("." + $(element).data("callout"));

            callout_HTML.hide();

            selector_HTML.css({
                "z-index": "",
                "border": "",
                "border-radius": "",
                "background-color": ""
            });

            if( data[step_current].trigger ){
                $( data[step_current].trigger ).trigger( "click" );
            }

            const max_step = data.length - 1;
            const next_step_num = step_current + 1;

            if (next_step_num > max_step) {
                $("#step-guia").val(0);
                $(".container-guia").hide();
                sessionStorage.setItem('guiaCamp', "0");
            } else {
                $("#step-guia").val(next_step_num);
                showNextStep(data[next_step_num]);
            }
        });
    });
}

$(function ($) {

    const step_guia_session = sessionStorage.getItem('guiaCamp') ? sessionStorage.getItem('guiaCamp') : "0";

    if (step_guia_session == "0") {

        $("#ayuda-curso").on("click", function () {

            $(".container-guia").css("display", "flex")
            $(".modal-content-guia").css("display", "flex")

            $.ajax({
                url: GLOBAL_VARS.api_url + 'lesson/getGuiaJSON',
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {

                    for (let index = 0; index < response.data.length; index++) {
                        const element = response.data[index];

                        if (element.name_visita == "DIAN_110") {
                            generateGuia(element)
                        }
                    }
                },
                error: function (xhr) {
                    console.log(xhr)
                }
            });
        })

        $(".modal-content-guia .close").on("click", function () {
            $(".container-guia").css("display", "none")
        })

    } else {

        $(".container-guia").css("display", "flex")

        $.ajax({
            url: GLOBAL_VARS.api_url + 'lesson/getGuiaJSON',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {

                for (let index = 0; index < response.data.length; index++) {
                    const element = response.data[index];

                    if (element.name_visita == "DIAN_110") {
                        generateGuiaContinue(element.steps_guia, step_guia_session)
                    }
                }
            },
            error: function (xhr) {
                console.log(xhr)
            }
        });
    }
});