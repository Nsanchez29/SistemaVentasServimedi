<?php

$item = null;

$valor =null;

$orden ="ventas";

$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

$totalVentas = ControladorProductos::ctrMostrarSumaVentas();

$colores = array("red", "orange", "yellow", "greenyellow", "dodgerblue");

?>

<div class="box box-dodgerblue">

  <div class="box-header with-border">

    <h3 class="box-title">Productos más vendidos</h3>

  </div>

  <div class="box-body">

    <div class="row">

      <div class="col-md-6">

        <div class="chart-responsive">

          <canvas id="pieChart" height="150"></canvas>

        </div>
                  
      </div>
               
      <div class="col-md-6 hidden-xs">

        <ul class="chart-legend clearfix">

          <?php

          for ($i=0; $i < 5; $i++) { 

            echo '<li><i class="fa fa-circle-o text-'.$colores[$i].'"></i> '.$productos[$i]["descripcion"].'</li>';            

          }

          ?>

        </ul>

      </div>
                
    </div>
         
  </div>

  <div class="box-footer no-padding">

    <ul class="nav nav-pills nav-stacked">

      <?php

      for ($i=0; $i < 5; $i++) { 
        
        echo '<li>

                <a>

                  <img src="'.$productos[$i]["imagen"].'" class="img-thumbnail" width="60px" style="margin-right:10px">
                      '.$productos[$i]["descripcion"].'

                  <span class="pull-right text-'.$colores[$i].'">'.number_format($productos[$i]["ventas"]*100/$totalVentas["total"],2).'%</span>

                </a>

              </li>';

      }

      ?>

    </ul>

  </div>
           
</div>

<script>

//Chart

  var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
  var pieChart       = new Chart(pieChartCanvas);
  var PieData        = [

  <?php

  for ($i=0; $i < 5; $i++) { 
    echo "{
      value    : ".$productos[$i]["ventas"].",
      color    : '".$colores[$i]."',
      highlight: '".$colores[$i]."',
      label    : '".$productos[$i]["descripcion"]."'
    },";
  }

  ?>
    
  ];
  var pieOptions     = {
    // Boolean - Whether we should show a stroke on each segment
    segmentShowStroke    : true,
    // String - The colour of each segment stroke
    segmentStrokeColor   : '#fff',
    // Number - The width of each segment stroke
    segmentStrokeWidth   : 1,
    // Number - The percentage of the chart that we cut out of the middle
    percentageInnerCutout: 0, // This is 0 for Pie charts
    // Number - Amount of animation steps
    animationSteps       : 100,
    // String - Animation easing effect
    animationEasing      : 'easeOutBounce',
    // Boolean - Whether we animate the rotation of the Doughnut
    animateRotate        : true,
    // Boolean - Whether we animate scaling the Doughnut from the centre
    animateScale         : false,
    // Boolean - whether to make the chart responsive to window resizing
    responsive           : true,
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio  : false,
    // String - A legend template
    legendTemplate       : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
    // String - A tooltip template
    tooltipTemplate      : '<%=label%>: <%=value %>'
  };
  // Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  pieChart.Doughnut(PieData, pieOptions);
  // -----------------
  // - END PIE CHART -
  // -----------------  

</script>