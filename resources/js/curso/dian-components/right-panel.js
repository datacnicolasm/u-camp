window.$ = window.jQuery = require('jquery');
import { GLOBAL_VARS } from '@globals';
import { gsap } from 'gsap';

$(function ($) {

    $(".law-item .accordion-header").on("click", function () {
        var content = $(this).next();
        var icon = $(this).find(".arrow-icon");

        // Alterna la visibilidad del contenido
        content.slideToggle();

        if( !icon.hasClass("actived") ){
            gsap.fromTo(
                icon,
                {
                    rotation: 0,
                    backgroundColor: "#d31a71"
                },
                {
                    rotation: 180,
                    backgroundColor: "#05bd9b",
                    duration: .5,
                    ease: "power1.out",
                    onComplete: function(){
                        icon.addClass("actived")    
                    }
                }
            );
        } else {
            gsap.fromTo(
                icon,
                {
                    rotation: 180,
                    backgroundColor: "#05bd9b"
                },
                {
                    rotation: 0,
                    backgroundColor: "#d31a71",
                    duration: .5,
                    ease: "power1.out",
                    onComplete: function(){
                        icon.removeClass("actived")    
                    }
                }
            );
        }
    });

});