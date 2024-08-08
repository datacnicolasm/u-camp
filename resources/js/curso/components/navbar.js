window.$ = window.jQuery = require('jquery');
import { GLOBAL_VARS } from '@globals';
import { gsap } from 'gsap';

$(function ($) {

    const progress_value = $(".container-course-progress").find('.progress-container').data('progress')
    const progress_bar = $(".container-course-progress").find('.progress-bar')
    const progress_text = $(".container-course-progress").find(".progress-text")

    progress_bar.css('width', progress_value + '%');
    progress_text.text(progress_value + '%');
})