window.$ = window.jQuery = require('jquery');

$(function($) {
    $("#clases-teacher").DataTable({
        layout: {
            bottomEnd: {
                paging: {
                    boundaryNumbers: true
                }
            }
        },
        info: true,
        paging: true,
        responsive: true,
        lengthChange: false,
        searching: true,
        ordering: true,
        autoWidth: false
    });
})