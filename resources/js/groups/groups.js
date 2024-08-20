window.$ = window.jQuery = require('jquery');
import { GLOBAL_VARS } from '@globals';
import { gsap } from 'gsap';

$(function ($) {
    $("#edit-modal").find("#name").val("Cargando...")
    $(".list-groups").find(".input-group").css("width", "200px")

    // Cargar modal
    $(".btn-edit-group").each(function (index, element) {

        const btn_element = $(element)

        btn_element.on("click", function (event) {

            const id_group = btn_element.data("idgroup")
            $("#edit-modal").attr("data-idgroup", id_group)

            $.ajax({
                url: GLOBAL_VARS.api_url + 'groups/get',
                type: 'POST',
                data: {
                    id: id_group,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    $("#edit-modal").find(".color").removeClass("is-select")
                    $("#edit-modal").find("#name").val(response.data.name)
                    $("#edit-modal").find("#color-group").attr("value", response.data.color)
                    $('.color[data-hexcolor="' + response.data.color + '"]').addClass("is-select")
                },
                error: function (xhr) {
                    console.log(xhr)
                }
            });
        })
    })

    // Editar grupo - click en color
    $("#edit-modal").find(".color").each(function (index, element) {

        const color = $(element)

        color.on("click", function (event) {
            $("#edit-modal").find(".color").removeClass("is-select")
            $(event.currentTarget).addClass("is-select")

            const color_group = $(event.currentTarget).data("hexcolor")

            $("#edit-modal").find("#color-group").attr("value", color_group)
        })
    })

    // Guardar informacion
    $("#edit-modal").find("#save-modal").on("click", function (event) {
        const id_grupo = $("#edit-modal").data("idgroup")
        const name_grupo = $("#edit-modal").find("#name").val()
        const color_grupo = $("#edit-modal").find("#color-group").attr("value")

        $.ajax({
            url: GLOBAL_VARS.api_url + 'groups/edit',
            type: 'POST',
            data: {
                id: id_grupo,
                name: name_grupo,
                color: color_grupo,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                $("#edit-modal").modal('hide');
                location.reload();
            },
            error: function (xhr) {
                console.log(xhr)
            }
        });
    })

    // Crear grupo - click en color
    $("#crear-modal").find(".color").each(function (index, element) {

        const color = $(element)

        color.on("click", function (event) {
            $("#crear-modal").find(".color").removeClass("is-select")
            $(event.currentTarget).addClass("is-select")

            const color_group = $(event.currentTarget).data("hexcolor")

            $("#crear-modal").find("#color-group").attr("value", color_group)
        })
    })

    // Crear grupo - guardar informacion
    $("#crear-modal").find("#btn-crear-grupo").on("click", function (event) {

        const name_grupo = $("#crear-modal").find("#name").val()
        const color_grupo = $("#crear-modal").find("#color-group").attr("value")

        $.ajax({
            url: GLOBAL_VARS.api_url + 'groups/create',
            type: 'POST',
            data: {
                name: name_grupo,
                color: color_grupo,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                $("#crear-modal").modal('hide');
                $("#crear-modal").find("#name").val("")
                location.reload();
            },
            error: function (xhr) {
                console.log(xhr)
            }
        });
    })

    // Eliminar grupo
    $(".btn-delete-group").each(function (index, element) {
        const btn_delete_element = $(element)

        btn_delete_element.on("click", function (event) {
            const id_group = btn_delete_element.data("idgroup")
            const paren_element = event.currentTarget.parentElement.parentElement.parentElement

            $.ajax({
                url: GLOBAL_VARS.api_url + 'groups/delete',
                type: 'POST',
                data: {
                    id: id_group,
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