window.$ = window.jQuery = require('jquery');
import { gsap } from 'gsap';
import { GLOBAL_VARS } from '@globals';

// Ajustar tabla segun Array
function renderTable(users) {
    var $tableBody = $('.table-estudiantes tbody');

    $tableBody.find("tr").each(function (index, element) {
        const id_user = $(element).data("iduser")

        if (!users.includes(id_user)) {
            $(element).hide()
        } else {
            $(element).show()
        }
    })
}

// Convertir array
function convertToCSV(array) {
    const keys = Object.keys(array[0]);
    const csvContent = [
        keys.join(','), // Encabezado
        ...array.map(item => keys.map(key => item[key]).join(','))
    ].join('\n');

    return csvContent;
}

// Crear y descargar archivo CSV
function downloadCSV(csvContent, filename) {
    const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
    const link = document.createElement('a');
    const url = URL.createObjectURL(blob);

    link.setAttribute('href', url);
    link.setAttribute('download', filename);
    link.click();
    document.body.removeChild(link);
}

// Función para establecer el link de invitación
function setlinkInvite(link){
    $(".generate-link").show()
    $("#select-grupo").prop('disabled', true);
    $("#link-generate").val(link);

    setTimeout(() => {
        $(".generate-link").hide()
        $("#select-grupo").prop('disabled', false);
        $("#link-generate").val("");
    }, 5000);
}

$(function ($) {
    const matrix_data = []

    var matrix_csv = matrix_data

    $(".table-estudiantes").find("tbody tr").each(function (index, element) {
        const id_user = $(element).data("iduser")
        const name_user = $(element).data("nameuser")
        const email_user = $(element).data("emailuser")
        const groups = $(element).data("idgroups")
        const n_groups = $(element).data("sgroups")

        matrix_data.push({
            id: id_user,
            name: name_user,
            email: email_user,
            groups: groups,
            name_groups: n_groups
        })
    })

    $('#export-csv').on('click', function () {
        if ($(this).data("enabled") == "disabled") {
            return;
        }

        const csvContent = convertToCSV(matrix_csv);
        downloadCSV(csvContent, 'data.csv');
    });

    $('#search-estudiantes').on('keyup', function () {

        $("#label-group .selected").html("Todos los grupos")

        var query = $(this).val().toLowerCase();

        var filteredUsers = matrix_data.map(function (user) {
            var isVisible = user.name.toLowerCase().includes(query) || user.email.toLowerCase().includes(query);
            return {
                ...user,
                visible: isVisible
            };
        });

        var visibleUsers = filteredUsers.filter(function (user) {
            return user.visible;
        });

        matrix_csv = visibleUsers;

        var send_ids = []

        visibleUsers.forEach(user => {
            send_ids.push(user.id)
        });

        renderTable(send_ids);
    });

    $("#label-group").on("click", function () {
        $(".select-options-group").toggle();
    })

    $("li.item-list-group").each(function (index, element) {
        $(element).on("click", function () {
            const id_group = $(element).data("idgroup").toString();
            const name_group = $(element).find(".name-item").text();
            const color_group = $(element).data("color")
            $(".card").css("border-top-color", color_group)
            $("#label-group .selected").html(name_group)
            $(".select-options-group").toggle();

            var filteredUsers = matrix_data.map(function (user) {
                var array_ids = user.groups.split(',');
                var isVisible = array_ids.includes(id_group);
                return {
                    ...user,
                    visible: isVisible
                };
            });

            var visibleUsers = filteredUsers.filter(function (user) {
                return user.visible;
            });

            matrix_csv = visibleUsers;

            var send_ids = []

            visibleUsers.forEach(user => {
                send_ids.push(user.id)
            });

            renderTable(send_ids);

        })
    })

    $("li.item-list-group-all").on("click", function () {
        $("#label-group .selected").html("Todos los grupos")
        $(".card").css("border-top-color", "#05bd9b")

        var send_ids = []

        matrix_data.forEach(user => {
            send_ids.push(user.id)
        });

        renderTable(send_ids);
    })

    $("#btn-crear-link").on("click", function () {
        if ($(this).data("status")) {
            // Obtener el valor de la opción seleccionada
            var selectedValue = $("#select-grupo").val();

            // Si necesitas obtener el texto de la opción seleccionada
            var selectedText = $('#select-grupo option:selected').text();

            // Solicitud AJAX
            $.ajax({
                url: GLOBAL_VARS.api_url + 'groups/link',
                type: 'POST',
                data: {
                    group_id: selectedValue,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.data.success){
                        setlinkInvite(response.data.link)
                    }
                },
                error: function (xhr) {
                    console.log(xhr)
                }
            });
        }
    })

});