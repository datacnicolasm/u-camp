window.$ = window.jQuery = require('jquery');

$(function ($) {
    let maxWidth = 0;

    // Encuentra el ancho máximo
    $('.content-item').each(function() {
        let width = $(this).outerWidth();
        if (width > maxWidth) {
            maxWidth = width;
        }
    });

    // Aplica el ancho máximo a todos los elementos
    $('.content-item').css('width', maxWidth);
});