window.$ = window.jQuery = require('jquery');
import { GLOBAL_VARS } from '@globals';
import { gsap } from 'gsap';

$(function ($) {

    const progress_value = $(".container-course-progress").find('.progress-container').data('progress')
    const progress_bar = $(".container-course-progress").find('.progress-bar')
    const progress_text = $(".container-course-progress").find(".progress-text")

    progress_bar.css('width', progress_value + '%');
    progress_text.text(progress_value + '%');
    

    // Animacion de NavBar
    const navbar = $('.view-curso-navbar');
    gsap.from(navbar, { duration: 1.0, scale: 0, opacity: 0, ease: 'power2.out' });
})