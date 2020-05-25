<?php

$item = null;
$valor = null;
$orden = "id";

$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
$totalCategorias = count($categorias);

$clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
$totalClientes = count($clientes);

$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
$totalProductos = count($productos);

?>


<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-orange">
  
    <div class="inner">

      <h3><?php echo number_format($totalCategorias); ?></h3>

      <p>Categorías</p>

    </div>

    <div class="icon">

    <i class="fas fa-barcode"></i>

    </div>

    <a href="categorias" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>

  </div>

</div>

<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-yellow">
  
    <div class="inner">

      <h3><?php echo number_format($totalClientes); ?></h3>

      <p>Clientes</p>

    </div>

    <div class="icon">

      <i class="fas fa-user"></i>

    </div>

    <a href="clientes" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>

  </div>

</div>

<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-greenyellow">
  
    <div class="inner">

      <h3><?php echo number_format($totalProductos); ?></h3>

      <p>Productos</p>

    </div>

    <div class="icon">

    <i class="fas fa-box-open"></i>

    </div>

    <a href="productos" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>

  </div>

</div>

<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-dodgerblue">
  
    <div class="inner">

      <h3>Ventas</h3>

      <p>Crear venta</p>

    </div>

    <div class="icon">

    <i class="fas fa-shopping-cart"></i>

    </div>

    <a href="crear-venta" class="small-box-footer">Crear venta <i class="fa fa-arrow-circle-right"></i></a>

  </div>

</div>