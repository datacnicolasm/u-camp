window.$ = window.jQuery = require('jquery');

$(function ($) {

    $('.toggle-more').on('click', function(e){
        e.preventDefault();
        var $this = $(this);
        var $shortDescription = $this.prevAll('.short-description');
        var $longDescription = $this.prevAll('.long-description');
        
        if ($longDescription.hasClass('d-none')) {
            $shortDescription.addClass('d-none');
            $longDescription.removeClass('d-none');
            $this.text('Ver menos');
        } else {
            $shortDescription.removeClass('d-none');
            $longDescription.addClass('d-none');
            $this.text('Ver más');
        }
    });
    
});
