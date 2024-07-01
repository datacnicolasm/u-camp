window.$ = window.jQuery = require('jquery');
import { gsap } from 'gsap';

$(function ($) {

    $(".accordion-header").on("click", function() {
        
        var content = $(this).next();
        var icon = $(this).find(".arrow-icon");
        
        // Alterna la visibilidad del contenido
        content.slideToggle();
        
        // Alterna la clase 'rotate' en el icono
        icon.toggleClass("rotate");

    });

});