/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var rangoedad = [];
$(document).ready(function() {

    /*
     $.ajax({
     type: "POST",
     url: "/apicentral",
     data: "rangoedades=true",
     dataType: "json",
     //if received a response from the server
     success: function(data) {
     var rangoedad=[];
     rangoedad.push(data.dato1);
     rangoedad.push(data.dato2);
     rangoedad.push(data.dato3);
     rangoedad.push(data.dato4);
     rangoedad.push(data.dato5); 
     options.series[0].data = rangoedad;
     chart = new Highcharts.Chart(options);
     }
     });*/
    $("#rango-edades").click(function() {
        $("#nombre").text("Rango de edades");
        $('#container-graficas').children('div').hide();
        $('#container-tablas').children('div').hide();
        dato1 = $("#opcion1 option:selected").text();
        dato2 = $("#opcion2 option:selected").text();
        $.getJSON("/apicentral?rangoedades=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#container-rango-edades').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Rango de Edades'
                },
                xAxis: {
                    categories: [
                        '< 20',
                        '21 a 30',
                        '31 a 40',
                        '41 a 50',
                        '> 51'
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });
        $('#container-rango-edades').show();
        $('#tabla-rango-edades').show();
    });
    $("#genero").click(function() {
        $("#nombre").text("Genero");
        $('#container-graficas').children('div').hide();
        $('#container-tablas').children('div').hide();
        dato1 = $("#opcion1 option:selected").text();
        dato2 = $("#opcion2 option:selected").text();
        $.getJSON("/apicentral?genero=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#container-genero').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Género'
                },
                xAxis: {
                    categories: [
                        'Hombres',
                        'Mujeres'
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json

            });
        });
        $('#container-genero').show();
        $('#tabla-genero').show();
    });
    $("#localidad").click(function() {
        $("#nombre").text("Localidades");
        $('#container-graficas').children('div').hide();
        $('#container-tablas').children('div').hide();
        dato1 = $("#opcion1 option:selected").text();
        dato2 = $("#opcion2 option:selected").text();
        $.getJSON("/apicentral?localidades=true&dato1=todos&dato2=todos", function(json) {
            $('#container-localidad').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Localidades'
                },
                xAxis: {
                    categories: [
                        'localidades'
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });
        $('#container-localidad').show();
        $('#tabla-localidad').show();
    });
    $("#area").click(function() {
        $("#nombre").text("Area");
        $('#container-graficas').children('div').hide();
        $('#container-tablas').children('div').hide();
        dato1 = $("#opcion1 option:selected").text();
        dato2 = $("#opcion2 option:selected").text();
        $.getJSON("/apicentral?area=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#container-area').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Areas'
                },
                xAxis: {
                    categories: [
                        'Areas'
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });
        $('#container-area').show();
        $('#tabla-area').show();
    });
    $("#presion-arterial").click(function() {
        $("#nombre").text("Presion Arterial");
        $('#container-graficas').children('div').hide();
        $('#container-tablas').children('div').hide();
        dato1 = $("#opcion1 option:selected").text();
        dato2 = $("#opcion2 option:selected").text();
        $.getJSON("/apicentral?presion=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#container-presion').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Conocen sus niveles'
                },
                xAxis: {
                    categories: [
                        'Si',
                        'No'
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });
        $('#container-presion').show();
        $.getJSON("/apicentral?presionsi=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#container-presion-si').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Clasificación de niveles'
                },
                xAxis: {
                    categories: [
                        'Riesgo Alto',
                        'Riesgo Bajo'
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });
        $('#container-presion-si').show();

        $.getJSON("/apicentral?presionedad=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#container-presion-edad').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Clasificación de riesgo por edad'
                },
                xAxis: {
                    categories: [
                        '<20',
                        '21 a 30',
                        '31 a 40',
                        '41 a 50',
                        '>51',
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });
        $('#container-presion-edad').show();
        $.getJSON("/apicentral?presiongenero=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#container-presion-genero').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Clasificación de riesgo por género'
                },
                xAxis: {
                    categories: [
                        'Riesgo alto',
                        'Riesgo bajo'
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });
        $('#container-presion-genero').show();
        $('#tabla-presion').show();
    });
    $("#glucosa").click(function() {
        $("#nombre").text("Glucosa");
        $('#container-graficas').children('div').hide();
        $('#container-tablas').children('div').hide();
        dato1 = $("#opcion1 option:selected").text();
        dato2 = $("#opcion2 option:selected").text();
        $.getJSON("/apicentral?glucosa=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#container-glucosa').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Conocen sus niveles'
                },
                xAxis: {
                    categories: [
                        'Si',
                        'No'
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });
        $('#container-glucosa').show();
        $.getJSON("/apicentral?glucosasi=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#container-glucosa-si').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Clasificación de niveles'
                },
                xAxis: {
                    categories: [
                        'Alto',
                        'Medio',
                        'Bajo'
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });
        $('#container-glucosa-si').show();
        $.getJSON("/apicentral?glucosagenero=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#container-glucosa-genero').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Clasificación de riesgo por género'
                },
                xAxis: {
                    categories: [
                        'Riesgo alto',
                        'Riesgo medio',
                        'Riesgo bajo'
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });
        $('#container-glucosa-genero').show();
        $.getJSON("/apicentral?glucosaedad=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#container-glucosa-edad').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Clasificación de riesgo por edad'
                },
                xAxis: {
                    categories: [
                        '<20',
                        '21 a 30',
                        '31 a 40',
                        '41 a 50',
                        '>51',
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });
        $('#container-glucosa-edad').show();
        $('#tabla-glucosa').show();
    });
    $("#trigliceridos").click(function() {
        $("#nombre").text("Trigliceridos");
        $('#container-graficas').children('div').hide();
        $('#container-tablas').children('div').hide();
        dato1 = $("#opcion1 option:selected").text();
        dato2 = $("#opcion2 option:selected").text();
        $.getJSON("/apicentral?trigliceridos=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#container-trigliceridos').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Conocen sus niveles'
                },
                xAxis: {
                    categories: [
                        'Si',
                        'No'
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });


        $('#container-trigliceridos').show();
        $.getJSON("/apicentral?trigliceridossi=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#container-trigliceridos-si').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Clasificación de niveles'
                },
                xAxis: {
                    categories: [
                        'Riesgo alto',
                        'Riesgo bajo'
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });
        $('#container-trigliceridos-si').show();

        $.getJSON("/apicentral?trigliceridosgenero=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#container-trigliceridos-genero').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Clasificación de riesgo por genero'
                },
                xAxis: {
                    categories: [
                        'Riesgo alto',
                        'Riesgo bajo'
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });

        $('#container-trigliceridos-genero').show();

        $.getJSON("/apicentral?trigliceridosedad=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {

            $('#container-trigliceridos-edad').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Clasificación de riesgo por edad'
                },
                xAxis: {
                    categories: [
                        '<20',
                        '21 a 30',
                        '31 a 40',
                        '41 a 50',
                        '>51',
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });

        $('#container-trigliceridos-edad').show();
        $('#tabla-trigliceridos').show();
    });
    $("#indice-masa").click(function() {
        $("#nombre").text("Indice de Masa de corporal");
        $('#container-graficas').children('div').hide();
        $('#container-tablas').children('div').hide();
        dato1 = $("#opcion1 option:selected").text();
        dato2 = $("#opcion2 option:selected").text();
        $.getJSON("/apicentral?indicemasa=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#container-indice-masa').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Indice de masa corporal'
                },
                xAxis: {
                    categories: [
                        'Sobre peso',
                        'Saludable',
                        'Bajo de peso'
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });
        $('#container-indice-masa').show();
        $.getJSON("/apicentral?indicemasagenero=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#container-indice-masa-genero').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Indice de masa de corporal por genero'
                },
                xAxis: {
                    categories: [
                        'Sobre peso',
                        'Saludable',
                        'Bajo de peso'
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });

        $('#container-indice-masa-genero').show();
        $.getJSON("/apicentral?indicemasaedad=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#container-indice-masa-edad').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Indice de masa de corporal por edad'
                },
                xAxis: {
                    categories: [
                        '<20',
                        '21 a 30',
                        '31 a 40',
                        '41 a 50',
                        '>51',
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });

        $('#container-indice-masa-edad').show();
        $('#tabla-indice-masa').show();
    });
    $("#circunferencia").click(function() {
        $("#nombre").text("Circunferencia abdominal");
        $('#container-graficas').children('div').hide();
        $('#container-tablas').children('div').hide();
        dato1 = $("#opcion1 option:selected").text();
        dato2 = $("#opcion2 option:selected").text();
        $.getJSON("/apicentral?circunferencia=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#container-circunferencia').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Circunferencia por genero'
                },
                xAxis: {
                    categories: [
                        'Hombres',
                        'Mujeres'
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });
        $('#container-circunferencia').show();
        $.getJSON("/apicentral?circunferenciaedad=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#container-circunferencia-edad').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Circunferencia por edad'
                },
                xAxis: {
                    categories: [
                        '<20',
                        '21 a 30',
                        '31 a 40',
                        '41 a 50',
                        '>51',
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });
        $('#container-circunferencia-edad').show();
        $('#tabla-circunferencia').show();
    });
    $("#frutas").click(function() {
        $("#nombre").text("Consumo de frutas");
        $('#container-graficas').children('div').hide();
        $('#container-tablas').children('div').hide();
        dato1 = $("#opcion1 option:selected").text();
        dato2 = $("#opcion2 option:selected").text();
        $.getJSON("/apicentral?frutas=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {

            $('#container-frutas').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Raciones de frutas'
                },
                xAxis: {
                    categories: [
                        'Menor a 4',
                        'De 4 a 7',
                        'De 7 a 10'
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });
        $('#container-frutas').show();
        $.getJSON("/apicentral?frutasgenero=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {

            $('#container-frutas-genero').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Raciones de frutas por genero'
                },
                xAxis: {
                    categories: [
                        'Menor a 4',
                        'De 4 a 7',
                        'De 7 a 10'
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });
        $.getJSON("/apicentral?frutasedad=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#container-frutas-edad').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Raciones de frutas por edad'
                },
                xAxis: {
                    categories: [
                        '<20',
                        '21 a 30',
                        '31 a 40',
                        '41 a 50',
                        '>51',
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });
        $('#container-frutas-genero').show();
        $('#container-frutas-edad').show();
        $('#tabla-frutas').show();
    });
    $("#verduras").click(function() {
        $("#nombre").text("Consumo de verduras");
        $('#container-graficas').children('div').hide();
        $('#container-tablas').children('div').hide();
        dato1 = $("#opcion1 option:selected").text();
        dato2 = $("#opcion2 option:selected").text();
        $.getJSON("/apicentral?verduras=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {

            $('#container-verduras').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Raciones de verduras'
                },
                xAxis: {
                    categories: [
                        'Menor a 4',
                        'De 4 a 7',
                        'De 7 a 10'
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });
        $('#container-verduras').show();
        $.getJSON("/apicentral?verdurasgenero=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {

            $('#container-verduras-genero').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Raciones de verduras'
                },
                xAxis: {
                    categories: [
                        'Menor a 4',
                        'De 4 a 7',
                        'De 7 a 10'
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });
        $('#container-verduras-genero').show();
        $.getJSON("/apicentral?verdurasedad=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#container-verduras-edad').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Raciones de frutas por edad'
                },
                xAxis: {
                    categories: [
                        '<20',
                        '21 a 30',
                        '31 a 40',
                        '41 a 50',
                        '>51',
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });
        $('#container-verduras-edad').show();
        $('#tabla-verduras').show();
    });
    $("#capeados").click(function() {
        $("#nombre").text("Consumo de alimentos capeados");
        $('#container-graficas').children('div').hide();
        $('#container-tablas').children('div').hide();
        dato1 = $("#opcion1 option:selected").text();
        dato2 = $("#opcion2 option:selected").text();
        $.getJSON("/apicentral?capeados=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {

            $('#container-capeados').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Frecuencia de capeados'
                },
                xAxis: {
                    categories: [
                        'Todos los dias',
                        'Mas de 3 veces a la semana',
                        '2 a 3 veces a la semana',
                        'Ocasionalmente',
                        'Nunca'
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });
        $('#container-capeados').show();
        $.getJSON("/apicentral?capeadosgenero=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {

            $('#container-capeados-genero').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Frecuencia de capeados'
                },
                xAxis: {
                    categories: [
                        'Todos los dias',
                        'Mas de 3 veces a la semana',
                        '2 a 3 veces a la semana',
                        'Ocasionalmente',
                        'Nunca'
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });
        $('#container-capeados-genero').show();
        $.getJSON("/apicentral?capeadosedad=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {

            $('#container-capeados-edad').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Frecuencia de capeados'
                },
                xAxis: {
                    categories: [
                        '<20',
                        '21 a 30',
                        '31 a 40',
                        '41 a 50',
                        '>51',
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });
        $('#container-capeados-edad').show();
        $('#tabla-capeados').show();
    });
    $("#sal").click(function() {
        $("#nombre").text("Consumo de alimentos con sal");
        $('#container-graficas').children('div').hide();
        $('#container-tablas').children('div').hide();
        dato1 = $("#opcion1 option:selected").text();
        dato2 = $("#opcion2 option:selected").text();
        $.getJSON("/apicentral?sal=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#container-sal').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Sal en los alimentos'
                },
                xAxis: {
                    categories: [
                        'Si',
                        'Ocasionalmente',
                        'No'
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });
        $('#container-sal').show();
        $.getJSON("/apicentral?salgenero=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#container-sal-genero').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Consumo de sal por genero'
                },
                xAxis: {
                    categories: [
                        'Si',
                        'Ocasionalmente',
                        'No'
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });
        $('#container-sal-genero').show();
        $.getJSON("/apicentral?saledad=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {

            $('#container-sal-edad').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Consumo de sal por edad'
                },
                xAxis: {
                    categories: [
                        '<20',
                        '21 a 30',
                        '31 a 40',
                        '41 a 50',
                        '>51',
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });
        $('#container-sal-edad').show();
        $('#tabla-sal').show();
    });
    $("#estres").click(function() {
        $("#nombre").text("Nivel de estres");
        $('#container-graficas').children('div').hide();
        $('#container-tablas').children('div').hide();
        dato1 = $("#opcion1 option:selected").text();
        dato2 = $("#opcion2 option:selected").text();
        $.getJSON("/apicentral?estres=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#container-estres').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Nivel de estres'
                },
                xAxis: {
                    categories: [
                        'Nivel 1 y 2',
                        'Nivel 3',
                        'Nive 4 y 5'
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });
        $('#container-estres').show();
        $.getJSON("/apicentral?estresgenero=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#container-estres-genero').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Nivel de estres por genero'
                },
                xAxis: {
                    categories: [
                        'Nivel 1 y 2',
                        'Nivel 3',
                        'Nive 4 y 5'
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });
        $('#container-estres-genero').show();
        $.getJSON("/apicentral?estresedad=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#container-estres-edad').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Nivel de estres por edad'
                },
                xAxis: {
                    categories: [
                        '<20',
                        '21 a 30',
                        '31 a 40',
                        '41 a 50',
                        '>51',
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} personas</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: json
            });
        });
        $('#container-estres-edad').show();
        $('#tabla-estres').show();
    });


});