window.$ = window.jQuery = require('jquery');

$(function ($) {

    function equalizeHeights() {
        var maxHeight = 0;
        
        // Reset heights to auto to recalculate them correctly
        $('.item-ruta').css('height', 'auto');
        
        // Loop through each li and find the maximum height
        $('.item-ruta').each(function() {
            var itemHeight = $(this).outerHeight();
            if (itemHeight > maxHeight) {
                maxHeight = itemHeight;
            }
        });
        
        // Set each li to the maximum height
        $('.item-ruta').css('height', maxHeight + 'px');
    }

    // Call the function to equalize heights
    equalizeHeights();
    
});