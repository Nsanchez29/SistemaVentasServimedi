<?php

$item = null;
$valor = null;
$orden = "id";

$ventas = ControladorVentas::ctrSumaTotalVentas();

$compras = ControladorProductos::ctrSumaTotalCompras();

$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
$totalProductos = count($productos);

$proveedores = ControladorProveedores::ctrMostrarProveedores($item, $valor);
$totalProveedores = count($proveedores);



?>

<div class="col-lg-4 col-xs-6">

  <div class="small-box bg-red">
  
    <div class="inner">

      <h3>Q
        <?php

        echo number_format($compras["total"]);

        ?>
        
      </h3>

      <p>Compras</p>

    </div>

  </div>

</div>

<div class="col-lg-4 col-xs-6">

  <div class="small-box bg-orange">
  
    <div class="inner">

      <h3>Q
        <?php

        echo number_format($ventas["total"]);

        ?>
        
      </h3>

      <p>Ventas</p>

    </div>

  </div>

</div>

<div class="col-lg-4 col-xs-12">

  <div class="small-box bg-green">
  
    <div class="inner">

      <h3>Q
        <?php

        echo number_format($ventas["total"]-$compras["total"]);

        ?>
        
      </h3>

      <p>Balance</p>

    </div>

    <div class="icon">

      <?php

        if(number_format($ventas["total"]-$compras["total"]) < 0){

          echo ' <i class="fa fa-chevron-down"></i>';}

        else{

          echo ' <i class="fa fa-chevron-up"></i>';}

        ?>   

    </div>

  </div>

</div>