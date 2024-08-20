window.$ = window.jQuery = require('jquery');
import { gsap } from 'gsap';
import { GLOBAL_VARS } from '@globals';

$(function ($) {
    const pdfUrl = $('.cuestionario-view-curso').data('pdf-url');
    const pdfEmbed = $('#pdf-embed');

    // Establecer la URL del PDF en el embed
    pdfEmbed.attr('src', pdfUrl);

    // Animación de pdf section
    const pdf_view = $('.pdf-section');

    if (pdf_view.length > 0) {
        gsap.from(pdf_view, { duration: 1.0, x: -200, opacity: 0, ease: 'power2.out' });
    }

    // Animación de question section
    const question_view = $('.questionnaire-section');

    if (question_view.length > 0) {
        gsap.from(question_view, { duration: 1.0, x: 200, opacity: 0, ease: 'power2.out' });
    }
});
