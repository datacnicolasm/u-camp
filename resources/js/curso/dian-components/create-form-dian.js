window.$ = window.jQuery = require('jquery');
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
    $("#left-panel-btn").on('click', function(event) {
        togglePanel("#left-panel", ".left-btn", 'Ver estados financieros', 'Ocultar estados financieros', 'fa-arrow-right', 'fa-arrow-left', true);
    });

    // Click para mostrar/ocultar panel derecho
    $("#right-panel-btn").on('click', function(event) {
        togglePanel("#right-panel", ".right-btn", 'Ver instrucciones', 'Ocultar instrucciones', 'fa-arrow-left', 'fa-arrow-right', false);
    });
});
