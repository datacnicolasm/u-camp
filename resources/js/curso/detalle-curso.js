window.$ = window.jQuery = require('jquery');
import { GLOBAL_VARS } from '@globals';
import { gsap } from 'gsap';

$(function ($) {
    $('.text-toggle').each(function (index, element) {
        const listItems = $(element.parentElement).find('.lessons-list-items')

        $(element).on("click", { items: listItems }, function (event) {
            $(event.data.items).toggle();
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