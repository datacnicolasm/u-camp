window.$ = window.jQuery = require('jquery');
import { gsap } from 'gsap';
import Chart from 'chart.js/auto';

// Función para agrupar los datos
const groupBySection = (data) => {
    return data.reduce((acc, item) => {
        // Si la sección no existe en el acumulador, la inicializamos
        if (!acc[item.name_section]) {
            acc[item.name_section] = { trueCount: 0, falseCount: 0 };
        }

        // Incrementamos el contador correspondiente
        if (item.verify) {
            acc[item.name_section].trueCount += 1;
        } else {
            acc[item.name_section].falseCount += 1;
        }

        return acc;
    }, {});
};

function formatCurrency(value) {
    // Redondear
    let roundedValue = (Math.round(value / 1000) * 1000).toFixed(0);

    // Convertir a formato de moneda con separador de miles
    let parts = roundedValue.split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    return parts.join(",");
}

function slideAnimation(item_HTML) {
    gsap.fromTo(
        item_HTML,
        {
            opacity: 0,
            y: 100
        },
        {
            display: "flex",
            opacity: 1,
            y: 0,
            duration: .5,
            ease: "power1.out"
        }
    );
}

function generateFormulario(matriz){
    for (let index = 0; index < matriz.length; index++) {
        
        const element = matriz[index];
        const id_element = "#input-" + element.cod_input;

        if (element.verify){
            $(id_element).addClass("is-true")
        }else{
            $(id_element).addClass("is-false")
        }  
    }

    for (let index = 0; index < matriz.length; index++) {
        
        const element = matriz[index];
        const id_element = "#form-" + element.cod_input;
        const val_input = formatCurrency(element.val_input)

        $(id_element).html('<span class="mr-2">' + val_input + '</span>')

        if (element.verify){
            $(id_element).addClass("is-true")
        }else{
            $(id_element).addClass("is-false")
        }  
    }
}

function btnResultados(){
    const btn_resultados = $(".btn-result-aviso")
    const win_resultados = $(".content-result-aviso")

    btn_resultados.on("click", function(){
        win_resultados.hide()
    })
}

function showChart(matriz) {

    // Obtener el resultado agrupado
    const groupedData = groupBySection(matriz);

    var index_table = 1

    // Iterar sobre el resultado y generar la tabla
    $.each(groupedData, function (section, counts) {
        const total_items = counts.trueCount + counts.falseCount
        const cumplimiento = Math.round((counts.trueCount / total_items)*100)
        const row = `<tr>            
            <td>${index_table}.</td>
            <td>${section}</td>
            <td class="progress-td">
                <div class="progress progress-xs">
                    <div class="progress-bar progress-bar-danger"
                        style="width: ${cumplimiento}%"></div>
                </div>
            </td>
            <td class="text-center"><span class="badge bg-danger">${cumplimiento}%</span></td>
        </tr>`;
        $("#body-resultados").append(row);
        index_table += 1
    });

    var count_acierto = 0;
    var count_errores = 0;

    for (let index = 0; index < matriz.length; index++) {
        const element = matriz[index];

        if (element.verify) {
            count_acierto += 1;
        } else {
            count_errores += 1;
        }
    }

    $(".table-general .aciertos p").html(count_acierto);
    $(".table-general .errores p").html(count_errores);

    const ctx = document.getElementById('progress-circle').getContext('2d');

    // Crear degradados
    const gradientGreen = ctx.createLinearGradient(0, 0, 0, 400);
    gradientGreen.addColorStop(0, 'rgba(0, 255, 88, 0.5)');
    gradientGreen.addColorStop(1, 'rgba(0, 255, 88, 1)');

    const gradientRed = ctx.createLinearGradient(0, 0, 0, 400);
    gradientRed.addColorStop(0, 'rgba(255, 99, 132, 0.5)');
    gradientRed.addColorStop(1, 'rgba(255, 99, 132, 1)');

    const data = {
        labels: ['Aciertos', 'Errores'],
        datasets: [
            {
                label: 'Resultados',
                data: [count_acierto, count_errores],
                backgroundColor: [gradientGreen, gradientRed],
            }
        ]
    };

    const config = {
        type: 'doughnut',
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false,
                },
                title: {
                    display: false,
                    text: 'Resultados generales - Formulario 110'
                }
            }
        },
    };

    new Chart(ctx, config);

    slideAnimation($(".card-resultados.card-left"))
    slideAnimation($(".card-resultados.card-right"))
    
    const total_items = count_acierto + count_errores
    const cumplimiento = Math.round((count_acierto / total_items)*100)

    if (cumplimiento > 80){
        $(".si-aprobado").show()
    }else{
        $(".no-aprobado").show()
    }

    const ventanaResultado = $("#card-resultados")[0]
    const headerResultado = $("#card-resultados .card-header")[0]
    const bodyResultado = $("#card-resultados .card-body-resultados")
    var heightItem = (ventanaResultado.offsetHeight - headerResultado.offsetHeight) * 0.95
    bodyResultado.css("max-height", heightItem)
    bodyResultado.css("height", heightItem)

    generateFormulario(matriz)

    btnResultados()
}

$(function ($) {

    // Enviar y calificar formulario
    $("#btn-send").on("click", function () {
        const codWorkshop = $("#workshop").data("cod-workshop")
        var matrix_inputs = []
        $("input.input-dian").each(function (index, element) {
            var val_input = $(element).val() ? parseFloat($(element).val().replace(/\./g, '').replace(',', '.')) : 0
            var name_input = $(element).data("cod-field")
            var name_section = $(element).data("section")

            matrix_inputs.push({
                name: name_input,
                val: val_input,
                name_section: name_section
            })
        })

        const data_send = {
            id_workshop: codWorkshop,
            entries_workshop: matrix_inputs
        }

        $.ajax({
            url: '/ibero-lab/public/workshop/' + data_send.id_workshop + '/calificarWorkshop',
            type: 'POST',
            data: {
                id_workshop: data_send.id_workshop,
                entries_workshop: data_send.entries_workshop,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                const cont_resultados = $(".container-resultados-DIAN")
                cont_resultados.css("display", "flex")
                const item_resultados = $(".card-resultados")

                gsap.fromTo(
                    item_resultados,
                    {
                        opacity: 0,
                        y: 200
                    },
                    {
                        opacity: 1,
                        y: 0,
                        duration: .5,
                        ease: "power1.out",
                        onComplete: function () {
                            cont_resultados.find(".content-btn").show()
                            showChart(response.data.matriz)
                        }
                    }
                );
            },
            error: function (xhr) {
                console.log(xhr)
            }
        });
    })

});