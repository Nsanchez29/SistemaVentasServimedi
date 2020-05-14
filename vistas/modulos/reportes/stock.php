<?php

$item = null;
$valor = null;
$orden = "stock";

$productos = ControladorProductos::ctrMostrarStockProductos($item, $valor, $orden);

?>

<div class="box box-dodgerblue">
  
  <div class="box-header with-border">
    
    <h3 class="box-title">Productos de bajo stock</h3>

  </div>

  <div class="box-body">

    <ul class="products-list product-list-in-box">

      <?php

      for ($i=0; $i < 7; $i++) { 

      echo '

      <li class="item">

        <div class="product-img">

          <img src="'.$productos[$i]["imagen"].'" class="img-thumbnail zoom" alt="Product Image">

        </div>

        <div class="product-info">

          <a class="product-title">

          '.$productos[$i]["descripcion"];

          if($productos[$i]["stock"] <= 10){

            echo '

            <button class="btn btn-danger pull-right">'.$productos[$i]["stock"].'</button></a>

            <span class="product-description">Código: '.$productos[$i]["codigo"].'</span>


        </div>

      </li>';

      } else if($productos[$i]["stock"] >= 11 && $productos[$i]["stock"] <= 15){

      echo '

            <button class="btn btn-warning pull-right">'.$productos[$i]["stock"].'</button></a>

            <span class="product-description">Código: '.$productos[$i]["codigo"].'</span>

        </div>

      </li>';

      } else {

      echo '

            <button class="btn btn-success pull-right">'.$productos[$i]["stock"].'</button></a>

            <span class="product-description">Código: '.$productos[$i]["codigo"].'</span>

        </div>

      </li>';

      }

      }

      ?>

    </ul>

  </div>

</div>