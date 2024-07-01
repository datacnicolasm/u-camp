window.$ = window.jQuery = require('jquery');
import { gsap } from 'gsap';
import { MotionPathPlugin } from "gsap/MotionPathPlugin";

gsap.registerPlugin(MotionPathPlugin);

$(function ($) {
    // Definir la trayectoria de movimiento similar a un pez nadando
    gsap.to(".loading-icon", {
        duration: 6, // Duración total de la animación
        repeat: -1, // Repetir infinitamente
        ease: "power1.inOut", // Tipo de animación
        motionPath: {
            path: [
                { x: 0, y: 0 },
                { x: 15, y: -30 },
                { x: 30, y: 0 },
                { x: 45, y: 30 },
                { x: 60, y: 0 },
                { x: 75, y: -30 },
                { x: 90, y: 0 },
                { x: 105, y: 30 },
                { x: 120, y: 0 },
                { x: 135, y: -30 },
                { x: 150, y: 0 },
                { x: 165, y: 30 },
                { x: 180, y: 0 },
                { x: 200, y: -30 },
            ],
            curviness: 1.25, // Curvatura de la trayectoria
            autoRotate: false // No rotar el objeto automáticamente
        }
    });

    // Duración de la pantalla de carga en milisegundos (5 minutos)
    var loadingDuration = 5500;

    // Mostrar la pantalla de carga
    $(".loading-screen").fadeIn();

    // Ocultar la pantalla de carga después de la duración especificada
    setTimeout(function () {
        gsap.to(".loading-screen", {
            opacity: 0, // Desvanecer la pantalla de carga
            duration: 1, // Duración del desvanecimiento
            onComplete: function () {
                $(".loading-screen").remove(); // Remover la pantalla de carga del DOM
            }
        });
    }, loadingDuration);
});