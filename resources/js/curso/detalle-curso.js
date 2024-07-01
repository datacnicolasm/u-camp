window.$ = window.jQuery = require('jquery');
import { gsap } from 'gsap';

$(function ($) {
    $('.text-toggle').each(function(index, element){
        const listItems = $(element.parentElement).find('.lessons-list-items')

        $(element).on("click", {items: listItems}, function(event){
            $(event.data.items).toggle();
        })
    })
});