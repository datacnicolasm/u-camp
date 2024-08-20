import { GLOBAL_VARS } from '@globals';
import { gsap } from 'gsap';

$(function ($) {

    // Eliminar grupo
    $(".btn-delete-lesson").each(function (index, element) {
        const btn_delete_element = $(element)

        btn_delete_element.on("click", function (event) {
            const id_lesson = btn_delete_element.data("idlesson")
            const paren_element = event.currentTarget.parentElement.parentElement.parentElement

            $.ajax({
                url: GLOBAL_VARS.api_url + 'lessons/delete',
                type: 'POST',
                data: {
                    id: id_lesson,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    gsap.fromTo(paren_element,
                        {
                            backgroundColor: "#fff",
                        },
                        {
                            backgroundColor: "#ffafaf",
                            duration: 0.5,
                            onComplete: function () {
                                gsap.to(paren_element, {
                                    x: -200,
                                    opacity: 0,
                                    duration: 1.5,
                                    onComplete: function () {
                                        paren_element.remove()
                                    }
                                })
                                location.reload();
                            }
                        })
                },
                error: function (xhr) {
                    console.log(xhr)
                }
            });
        })
    })

});