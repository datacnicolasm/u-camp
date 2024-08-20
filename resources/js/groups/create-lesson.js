// Importar jQuery y asignarlo a window
window.$ = window.jQuery = require('jquery');
// Importar otros plugins que dependen de jQuery
import { GLOBAL_VARS } from '@globals';
import { gsap } from 'gsap';

function validarFormulario() {
    // Inicializar el selector de fecha y hora
    $('#datetimepicker1').datetimepicker({
        format: 'YYYY-MM-DD hh:mm a',
        icons: {
            time: 'fas fa-clock',
            date: 'fas fa-calendar',
            up: 'fas fa-chevron-up',
            down: 'fas fa-chevron-down',
            previous: 'fas fa-chevron-left',
            next: 'fas fa-chevron-right',
            today: 'fas fa-calendar-check',
            clear: 'fas fa-trash',
            close: 'fas fa-times'
        }
    });

    
    
    $(".form-create-lesson").find("input").removeClass(["is-invalid", "is-valid"]);

    const titulo_actividad = $(".form-create-lesson").find("#titulo_actividad").val();
    const orden_actividad = $(".form-create-lesson").find("#orden_actividad").val();
    const puntos_actividad = $(".form-create-lesson").find("#puntos_actividad").val();
    const vencimiento_actividad = $(".form-create-lesson").find("#vencimiento_actividad").val();
    const grupo_actividad = $(".form-create-lesson").find('#grupo_id option:selected').val();
    const tipo_actividad = $(".form-create-lesson").find('#tipo_actividad option:selected').val();

    if (titulo_actividad == "") {
        $(".form-create-lesson").find("#titulo_actividad").addClass("is-invalid");
        return true;
    }else{
        $(".form-create-lesson").find("#titulo_actividad").addClass("is-valid");
    }

    if (orden_actividad == "") {
        $(".form-create-lesson").find("#orden_actividad").addClass("is-invalid");
        return true;
    }else{
        $(".form-create-lesson").find("#orden_actividad").addClass("is-valid");
    }

    if (puntos_actividad == "") {
        $(".form-create-lesson").find("#puntos_actividad").addClass("is-invalid");
        return true;
    }else{
        $(".form-create-lesson").find("#puntos_actividad").addClass("is-valid");
    }

    if (vencimiento_actividad == "") {
        $(".form-create-lesson").find("#vencimiento_actividad").addClass("is-invalid");
        return true;
    }else{
        $(".form-create-lesson").find("#vencimiento_actividad").addClass("is-valid");
    }

    return false;
}

$(function ($) {

    // Inicializar el selector de fecha y hora
    $('#datetimepicker1').datetimepicker({
        format: 'YYYY-MM-DD hh:mm a',
        icons: {
            time: 'fas fa-clock',
            date: 'fas fa-calendar',
            up: 'fas fa-chevron-up',
            down: 'fas fa-chevron-down',
            previous: 'fas fa-chevron-left',
            next: 'fas fa-chevron-right',
            today: 'fas fa-calendar-check',
            clear: 'fas fa-trash',
            close: 'fas fa-times'
        }
    });

    $("#btn-create-lesson").on('click', function (e) {
        if(validarFormulario()){
            e.preventDefault();
        }
    })

});