<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Ventas
    
    </h1>

  </section>

  <section class="content">

    <div class="box box-dodgerblue">  

      <div class="box-header with-border">
  
        <a href="crear-venta">

          <button class="btn btn-dodgerblue">
            
            Crear venta

          </button>

        </a>

        <button type="button" class="btn btn-dodgerblue pull-right" id="daterange-btn">
           
            <span>

              Rango de fecha
            
            </span>

            <span>

              <i class="fa fa-caret-down"></i>

            </span>

         </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-hover dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">No.</th>
           <th style="text-align: center">Código factura</th>
           <th style="text-align: center">Cliente</th>
           <th style="text-align: center">Vendedor</th>
           <th style="text-align: center">Forma de pago</th>
           <th style="text-align: center">Subtotal</th>
           <th style="text-align: center">Descuento</th>
           <th style="text-align: center">Total</th> 
           <th style="text-align: center">Fecha</th>
           <th style="width:10px; text-align: center">Acciones</th>

         </tr> 

        </thead>

        <tbody style="text-align: center">

        <?php

          if (isset($_GET["fechaInicial"])) {
            
            $fechaInicial = $_GET["fechaInicial"];
            $fechaFinal = $_GET["fechaFinal"];

          } else {

            $fechaInicial = null;
            $fechaFinal = null;

          }

          $respuesta = ControladorVentas::ctrRangoFechasFacturacion($fechaInicial, $fechaFinal);

          foreach ($respuesta as $key => $value) {
           

           echo '<tr>

                  <td>'.($key+1).'</td>

                  <td>'.$value["codigo"].'</td>';

                  $itemCliente = "id";
                  $valorCliente = $value["id_cliente"];

                  $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                  echo '<td>'.$respuestaCliente["nombre"].'</td>';

                  $itemUsuario = "id";
                  $valorUsuario = $value["id_vendedor"];

                  $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

                  echo '<td>'.$respuestaUsuario["nombre"].'</td>

                  <td>'.$value["metodo_pago"].'</td>

                  <td>Q '.number_format($value["subtotal"],2).'</td>

                  <td>Q '.number_format(abs($value["descuento"]),2).'</td>

                  <td>Q '.number_format($value["total"],2).'</td>

                  <td>'.$value["fecha"].'</td>

                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-info btnImprimirFactura" codigoVenta="'.$value["codigo"].'">

                      <i class="fa fa-print"></i>
                      
                      </button>

                    </div>  

                  </td>

                </tr>';
            }

        ?>
               
        </tbody>

       </table>

       <?php

      $eliminarVenta = new ControladorVentas();
      $eliminarVenta -> ctrEliminarVenta();

      ?>
       

      </div>

    </div>

  </section>

</div>