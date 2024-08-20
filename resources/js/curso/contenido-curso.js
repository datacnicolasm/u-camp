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

$(function ($) {
    $(".button-container").find(".center-btn").on("click", function () {
        $(".content-type-lesson").toggleClass("active-content")
        $(".contenido-curso-main").toggle()

        const size = getScreenSize();
        const size_footer = getElementDimensions($(".view-curso-footer-nav")[0]);
        const size_navbar = getElementDimensions($(".view-curso-navbar")[0]);
        const modal_header = getElementDimensions($(".contenido-curso-main .modal-header")[0]);
        const contenido_curso_main = $(".contenido-curso-main");
        const modal_body = $(".contenido-curso-main .modal-body");
        const height_body = (size.height - size_footer.height - size_navbar.height - modal_header.height) * .9;

        modal_body.css("height", height_body);
        contenido_curso_main.css("bottom", size_footer.height + 10);
    });

    $(".contenido-curso-main .close").on("click", function(){
        $(".content-type-lesson").toggleClass("active-content")
        $(".contenido-curso-main").toggle()
    })

    $('.items-contenido .chapter-item').each(function (index, element) {
        const progress_value = $(element).find('.progress-container').data('progress')
        const progress_bar = $(element).find('.progress-bar')
        const progress_text = $(element).find(".progress-text")

        progress_bar.css('width', progress_value + '%');
        progress_text.text(progress_value + '%');
    })
});