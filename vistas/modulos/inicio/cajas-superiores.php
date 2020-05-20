<?php

$item = null;
$valor = null;
$orden = "id";

$ventas = ControladorVentas::ctrSumaTotalVentas();

$compras = ControladorProductos::ctrSumaTotalCompras();

$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
$totalCategorias = count($categorias);

$clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
$totalClientes = count($clientes);

$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
$totalProductos = count($productos);

$proveedores = ControladorProveedores::ctrMostrarProveedores($item, $valor);
$totalProveedores = count($proveedores);

$contactos = ControladorContactos::ctrMostrarContactos($item, $valor);
$totalContactos = count($contactos);

?>


<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-red">
  
    <div class="inner">

      <h3>
        <?php

            echo number_format($totalProveedores);

        ?>
        
      </h3>

      <p>Proveedores</p>

    </div>

    <div class="icon">

        <i class="fas fa-user"></i>

        </div>

          <a href="proveedores" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>

          

    </div>

</div>

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


