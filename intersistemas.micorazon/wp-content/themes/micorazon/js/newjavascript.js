/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var chart;
    $(document).ready(function() {
        var cursan = {
            chart: {
                renderTo: 'current_sanand',
                defaultSeriesType: 'area',
                marginRight: 10,
                marginBottom: 20
            },
            title: {
                text: '',
            },
            subtitle: {
                text: '2013/14',
            },
            xAxis: {
                categories: ['Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar']
            },
            yAxis: {
                title: {
                    text: 'Amount [Billion]'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                crosshairs: true,
                shared: true
            },
            legend: {
                layout: 'vertical',
                backgroundColor: 'white',
                align: 'right',
                verticalAlign: 'top',
                y: 35,
                x: -10,
                borderWidth: 1,
                borderRadius: 0,
                title: {
                    text: '::::::::::::'
                },
                floating: true,
                draggable: true,
                zIndex: 20

            },

            plotOptions: {

                series: {
                    cursor: 'pointer',  
                    marker: {
                        lineWidth: 1
                    }
                }
            },

            series: [{
                color: Highcharts.getOptions().colors[2],
                name: 'Sanand',
                marker: {
                    fillColor: '#FFFFFF',
                    lineWidth: 2,
                    lineColor: null // inherit from series
                },
                dataLabels: {
                    enabled: true,
                    rotation: 0,
                    color: '#666666',
                    align: 'top',
                    x: -10,
                    y: -10,
                    style: {
                        fontSize: '9px',
                        fontFamily: 'Verdana, sans-serif',
                        textShadow: '0 0 0px black'
                    }
                }
            }],

      }


     $.getJSON("data.php", function(json){
            options.xAxis.categories = json['category'];
            options.series[0].name = json['name'];
            options.series[0].data = json['data'];
            chart = new Highcharts.Chart(options);
     });
     });