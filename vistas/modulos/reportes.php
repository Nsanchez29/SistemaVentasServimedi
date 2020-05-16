<?php

if($_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "404";

  </script>';

  return;

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Reporte de ventas
    
    </h1>

  </section>

  <section class="content">

  <div class="row">

    <?php

    if ($_SESSION["perfil"] == "Administrador") {

          include "reportes/cajas-superiores.php";

    }

    ?>
          
  </div>

  <?php

    if ($_SESSION["perfil"] == "Administrador") {

      include "reportes/barra.php";

    }

  ?>

  <div class="box box-dodgerblue">

    <div class="box-header with-border">

      <div class="input-group hidden-xs">

        <button type="button" class="btn btn-dodgerblue pull-left" id="daterange-btn2">
           
          <span>Rango de fecha</span>

          <i class="fa fa-caret-down"></i>

        </button>

      </div>

    <div class="box-tools hidden-xs pull-right">

      <?php

        if(isset($_GET["fechaInicial"])){

          echo '<a href="vistas/modulos/documentos/descargar-reporte.php?reporte=reporte&fechaInicial='.$_GET["fechaInicial"].'&fechaFinal='.$_GET["fechaFinal"].'">';

        }else{

          echo '<a href="vistas/modulos/documentos/descargar-reporte.php?reporte=reporte">';

        }         

      ?>
           
        <button class="btn btn-success">Descargar reporte <i class="ion ion-ios-download-outline"></i></button>

      </a>

      </div>
  
    </div>

    <div class="box-body">
        
      <div class="row">

        <div class="col-xs-12">
            
          <?php

          include "reportes/grafico-ventas.php";

          ?>

        </div>

      </div>

    </div>

  </div>

    <div class="row">

      
           <div class="col-md-6 col-xs-6">
             
            <?php

            include "reportes/productos-mas-vendidos.php";

            ?>

           </div>

           <div class="col-md-6 col-xs-6">
             
            <?php

            include "reportes/productos-recientes.php";

            ?>

           </div>

           
          
        </div>



  </section>
 
 </div>
