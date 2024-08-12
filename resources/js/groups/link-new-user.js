window.$ = window.jQuery = require('jquery');
import { gsap } from 'gsap';
import { GLOBAL_VARS } from '@globals';

$(function ($) {

    // Verificar si el correo es correcto
    $("#link-new-user #email").on("change", function () {
        var email = $(this).val();
        const email_HTML = $(this);
        const parent_HTML = $($(this)[0].parentNode);

        // Validar el formato del correo electrónico
        var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]{2,}\.[a-zA-Z]{2,}$/;
        if (!emailPattern.test(email)) {
            email_HTML.addClass("is-invalid").removeClass("is-valid")
            parent_HTML.find(".feedback-msg").show()
            parent_HTML.find(".feedback-msg .email-invalid").show()
        } else {
            email_HTML.addClass("is-valid").removeClass("is-invalid")
            parent_HTML.find(".feedback-msg").hide()
            parent_HTML.find(".feedback-msg .email-invalid").hide()

            $.ajax({
                url: GLOBAL_VARS.api_url + 'check-email',
                type: 'POST',
                data: {
                    email: email,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.exists) {
                        email_HTML.addClass("is-invalid").removeClass("is-valid")
                        parent_HTML.find(".feedback-msg").show()
                        parent_HTML.find(".feedback-msg .email-exist").show()
                    } else {
                        email_HTML.addClass("is-valid").removeClass("is-invalid")
                        parent_HTML.find(".feedback-msg").hide()
                        parent_HTML.find(".feedback-msg .email-exist").hide()
                    }
                },
                error: function (xhr) {
                    console.log(xhr)
                }
            });
        }
    })

});