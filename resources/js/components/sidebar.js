window.$ = window.jQuery = require('jquery');

$(function($) {
    
    // Corregir error de clase opening
    $('.nav-item-group').on('click', function(event){
        if ($('.nav-item-group').hasClass('menu-is-opening')){

            $('.nav-item-group').removeClass('menu-is-opening')
            $('.nav-item-group').removeClass('menu-open')

        };
    })

})