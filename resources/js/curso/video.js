window.$ = window.jQuery = require('jquery');
import { GLOBAL_VARS } from '@globals';
import { gsap } from 'gsap';

$(function ($) {

    // Animacion de Footer Nav
    const video_view = $('.video-container');
    gsap.from(video_view, { duration: 1.0, x: -300, opacity: 0, ease: 'power2.out' });

})