window.$ = window.jQuery = require('jquery');
import { GLOBAL_VARS } from '@globals';

$(function ($) {

    // Manejo de secciones #form-main-pago
    const num_step= $("#form-main-pago").data("step");
    if (num_step == "cuenta"){
        $("#cuenta").find(".content-cuenta").css("display","flex")
        $(".payment-steps-number").find(".cuenta-step").addClass("step-active")
        $(".payment-steps-text").find(".cuenta-step").addClass("step-active")
        $("#cuenta").find(".cuenta-step").addClass("number-activate")
    }
    
    if(num_step == "confirm"){
        $(".payment-steps-number").find(".cuenta-step").html('<i class="fas fa-check-circle text-tint-3"></i>')
        $("#cuenta").find(".cuenta-step").html('<i class="fas fa-check-circle text-tint-3"></i>')
        $("#cuenta").find(".text-sesion").hide()

        $(".payment-steps-number").find(".pago-step").html('<i class="fas fa-check-circle text-tint-3"></i>')
        $("#pago").find(".pago-step").html('<i class="fas fa-check-circle text-tint-3"></i>')


        $("#confirmacion").find(".content-confirmacion").css("display","flex")
        $(".payment-steps-number").find(".confirm-step").addClass("step-active")
        $(".payment-steps-text").find(".confirm-step").addClass("step-active")
        $("#confirmacion").find(".confirm-step").addClass("number-activate")
    }

    // Verificar si el correo es correcto
    $("#cuenta").find('#email').on("keyup", function(){
        var email = $('#email').val();
        
        // Validar el formato del correo electrónico
        var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]{2,}\.[a-zA-Z]{2,}$/;
        if (!emailPattern.test(email)) {
            $("#cuenta").find('#email').addClass("is-invalid").removeClass("is-valid")
            $("#cuenta").find('.invalid-feedback-mail').show()
        }else{
            $("#cuenta").find('.invalid-feedback-mail').hide()
        }
    })

    // Verificar si el correo ya existe
    $("#cuenta").find('#email').on("change", function(){
        var email = $('#email').val();

        // Validar el formato del correo electrónico
        var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]{2,}\.[a-zA-Z]{2,}$/;
        if (!emailPattern.test(email)) {
            $("#cuenta").find('#email').addClass("is-invalid").removeClass("is-valid")
            $("#cuenta").find('.invalid-feedback-mail').show()
        }else{
            $("#cuenta").find('.invalid-feedback-mail').hide()

            $.ajax({
                url: GLOBAL_VARS.api_url + 'check-email',
                type: 'POST',
                data: {
                    email: email,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.exists) {
                        $('#email').addClass('is-invalid').removeClass('is-valid');
                        $("#cuenta").find('.invalid-feedback-user').show()
                    } else {
                        $('#email').removeClass('is-invalid').addClass('is-valid');
                        $("#cuenta").find('.invalid-feedback-user').hide()
                    }
                },
                error: function(xhr) {
                    $("#cuenta").find('#email').addClass("is-invalid").removeClass("is-valid")
                    $("#cuenta").find('.invalid-feedback-user').show()
                }
            });
        }
    });

    // Verificar la contraseña
    $("#cuenta").find('#password').on("keyup", function() {
        var password = $('#password').val();

        // Validar el formato de la contraseña
        var passPattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/;
        if (!passPattern.test(password)) {
            $("#cuenta").find('#password').addClass("is-invalid").removeClass("is-valid");
        } else {
            $("#cuenta").find('#password').addClass("is-valid").removeClass("is-invalid");
        }
    });

    // Clic en continuar proceso de compra
    $('#crear-payment').on('click', function(e) {
        e.preventDefault();

        // Obtener los valores de los campos
        var code = $('#crear-payment').data('coderef');
        var email = $('#email').val();
        var password = $('#password').val();
        var firstName = $('#first-name').val();
        var lastName = $('#last-name').val();

        // Validar que los campos no estén vacíos
        if (!email || !password || !firstName || !lastName) {
            alert('Todos los campos son obligatorios.');
            return;
        }

        if ( $('#email').hasClass("is-invalid") ){
            return
        }

        if ( $('#password').hasClass("is-invalid") ){
            return
        }

        var formData = {
            code: code,
            email: email,
            password: password,
            first_name: firstName,
            last_name: lastName,
        };

        $.ajax({
            url: GLOBAL_VARS.api_url + 'payments',
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    // Ocultar seccion anterior
                    $("#cuenta").find(".content-cuenta").css("display","none")
                    $(".payment-steps-number").find(".cuenta-step").removeClass("step-active")
                    $(".payment-steps-text").find(".cuenta-step").removeClass("step-active")
                    $("#cuenta").find(".cuenta-step").removeClass("number-activate")

                    // Mostrar la siguiente seccion
                    $(".payment-steps-number").find(".cuenta-step").html('<i class="fas fa-check-circle text-tint-3"></i>')
                    $("#cuenta").find(".cuenta-step").html('<i class="fas fa-check-circle text-tint-3"></i>')
                    $("#cuenta").find(".text-sesion").hide()
                    
                    $("#pago").find(".content-pago").css("display","flex")
                    $(".payment-steps-number").find(".pago-step").addClass("step-active")
                    $(".payment-steps-text").find(".pago-step").addClass("step-active")
                    $("#pago").find(".pago-step").addClass("number-activate")
                } else {
                    alert('Error creating payment.');
                }
            },
            error: function(response) {
                alert('Error creating payment.');
            }
        });
    });
});
