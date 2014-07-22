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
            $('#tb-re').children('td').remove();
            $.each(json[0].data, function(i, field) {
                $("#tb-re").append("<td>" + field + "</td>");
            });
            //alert(json[0].data[1]);


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
            $('#tb-g').children('td').remove();
            $.each(json[0].data, function(i, field) {
                $("#tb-g").append("<td>" + field + "</td>");
            });
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
            $('#tb-l').children('td').remove();
            $('#th-l').children('td').remove();
            $.each(json, function(i, field) {
                $("#th-l").append("<td>" + field.name + "</td>");
                $("#tb-l").append("<td>" + field.data[0] + "</td>");
            });
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
            $('#tb-a').children('td').remove();
            $('#th-a').children('td').remove();
            $.each(json, function(i, field) {
                $("#th-a").append("<td>" + field.name + "</td>");
                $("#tb-a").append("<td>" + field.data[0] + "</td>");
            });
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
            $('#tb-p').children('td').remove();
            $.each(json[0].data, function(i, field) {
                $("#tb-p").append("<td>" + field + "</td>");
            });
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
        $('#tabla-presion').show();
        $.getJSON("/apicentral?presionsi=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#tb-ps').children('td').remove();
            $.each(json[0].data, function(i, field) {
                $("#tb-ps").append("<td>" + field + "</td>");
            });
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
        $('#tabla-presion-si').show();
        $.getJSON("/apicentral?presionedad=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#tb-pe').children('td').remove();
            $('#th-pe').children('td').remove();
            $('#mp20').children('td').remove();
            $('#mp30').children('td').remove();
            $('#mp40').children('td').remove();
            $('#mp50').children('td').remove();
            $('#mp60').children('td').remove();
            $("#th-pe").append("<td> </td>");
            $('#mp20').append("<td>Menor a 20</td>");
            $('#mp30').append("<td>21 a 30</td>");
            $('#mp40').append("<td>31 a 40</td>");
            $('#mp50').append("<td>41 a 50</td>");
            $('#mp60').append("<td>Mayor a 51</td>");
            $.each(json, function(i, field) {
                $("#th-pe").append("<td>" + field.name + "</td>");
                $.each(field.data, function(x, field2) {
                    if (x == 0) {
                        if (field2 != null) {
                            $("#mp20").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 1) {
                        if (field2 != null) {
                            $("#mp30").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 2) {
                        if (field2 != null) {
                            $("#mp40").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 3) {
                        if (field2 != null) {
                            $("#mp50").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 4) {
                        if (field2 != null) {
                            $("#mp60").append("<td>" + field2 + "</td>");
                        }
                    }
                });
            });
            $('#container-presion-edad').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Clasificación de riesgo por edad'
                },
                xAxis: {
                    categories: [
                        'Menor a 20',
                        '21 a 30',
                        '31 a 40',
                        '41 a 50',
                        'Mayor a 51',
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
        $('#tabla-presion-edad').show();
        $.getJSON("/apicentral?presiongenero=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#tb-pg').children('td').remove();
            $('#th-pg').children('td').remove();
            $.each(json, function(i, field) {
                $("#th-pg").append("<td colspan=2>" + field.name + "</td>");
                $.each(field.data, function(x, field2) {

                    $("#tb-pg").append("<td>" + field2 + "</td>");
                });
            });
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
        $('#tabla-presion-genero').show();
    });
    $("#glucosa").click(function() {
        $("#nombre").text("Glucosa");
        $('#container-graficas').children('div').hide();
        $('#container-tablas').children('div').hide();
        dato1 = $("#opcion1 option:selected").text();
        dato2 = $("#opcion2 option:selected").text();
        $.getJSON("/apicentral?glucosa=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#tb-gl').children('td').remove();
            $.each(json[0].data, function(i, field) {
                $("#tb-gl").append("<td>" + field + "</td>");
            });
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
        $('#tabla-glucosa').show();
        $.getJSON("/apicentral?glucosasi=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#tb-gls').children('td').remove();
            $.each(json[0].data, function(i, field) {
                $("#tb-gls").append("<td>" + field + "</td>");
            });
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
        $('#tabla-glucosa-si').show();
        $.getJSON("/apicentral?glucosagenero=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#tb-glg').children('td').remove();
            $('#th-glg').children('td').remove();
            $.each(json, function(i, field) {
                $("#th-glg").append("<td colspan=3>" + field.name + "</td>");
                $.each(field.data, function(x, field2) {

                    $("#tb-glg").append("<td>" + field2 + "</td>");
                });
            });
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
        $('#tabla-glucosa-genero').show();
        $.getJSON("/apicentral?glucosaedad=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#tb-gle').children('td').remove();
            $('#th-gle').children('td').remove();
            $('#mg20').children('td').remove();
            $('#mg30').children('td').remove();
            $('#mg40').children('td').remove();
            $('#mg50').children('td').remove();
            $('#mg60').children('td').remove();
            $("#th-gle").append("<td> </td>");
            $('#mg20').append("<td>Menor a 20</td>");
            $('#mg30').append("<td>21 a 30</td>");
            $('#mg40').append("<td>31 a 40</td>");
            $('#mg50').append("<td>41 a 50</td>");
            $('#mg60').append("<td>Mayor a 51</td>");
            $.each(json, function(i, field) {
                $("#th-gle").append("<td>" + field.name + "</td>");
                $.each(field.data, function(x, field2) {
                    if (x == 0) {
                        if (field2 != null) {
                            $("#mg20").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 1) {
                        if (field2 != null) {
                            $("#mg30").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 2) {
                        if (field2 != null) {
                            $("#mg40").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 3) {
                        if (field2 != null) {
                            $("#mg50").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 4) {
                        if (field2 != null) {
                            $("#mg60").append("<td>" + field2 + "</td>");
                        }
                    }
                });
            });
            $('#container-glucosa-edad').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Clasificación de riesgo por edad'
                },
                xAxis: {
                    categories: [
                        'Menor a 20',
                        '21 a 30',
                        '31 a 40',
                        '41 a 50',
                        'Mayor a 51',
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
        $('#tabla-glucosa-edad').show();
    });
    $("#trigliceridos").click(function() {
        $("#nombre").text("Triglic&eacute;ridos");
        $('#container-graficas').children('div').hide();
        $('#container-tablas').children('div').hide();
        dato1 = $("#opcion1 option:selected").text();
        dato2 = $("#opcion2 option:selected").text();
        $.getJSON("/apicentral?trigliceridos=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#tb-t').children('td').remove();
            $.each(json[0].data, function(i, field) {
                $("#tb-t").append("<td>" + field + "</td>");
            });
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
        $('#tabla-trigliceridos').show();
        $.getJSON("/apicentral?trigliceridossi=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#tb-ts').children('td').remove();
            $.each(json[0].data, function(i, field) {
                $("#tb-ts").append("<td>" + field + "</td>");
            });
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
        $('#tabla-trigliceridos-si').show();

        $.getJSON("/apicentral?trigliceridosgenero=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#tb-tg').children('td').remove();
            $('#th-tg').children('td').remove();
            $.each(json, function(i, field) {
                $("#th-tg").append("<td colspan=2>" + field.name + "</td>");
                $.each(field.data, function(x, field2) {

                    $("#tb-tg").append("<td>" + field2 + "</td>");
                });
            });
            $('#container-trigliceridos-genero').highcharts({
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

        $('#container-trigliceridos-genero').show();
        $('#tabla-trigliceridos-genero').show();

        $.getJSON("/apicentral?trigliceridosedad=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#tb-te').children('td').remove();
            $('#th-te').children('td').remove();
            $('#mt20').children('td').remove();
            $('#mt30').children('td').remove();
            $('#mt40').children('td').remove();
            $('#mt50').children('td').remove();
            $('#mt60').children('td').remove();
            $("#th-te").append("<td> </td>");
            $('#mt20').append("<td>Menor a 20</td>");
            $('#mt30').append("<td>21 a 30</td>");
            $('#mt40').append("<td>31 a 40</td>");
            $('#mt50').append("<td>41 a 50</td>");
            $('#mt60').append("<td>Mayor a 51</td>");
            $.each(json, function(i, field) {
                $("#th-te").append("<td>" + field.name + "</td>");
                $.each(field.data, function(x, field2) {
                    if (x == 0) {
                        if (field2 != null) {
                            $("#mt20").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 1) {
                        if (field2 != null) {
                            $("#mt30").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 2) {
                        if (field2 != null) {
                            $("#mt40").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 3) {
                        if (field2 != null) {
                            $("#mt50").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 4) {
                        if (field2 != null) {
                            $("#mt60").append("<td>" + field2 + "</td>");
                        }
                    }
                });
            });
            $('#container-trigliceridos-edad').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Clasificación de riesgo por edad'
                },
                xAxis: {
                    categories: [
                        'Menor a 20',
                        '21 a 30',
                        '31 a 40',
                        '41 a 50',
                        'Mayor a 51',
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
        $('#tabla-trigliceridos-edad').show();
    });
    $("#indice-masa").click(function() {
        $("#nombre").text("Índice de Masa de corporal");
        $('#container-graficas').children('div').hide();
        $('#container-tablas').children('div').hide();
        dato1 = $("#opcion1 option:selected").text();
        dato2 = $("#opcion2 option:selected").text();
        $.getJSON("/apicentral?indicemasa=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#tb-im').children('td').remove();
            $.each(json[0].data, function(i, field) {
                $("#tb-im").append("<td>" + field + "</td>");
            });
            $('#container-indice-masa').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Índice de masa corporal'
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
        $('#tabla-indice-masa').show();
        $.getJSON("/apicentral?indicemasagenero=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#tb-img').children('td').remove();
            $('#th-img').children('td').remove();
            $.each(json, function(i, field) {
                $("#th-img").append("<td colspan=3>" + field.name + "</td>");
                $.each(field.data, function(x, field2) {

                    $("#tb-img").append("<td>" + field2 + "</td>");
                });
            });
            $('#container-indice-masa-genero').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Índice de masa de corporal por género'
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
        $('#tabla-indice-masa-genero').show();
        $.getJSON("/apicentral?indicemasaedad=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#tb-ime').children('td').remove();
            $('#th-ime').children('td').remove();
            $('#mim20').children('td').remove();
            $('#mim30').children('td').remove();
            $('#mim40').children('td').remove();
            $('#mim50').children('td').remove();
            $('#mim60').children('td').remove();
            $("#th-ime").append("<td> </td>");
            $('#mim20').append("<td>Menor a 20</td>");
            $('#mim30').append("<td>21 a 30</td>");
            $('#mim40').append("<td>31 a 40</td>");
            $('#mim50').append("<td>41 a 50</td>");
            $('#mim60').append("<td>Mayor a 51</td>");
            $.each(json, function(i, field) {
                $("#th-ime").append("<td>" + field.name + "</td>");
                $.each(field.data, function(x, field2) {
                    if (x == 0) {
                        if (field2 != null) {
                            $("#mim20").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 1) {
                        if (field2 != null) {
                            $("#mim30").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 2) {
                        if (field2 != null) {
                            $("#mim40").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 3) {
                        if (field2 != null) {
                            $("#mim50").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 4) {
                        if (field2 != null) {
                            $("#mim60").append("<td>" + field2 + "</td>");
                        }
                    }
                });
            });
            $('#container-indice-masa-edad').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Índice de masa de corporal por edad'
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
        $('#tabla-indice-masa-edad').show();
    });
    $("#circunferencia").click(function() {
        $("#nombre").text("Circunferencia abdominal");
        $('#container-graficas').children('div').hide();
        $('#container-tablas').children('div').hide();
        dato1 = $("#opcion1 option:selected").text();
        dato2 = $("#opcion2 option:selected").text();
        $.getJSON("/apicentral?circunferencia=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#tb-c').children('td').remove();
            $('#th-c').children('td').remove();
            $.each(json, function(i, field) {
                $("#th-c").append("<td>" + field.name + "</td>");
                $.each(field.data, function(x, field2) {
                    if (field2 != null)
                        $("#tb-c").append("<td>" + field2 + "</td>");
                });
            });
            $('#container-circunferencia').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Circunferencia por género'
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
        $('#tabla-circunferencia').show();
        $.getJSON("/apicentral?circunferenciaedad=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#tb-ce').children('td').remove();
            $('#th-ce').children('td').remove();
             $('#mce20').children('td').remove();
            $('#mce30').children('td').remove();
            $('#mce40').children('td').remove();
            $('#mce50').children('td').remove();
            $('#mce60').children('td').remove();
            $("#th-ce").append("<td> </td>");
            $('#mce20').append("<td>Menor a 20</td>");
            $('#mce30').append("<td>21 a 30</td>");
            $('#mce40').append("<td>31 a 40</td>");
            $('#mce50').append("<td>41 a 50</td>");
            $('#mce60').append("<td>Mayor a 51</td>");
            
            $.each(json, function(i, field) {
                $("#th-ce").append("<td>" + field.name + "</td>");
                $.each(field.data, function(x, field2) {
                    if (x == 0) {
                        if (field2 != null) {
                            $("#mce20").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 1) {
                        if (field2 != null) {
                            $("#mce30").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 2) {
                        if (field2 != null) {
                            $("#mce40").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 3) {
                        if (field2 != null) {
                            $("#mce50").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 4) {
                        if (field2 != null) {
                            $("#mce60").append("<td>" + field2 + "</td>");
                        }
                    }
                });
            });
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
        $('#tabla-circunferencia-edad').show();
    });
    $("#frutas").click(function() {
        $("#nombre").text("Consumo de frutas");
        $('#container-graficas').children('div').hide();
        $('#container-tablas').children('div').hide();
        dato1 = $("#opcion1 option:selected").text();
        dato2 = $("#opcion2 option:selected").text();
        $.getJSON("/apicentral?frutas=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {

            $('#tb-f').children('td').remove();
            $.each(json[0].data, function(i, field) {
                $("#tb-f").append("<td>" + field + "</td>");
            });
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
        $('#tabla-frutas').show();
        $.getJSON("/apicentral?frutasgenero=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#tb-fg').children('td').remove();
            $('#th-fg').children('td').remove();
            $.each(json, function(i, field) {
                $("#th-fg").append("<td colspan=3>" + field.name + "</td>");
                $.each(field.data, function(x, field2) {
                    if (field2 != null)
                        $("#tb-fg").append("<td>" + field2 + "</td>");
                });
            });
            $('#container-frutas-genero').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Raciones de frutas por género'
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
            $('#tb-fe').children('td').remove();
            $('#th-fe').children('td').remove();
            $('#mf20').children('td').remove();
            $('#mf30').children('td').remove();
            $('#mf40').children('td').remove();
            $('#mf50').children('td').remove();
            $('#mf60').children('td').remove();
            $("#th-fe").append("<td> </td>");
            $('#mf20').append("<td>Menor a 20</td>");
            $('#mf30').append("<td>21 a 30</td>");
            $('#mf40').append("<td>31 a 40</td>");
            $('#mf50').append("<td>41 a 50</td>");
            $('#mf60').append("<td>Mayor a 51</td>");
            $.each(json, function(i, field) {
                $("#th-fe").append("<td>" + field.name + "</td>");
                $.each(field.data, function(x, field2) {
                    if (x == 0) {
                        if (field2 != null) {
                            $("#mf20").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 1) {
                        if (field2 != null) {
                            $("#mf30").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 2) {
                        if (field2 != null) {
                            $("#mf40").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 3) {
                        if (field2 != null) {
                            $("#mf50").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 4) {
                        if (field2 != null) {
                            $("#mf60").append("<td>" + field2 + "</td>");
                        }
                    }
                });
            });
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
        $('#tabla-frutas-genero').show();
        $('#tabla-frutas-edad').show();
        $('#tabla-frutas').show();
    });
    $("#verduras").click(function() {
        $("#nombre").text("Consumo de verduras");
        $('#container-graficas').children('div').hide();
        $('#container-tablas').children('div').hide();
        dato1 = $("#opcion1 option:selected").text();
        dato2 = $("#opcion2 option:selected").text();
        $.getJSON("/apicentral?verduras=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#tb-v').children('td').remove();
            $.each(json[0].data, function(i, field) {
                $("#tb-v").append("<td>" + field + "</td>");
            });
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
        $('#tabla-verduras').show();
        $.getJSON("/apicentral?verdurasgenero=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#tb-vg').children('td').remove();
            $('#th-vg').children('td').remove();
            $.each(json, function(i, field) {
                $("#th-vg").append("<td colspan=3>" + field.name + "</td>");
                $.each(field.data, function(x, field2) {
                    if (field2 != null)
                        $("#tb-vg").append("<td>" + field2 + "</td>");
                });
            });
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
        $('#tabla-verduras-genero').show();
        $.getJSON("/apicentral?verdurasedad=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#tb-ve').children('td').remove();
            $('#th-ve').children('td').remove();
             $('#mv20').children('td').remove();
            $('#mv30').children('td').remove();
            $('#mv40').children('td').remove();
            $('#mv50').children('td').remove();
            $('#mv60').children('td').remove();
            $("#th-ve").append("<td> </td>");
            $('#mv20').append("<td>Menor a 20</td>");
            $('#mv30').append("<td>21 a 30</td>");
            $('#mv40').append("<td>31 a 40</td>");
            $('#mv50').append("<td>41 a 50</td>");
            $('#mv60').append("<td>Mayor a 51</td>");
            $.each(json, function(i, field) {
                $("#th-ve").append("<td>" + field.name + "</td>");
                $.each(field.data, function(x, field2) {
                    if (x == 0) {
                        if (field2 != null) {
                            $("#mv20").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 1) {
                        if (field2 != null) {
                            $("#mv30").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 2) {
                        if (field2 != null) {
                            $("#mv40").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 3) {
                        if (field2 != null) {
                            $("#mv50").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 4) {
                        if (field2 != null) {
                            $("#mv60").append("<td>" + field2 + "</td>");
                        }
                    }
                });
            });
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
        $('#tabla-verduras-edad').show();
    });
    $("#capeados").click(function() {
        $("#nombre").text("Consumo de alimentos capeados");
        $('#container-graficas').children('div').hide();
        $('#container-tablas').children('div').hide();
        dato1 = $("#opcion1 option:selected").text();
        dato2 = $("#opcion2 option:selected").text();
        $.getJSON("/apicentral?capeados=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#tb-ca').children('td').remove();
            $.each(json[0].data, function(i, field) {
                $("#tb-ca").append("<td>" + field + "</td>");
            });
            $('#container-capeados').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Frecuencia de alimentos capeados'
                },
                xAxis: {
                    categories: [
                        'Todos los días',
                        'Más de 3 veces a la semana',
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
        $('#tabla-capeados').show();
        $.getJSON("/apicentral?capeadosgenero=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#tb-cag').children('td').remove();
            $('#th-cag').children('td').remove();
            $.each(json, function(i, field) {
                $("#th-cag").append("<td colspan=5>" + field.name + "</td>");
                $.each(field.data, function(x, field2) {
                    if (field2 != null)
                        $("#tb-cag").append("<td>" + field2 + "</td>");
                });
            });
            $('#container-capeados-genero').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Frecuencia en consumo de alimentos capeados por género'
                },
                xAxis: {
                    categories: [
                        'Todos los días',
                        'Más de 3 veces a la semana',
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
        $('#tabla-capeados-genero').show();
        $.getJSON("/apicentral?capeadosedad=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#tb-cae').children('td').remove();
            $('#th-cae').children('td').remove();
             $('#mc20').children('td').remove();
            $('#mc30').children('td').remove();
            $('#mc40').children('td').remove();
            $('#mc50').children('td').remove();
            $('#mc60').children('td').remove();
            $("#th-cae").append("<td> </td>");
            $('#mc20').append("<td>Menor a 20</td>");
            $('#mc30').append("<td>21 a 30</td>");
            $('#mc40').append("<td>31 a 40</td>");
            $('#mc50').append("<td>41 a 50</td>");
            $('#mc60').append("<td>Mayor a 51</td>");
            
            $.each(json, function(i, field) {
                $("#th-cae").append("<td>" + field.name + "</td>");
                $.each(field.data, function(x, field2) {
                    if (x == 0) {
                        if (field2 != null) {
                            $("#mc20").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 1) {
                        if (field2 != null) {
                            $("#mc30").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 2) {
                        if (field2 != null) {
                            $("#mc40").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 3) {
                        if (field2 != null) {
                            $("#mc50").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 4) {
                        if (field2 != null) {
                            $("#mc60").append("<td>" + field2 + "</td>");
                        }
                    }
                });
            });
            $('#container-capeados-edad').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Frecuencia de alimentos capeados por edad'
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
        $('#tabla-capeados-edad').show();
    });
    $("#sal").click(function() {
        $("#nombre").text("Consumo de alimentos con sal");
        $('#container-graficas').children('div').hide();
        $('#container-tablas').children('div').hide();
        dato1 = $("#opcion1 option:selected").text();
        dato2 = $("#opcion2 option:selected").text();
        $.getJSON("/apicentral?sal=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#tb-s').children('td').remove();
            $.each(json[0].data, function(i, field) {
                $("#tb-s").append("<td>" + field + "</td>");
            });
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
        $('#tabla-sal').show();
        $.getJSON("/apicentral?salgenero=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#tb-sg').children('td').remove();
            $('#th-sg').children('td').remove();
            $.each(json, function(i, field) {
                $("#th-sg").append("<td colspan=3>" + field.name + "</td>");
                $.each(field.data, function(x, field2) {
                    if (field2 != null)
                        $("#tb-sg").append("<td>" + field2 + "</td>");
                });
            });
            $('#container-sal-genero').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Consumo de sal por género'
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
        $('#tabla-sal-genero').show();
        $.getJSON("/apicentral?saledad=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#tb-se').children('td').remove();
            $('#th-se').children('td').remove();
            $('#ms20').children('td').remove();
            $('#ms30').children('td').remove();
            $('#ms40').children('td').remove();
            $('#ms50').children('td').remove();
            $('#ms60').children('td').remove();
            $("#th-se").append("<td> </td>");
            $('#ms20').append("<td>Menor a 20</td>");
            $('#ms30').append("<td>21 a 30</td>");
            $('#ms40').append("<td>31 a 40</td>");
            $('#ms50').append("<td>41 a 50</td>");
            $('#ms60').append("<td>Mayor a 51</td>");
            $.each(json, function(i, field) {
                $("#th-se").append("<td>" + field.name + "</td>");
                $.each(field.data, function(x, field2) {
                    if (x == 0) {
                        if (field2 != null) {
                            $("#ms20").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 1) {
                        if (field2 != null) {
                            $("#ms30").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 2) {
                        if (field2 != null) {
                            $("#ms40").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 3) {
                        if (field2 != null) {
                            $("#ms50").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 4) {
                        if (field2 != null) {
                            $("#ms60").append("<td>" + field2 + "</td>");
                        }
                    }
                });
            });
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
        $('#tabla-sal-edad').show();
    });
    $("#estres").click(function() {
        $("#nombre").text("Nivel de estrés");
        $('#container-graficas').children('div').hide();
        $('#container-tablas').children('div').hide();
        dato1 = $("#opcion1 option:selected").text();
        dato2 = $("#opcion2 option:selected").text();
        $.getJSON("/apicentral?estres=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#tb-e').children('td').remove();
            $.each(json[0].data, function(i, field) {
                $("#tb-e").append("<td>" + field + "</td>");
            });
            $('#container-estres').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Nivel de estrés'
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
        $('#tabla-estres').show();
        $.getJSON("/apicentral?estresgenero=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#tb-se').children('td').remove();
            $('#th-eg').children('td').remove();
            $('#tb-eg').children('td').remove();
            $.each(json, function(i, field) {
                $("#th-eg").append("<td colspan=3>" + field.name + "</td>");
                $.each(field.data, function(x, field2) {
                    if (field2 != null)
                        $("#tb-eg").append("<td>" + field2 + "</td>");
                });
            });

            $('#container-estres-genero').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Nivel de estrés por género'
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
        $('#tabla-estres-genero').show();
        $.getJSON("/apicentral?estresedad=true&dato1=" + dato1 + "&dato2=" + dato2 + "", function(json) {
            $('#th-ee').children('td').remove();
            $('#tb-ee').children('td').remove();
            $('#m20').children('td').remove();
            $('#m30').children('td').remove();
            $('#m40').children('td').remove();
            $('#m50').children('td').remove();
            $('#m60').children('td').remove();
            $("#th-ee").append("<td> </td>");
            $('#m20').append("<td>Menor a 20</td>");
            $('#m30').append("<td>21 a 30</td>");
            $('#m40').append("<td>31 a 40</td>");
            $('#m50').append("<td>41 a 50</td>");
            $('#m60').append("<td>Mayor a 51</td>");
            
            $.each(json, function(i, field) {
                $("#th-ee").append("<td>" + field.name + "</td>");
                $.each(field.data, function(x, field2) {
                    if (x == 0) {
                        if (field2 != null) {
                            $("#m20").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 1) {
                        if (field2 != null) {
                            $("#m30").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 2) {
                        if (field2 != null) {
                            $("#m40").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 3) {
                        if (field2 != null) {
                            $("#m50").append("<td>" + field2 + "</td>");
                        }
                    }else if (x == 4) {
                        if (field2 != null) {
                            $("#m60").append("<td>" + field2 + "</td>");
                        }
                    }
                });
            });
            $('#container-estres-edad').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Nivel de estrés por edad'
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
        $('#tabla-estres-edad').show();
    });


});