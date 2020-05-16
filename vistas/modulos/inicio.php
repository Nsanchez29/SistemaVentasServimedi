<div class="content-wrapper">

  <section class="content-header">
    
    <?php
    
    echo '<h1>
      
      <small>'.$_SESSION["nombre"].'</small> BIENVENDIDO AL SISTEMA DE VENTAS | SANATORIO SERVIMEDI 
   
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


  </section>

</div>