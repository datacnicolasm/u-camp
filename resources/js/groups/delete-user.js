window.$ = window.jQuery = require('jquery');
import { gsap } from 'gsap';
import { GLOBAL_VARS } from '@globals';

$(function ($) {

    $("#eliminar-btn-modal").on("click", function () {
        var checkedRow = $("input.single-checkbox:checked");

        if (checkedRow.length > 0) {

            var elementItem = $(checkedRow[0].parentElement.parentElement);
            var idUser = elementItem.data("iduser").toString()
            var idGroup = $('#modal-group-select').val();

            $.ajax({
                url: GLOBAL_VARS.api_url + 'groups/delete-user',
                type: 'POST',
                data: {
                    id_user: idUser,
                    id_group: idGroup,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.data) {
                        $('#modal-delete-user').modal('hide');
                        $('.single-checkbox').prop('checked', false);
                        location.reload();
                    }
                },
                error: function (xhr) {
                    console.log(xhr)
                }
            });
        }
    })

    $('.single-checkbox').on('change', function () {
        if ($(this).is(':checked')) {
            $('.single-checkbox').not(this).prop('checked', false);
        }
    });

    $("#delete-group").on("click", function () {

        $('#modal-group-select').empty()

        var checkedRow = $("input.single-checkbox:checked");

        if (checkedRow.length > 0) {
            $("#modal-delete-group").modal("show");
            var elementItem = $(checkedRow[0].parentElement.parentElement);

            var idGroupsString = String(elementItem.data("idgroups"));
            var idGroups = idGroupsString.includes(',') ? idGroupsString.split(',') : [idGroupsString];
            
            var nameGroupsString = String(elementItem.data("sgroups"));
            var nameGroups = nameGroupsString.includes(',') ? nameGroupsString.split(',') : [nameGroupsString];

            $("#modal-delete-group").find(".usuario").html(elementItem.data("nameuser"));

            const $select = $('#modal-group-select');

            idGroups.forEach((element, index) => {
                const $option = $('<option>', {
                    value: element,
                    text: nameGroups[index]
                });
                $select.append($option);
            });
        }
    })

});