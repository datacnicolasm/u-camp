window.$ = window.jQuery = require('jquery');
import { GLOBAL_VARS } from '@globals';
import { gsap } from 'gsap';

$(function ($) {

    // Animacion de Footer Nav
    const footerbar = $('.view-curso-footer-nav');
    gsap.from(footerbar, { duration: 1.0, scale: 0, opacity: 0, ease: 'power2.out' });

    $(".button-container").find(".center-btn").on("click", function(){
        $(".content-type-lesson").toggleClass("active-content")
        $(".contenido-curso-main").toggle()
    });

    $(".contenido-curso-main").find(".close").on("click", function(){
        $(".contenido-curso-main").toggle()
        $(".content-type-lesson").toggleClass("active-content")
    });

})