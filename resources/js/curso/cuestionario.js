window.$ = window.jQuery = require('jquery');
import { gsap } from 'gsap';

$(function ($) {
    const pdfUrl = $('.cuestionario-view-curso').data('pdf-url');
    const pdfEmbed = $('#pdf-embed');

    // Establecer la URL del PDF en el embed
    pdfEmbed.attr('src', pdfUrl);

    // Animación de pdf section
    const pdf_view = $('.pdf-section');
    gsap.from(pdf_view, { duration: 1.0, x: -200, opacity: 0, ease: 'power2.out' });

    // Animación de question section
    const question_view = $('.questionnaire-section');
    gsap.from(question_view, { duration: 1.0, x: 200, opacity: 0, ease: 'power2.out' });
});
