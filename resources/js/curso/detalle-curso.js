window.$ = window.jQuery = require('jquery');
import { gsap } from 'gsap';
import { GLOBAL_VARS } from '@globals';

$(function ($) {
    $('.text-toggle').each(function (index, element) {
        const listItems = $(element.parentElement).find('.lessons-list-items')

        $(element).on("click", { items: listItems }, function (event) {
            
            if ($(event.data.items).hasClass('active')) {
                $(element).text('Ver contenido')
                $(event.data.items).removeClass('active')
                $(event.data.items).toggle()
            }else{
                $(element).text('Ocultar contenido')
                $(event.data.items).addClass('active')
                $(event.data.items).toggle()
            }
        })
    })

    $('.chapter-item').each(function (index, element) {
        const progress_value = $(element).find('.progress-container').data('progress')
        const progress_bar = $(element).find('#progress-bar')
        const progress_text = $(element).find(".progress-text")

        progress_bar.css('width', progress_value + '%');
        progress_text.text(progress_value + '%');
    })
});