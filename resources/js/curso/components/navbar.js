window.$ = window.jQuery = require('jquery');
import { gsap } from 'gsap';

$(function ($) {
    
    // Función para actualizar la barra de progreso
    function updateProgressBar(percentage) {
        var progressBar = $('#progress-bar');
        if (percentage >= 0 && percentage <= 100) {
            progressBar.css('width', percentage + '%');
            progressBar.text(percentage + '%');
        }
    }

    // Ejemplo: Actualizar la barra de progreso al 50%
    updateProgressBar(50);

    // Animacion de NavBar
    const navbar = $('.view-curso-navbar');
    gsap.from(navbar, { duration: 1.0, scale: 0, opacity: 0, ease: 'power2.out' });
})