window.$ = window.jQuery = require('jquery');
import { gsap } from 'gsap';

// Función para mostrar el efecto de carga
function showLoading() {
    var $overlay = $('.loading-overlay');
    $overlay.show();

    gsap.to('.spinner', {
        rotation: 360,
        repeat: -1,
        ease: 'linear',
        duration: 1
    });
}

// Función para ocultar el efecto de carga
function hideLoading() {
    var $overlay = $('.loading-overlay');
    $overlay.hide();
    gsap.killTweensOf('.spinner');
}

// Ajustar tabla segun Array
function renderTable(users) {
    var $tableBody = $('.table-estudiantes tbody');

    $tableBody.find("tr").each(function (index, element){
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
    link.style.visibility = 'hidden';

    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
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

    $('#export-csv').on('click', function() {
        const csvContent = convertToCSV(matrix_csv);
        downloadCSV(csvContent, 'data.csv');
    });

    $('#search-estudiantes').on('keyup', function() {

        $("#label-group .selected").html("Todos los grupos")
        
        var query = $(this).val().toLowerCase();

        var filteredUsers = matrix_data.map(function(user) {
            var isVisible = user.name.toLowerCase().includes(query) || user.email.toLowerCase().includes(query);
            return {
                ...user,
                visible: isVisible
            };
        });

        var visibleUsers = filteredUsers.filter(function(user) {
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

            var filteredUsers = matrix_data.map(function(user) {
                var array_ids = user.groups.split(',');
                var isVisible = array_ids.includes(id_group);
                return {
                    ...user,
                    visible: isVisible
                };
            });

            var visibleUsers = filteredUsers.filter(function(user) {
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

    $("li.item-list-group-all").on("click", function(){
        $("#label-group .selected").html("Todos los grupos")
        $(".card").css("border-top-color", "#05bd9b")

        var send_ids = []

        matrix_data.forEach(user => {
            send_ids.push(user.id)
        });

        renderTable(send_ids);
    })

    $('.single-checkbox').on('change', function() {
        if ($(this).is(':checked')) {
            $('.single-checkbox').not(this).prop('checked', false);
        }
    });

    $("#delete-group").on("click", function(){

        $('#modal-group-select').empty()
        
        var checkedRow = $("input.single-checkbox:checked");

        if (checkedRow.length > 0){
            $("#modal-delete-group").modal("show");
            var elementItem = $(checkedRow[0].parentElement.parentElement);
            var idGroups = elementItem.data("idgroups").split(',');
            var nameGroups = elementItem.data("sgroups").split(',');

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

    $("#eliminar-btn-modal").on("click", function(){
        var checkedRow = $("input.single-checkbox:checked");

        if (checkedRow.length > 0){
            
            var elementItem = $(checkedRow[0].parentElement.parentElement);
            var idUser = elementItem.data("iduser").toString()
            var idGroup = $('#modal-group-select').val();

            console.log([idUser, idGroup])
        }
    })

});