window.$ = window.jQuery = require('jquery');
import { gsap } from 'gsap';
import { MotionPathPlugin } from "gsap/MotionPathPlugin";

gsap.registerPlugin(MotionPathPlugin);

$(function ($) {

    $(".menu-options .option-item").each(function (index, element) {
        $(element).on("click", function () {
            const value_select = $(element).data("valium");
            $(element.parentNode.parentNode).find("strong.value-set").html(value_select)
            $(element.parentNode.parentNode).addClass("set-value")
            $(".content-section .callout").hide()
        })
    })

    const element_crear = $("#crear-formulario-btn")

    element_crear.on("click", function (event) {

        event.preventDefault();

        const width_box = $(".content-section .content-box")[0].offsetWidth
        $(".content-section .callout").width(width_box - 37)

        const item_year = $(".content-item.item-year").hasClass("set-value");
        const item_periodicidad = $(".content-item.item-periodicidad").hasClass("set-value")
        const item_periodo = $(".content-item.item-periodo").hasClass("set-value")

        if (item_year && item_periodicidad && item_periodo) {
            $(".content-section .callout").hide()
            const href_formulario = element_crear.data("urlwork") 
            location.href = href_formulario;
        } else {
            $(".content-section .callout").show()
        }
    })
});