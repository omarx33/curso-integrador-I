<?php 

include '../modelo/Graficos.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>




<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>






<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>

<br><br><br>

<?php 
  $res = Graficos::GraficoxSintomas();

  $barra = Graficos::GraficoxBarras();
  
 



  $barras_gra = "";
  foreach ($barra as $key => $value) {
    $barras_gra .= "{
      name: '".$value['desc_ubicacion']."',
      y: ".$value['cantidad'].",
      drilldown: null
    },";
  }


  $grafico = "";
  foreach ($res as $key => $value) {
    $grafico .= "{
      name: '".$value['desc_preg']."',
      y: ".$value['cantidad']."
    },";
  }


?>




<div class="row">

<div class="col-md-6">
<div class="form-group">
<div  id="container" ></div>
</div>
</div>


<div class="col-md-6">
  <div class="form-group">
  <div  id="container2" ></div>
</div>
</div>
</div>




<script>






// pai chart
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Reporte de Sintomas '
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} % '
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [
            
            
            <?php echo $grafico; ?>
    
    ]
    }]
});




// Create the chart
Highcharts.chart('container2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Reporte por distrito'
    },
    subtitle: {
        text: 'Curso Integrador'
    },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total porcentaje'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.0f}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> total<br/>'
    },

    series: [
        {
            name: "Browsers",
            colorByPoint: true,
            data: [
             <?php echo $barras_gra; ?>
            ]
        }
    ],
    drilldown: {
        series: [
            {
                name: "Chrome",
                id: "Chrome",
                data: [
                    [
                        "v65.0",
                        0.1
                    ],
                    [
                        "v64.0",
                        1.3
                    ],
                    [
                        "v63.0",
                        53.02
                    ]
                ]
            },
            {
                name: "Firefox",
                id: "Firefox",
                data: [
                    [
                        "v58.0",
                        1.02
                    ],
                    [
                        "v57.0",
                        7.36
                    ],
                    [
                        "v56.0",
                        0.35
                    ]
                ]
            },
            {
                name: "Internet Explorer",
                id: "Internet Explorer",
                data: [
                    [
                        "v11.0",
                        6.2
                    ],
                    [
                        "v10.0",
                        0.29
                    ],
                    [
                        "v9.0",
                        0.27
                    ],
                    [
                        "v8.0",
                        0.47
                    ]
                ]
            },
            {
                name: "Safari",
                id: "Safari",
                data: [
                    [
                        "v11.0",
                        3.39
                    ],
                    [
                        "v10.1",
                        0.96
                    ],
                    [
                        "v10.0",
                        0.36
                    ],
                    [
                        "v9.1",
                        0.54
                    ],
                    [
                        "v9.0",
                        0.13
                    ],
                    [
                        "v5.1",
                        0.2
                    ]
                ]
            },
            {
                name: "Edge",
                id: "Edge",
                data: [
                    [
                        "v16",
                        2.6
                    ],
                    [
                        "v15",
                        0.92
                    ],
                    [
                        "v14",
                        0.4
                    ],
                    [
                        "v13",
                        0.1
                    ]
                ]
            },
            {
                name: "Opera",
                id: "Opera",
                data: [
                    [
                        "v50.0",
                        0.96
                    ],
                    [
                        "v49.0",
                        0.82
                    ],
                    [
                        "v12.1",
                        0.14
                    ]
                ]
            }
        ]
    }
});
</script>



</body>
</html>