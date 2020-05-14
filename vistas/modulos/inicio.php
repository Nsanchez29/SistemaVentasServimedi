<div class="content-wrapper">

  <section class="content-header">
    
    <?php
    
    echo '<h1>
      
      Bienvenido, '.$_SESSION["nombre"].' <small>Panel de control</small> 
   
    </h1>';
    
    ?>

  </section>

  <section class="content">

    <div class="row">

    <?php

      include "inicio/calendario.php";

        if ($_SESSION["perfil"] == "Vendedor") {

        include "inicio/inicio-vendedor.php";

        }

        if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Editor") {   

        include "inicio/cajas-superiores.php";

        }

        ?>
          
    </div>

    <div class="row">

      <div class="col-lg-12">

        <?php

        if ($_SESSION["perfil"] == "Administrador") {

          include "reportes/grafico-ventas.php";

        }

        ?>
          
      </div>

    </div>

    <div class="row">

      <div class="col-lg-6">

        <?php

        if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Editor") {

          include "reportes/stock.php";

        }

        ?>
          
      </div>

      <div class="col-lg-6">

        <?php

        if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Editor") {

          include "reportes/productos-recientes2.php";

        }

        ?>
          
      </div>

    </div>

  </section>

</div>