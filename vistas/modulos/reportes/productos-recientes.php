<?php

$item = null;
$valor = null;
$orden = "id";

$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

 ?>

<div class="box box-dodgerblue" >
  
  <div class="box-header with-border">
    
    <h3 class="box-title">Productos agregados recientemente</h3>

  </div>

  <div class="box-body">

    <ul class="products-list product-list-in-box">

      <?php

      for ($i=0; $i < 8; $i++) { 

      echo'

      <li class="item">

        <div class="product-img">

          <img src="'.$productos[$i]["imagen"].'" class="img-thumbnail zoom" alt="Product Image">

        </div>

        <div class="product-info">

          <a class="product-title">

          '.$productos[$i]["descripcion"].'

          <span class="label label-success pull-right">Q '.number_format($productos[$i]["precio_venta"],2).'</span></a>

          <span class="product-description">Código: '.$productos[$i]["codigo"].'</span>

         </div>

       </li>';

     }

       ?>

    </ul>

  </div>

</div>