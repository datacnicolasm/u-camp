window.$ = window.jQuery = require('jquery');
import { GLOBAL_VARS } from '@globals';
import { gsap } from 'gsap';

$(function ($) {

    function togglePanel(panelId, buttonClass, textShow, textHide, iconShowClass, iconHideClass, isLeft = true) {
        const panel = $(panelId);
        const button = $(buttonClass);
        const isActive = panel.hasClass('active-panel');

        if (isLeft) {
            // Animaciones para el panel izquierdo
            if (isActive) {
                gsap.to(panelId, {
                    keyframes: [
                        { left: "-51%", duration: 1, ease: "power4.out" },
                        { left: "-50%", duration: 0.5, ease: "bounce.out" }
                    ]
                });
            } else {
                gsap.to(panelId, {
                    keyframes: [
                        { left: "1%", duration: 1, ease: "power4.out" },
                        { left: "0%", duration: 0.5, ease: "bounce.out" }
                    ]
                });
            }
        } else {
            // Animaciones para el panel derecho
            if (isActive) {
                gsap.to(panelId, {
                    keyframes: [
                        { right: "-51%", duration: 1, ease: "power4.out" },
                        { right: "-50%", duration: 0.5, ease: "bounce.out" }
                    ]
                });
            } else {
                gsap.to(panelId, {
                    keyframes: [
                        { right: "1%", duration: 1, ease: "power4.out" },
                        { right: "0%", duration: 0.5, ease: "bounce.out" }
                    ]
                });
            }
        }

        // Alternar clases y texto del botón
        if (isActive) {
            panel.removeClass('active-panel');
            button.find(".fas").removeClass(iconHideClass).addClass(iconShowClass);
            button.find(".panel-btn-text").text(textShow);
        } else {
            panel.addClass('active-panel');
            button.find(".fas").removeClass(iconShowClass).addClass(iconHideClass);
            button.find(".panel-btn-text").text(textHide);
        }
    }

    // Click para mostrar/ocultar panel izquierdo
    $("#btn-left-panel").on('click', function (event) {
        togglePanel("#left-interactivo", ".left-btn", 'Ver estados financieros', 'Ocultar estados financieros', 'fa-arrow-right', 'fa-arrow-left', true);
    });

    // Click para mostrar/ocultar panel derecho
    $("#btn-right-panel").on('click', function (event) {
        togglePanel("#right-interactivo", ".right-btn", 'Ver instrucciones', 'Ocultar instrucciones', 'fa-arrow-left', 'fa-arrow-right', false);
    });

    const resizer = $('.resizer');
    const container = $('.container-paneles-c');
    let isResizing = false;
    let lastDownX = 0;

    resizer.on('mousedown', function (e) {
        isResizing = true;
        lastDownX = e.clientX;
        e.preventDefault();
    });

    $(document).on('mousemove', function (e) {
        if (!isResizing) return;

        let offsetLeft = e.clientX - container.offset().left;
        let containerWidth = container.width();

        // Adjust the panels
        $('.left-panel-c').css('flex', `0 0 ${offsetLeft}px`);
        $('.right-panel-c').css('flex', `0 0 ${containerWidth - offsetLeft - resizer.width()}px`);

        // Adjust the resizer position
        resizer.css('left', `${offsetLeft - (resizer.width() / 2)}px`);
    });

    $(document).on('mouseup', function (e) {
        isResizing = false;
    });

});