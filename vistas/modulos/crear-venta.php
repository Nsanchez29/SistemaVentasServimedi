<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Nueva venta
    
    </h1>

  </section>

  <section class="content">

    <div class="row">

      <!--=====================================
      EL FORMULARIO
      ======================================-->
      
      <div class="col-lg-5 col-xs-12">
        
        <div class="box box-dodgerblue">
          
          <div class="box-header with-border"></div>

          <form role="form" method="post" class="formularioVenta">

            <div class="box-body">
  
              <div class="box">

                <!--=====================================
                ENTRADA DEL VENDEDOR
                ======================================-->
            
                <div class="form-group">
                
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="ion ion-ios-person" style="width: 10px"></i></span> 

                    <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                    <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"]; ?>">

                  </div>

                </div> 

                <!--=====================================
                ENTRADA DEL CÓDIGO
                ======================================--> 

                <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="ion ion-ios-cart" style="width: 10px"></i></span>

                    <?php

                    $item = null;
                    $valor = null;

                    $ventas = ControladorVentas::ctrMostrarVentas($item, $valor);

                    if(!$ventas){

                      echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="10001" readonly>';
                  

                    }else{

                      foreach ($ventas as $key => $value) {
                        
                        
                      
                      }

                      $codigo = $value["codigo"] + 1;



                      echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="'.$codigo.'" readonly>';
                  

                    }

                    ?>
                    
                    
                  </div>
                
                </div>

                <!--=====================================
                ENTRADA DEL CLIENTE
                ======================================--> 

                <div class="form-group">
                  
                  <div class="input-group">

                    <span class="input-group-addon">

                      <i class="ion ion-ios-people" style="width: 10px"></i>

                    </span>

                    <select class="selectpicker form-control" data-header="Ingrese nombre o NIT" data-size="4" multiple data-max-options="1" title="Cliente" data-live-search="true" id="seleccionarCliente" name="seleccionarCliente" required>

                      <?php

                      $item = null;
                      $valor = null;

                      $categorias = ControladorClientes::ctrMostrarClientes($item, $valor);

                      foreach ($categorias as $key => $value) {

                        echo '<option data-tokens="'.$value["nit"].'" value="'.$value["id"].'">'.$value["nombre"].'</option>';

                      }

                      ?>
                        
                    </select>

                    <button type="button" style="margin-left: 5px; height: 34px" class="btn btn-dodgerblue btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal"><i class="fas fa-plus"></i> Nuevo cliente</button>

                  </div>

                </div>                

                <!--=====================================
                ENTRADA PARA AGREGAR PRODUCTO
                ======================================--> 

                <div class="form-group row nuevoProducto">

                </div>

                <input type="hidden" id="listaProductos" name="listaProductos">

                <!--=====================================
                BOTÓN PARA AGREGAR PRODUCTO en dispositivo
                ======================================-->

                <button type="button" class="btn btn-dodgerblue hidden-lg btnAgregarProducto"><i class="fas fa-plus"></i> Agregar producto</button>

                <hr>

                <div class="row">

                  <!--=====================================
                  ENTRADA DESCUENTO Y TOTAL
                  ======================================-->
                  
                  <div class="col-xs-10 pull-right">
                    
                    <table class="table">

                      <thead>

                        <tr>
                          <th>Descuento</th>
                          <th>Total</th>      
                        </tr>

                      </thead>

                      <tbody>
                      
                        <tr>
                          
                          <td style="width: 40%">
                            
                            <div class="input-group">
                           
                              <input type="number" class="form-control input-lg" min="0" value="0" id="nuevoDescuentoVenta" name="nuevoDescuentoVenta" placeholder="0" required>

                               <input type="hidden" name="nuevoPrecioDescuento" id="nuevoPrecioDescuento" required>

                               <input type="hidden" name="nuevoPrecioSubtotal" id="nuevoPrecioSubtotal" required>

                              <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                        
                            </div>

                          </td>

                           <td style="width: 60%">
                            
                            <div class="input-group">
                           
                              <span class="input-group-addon"><b>Q</b></span>

                              <input type="text" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" placeholder="0" readonly required>

                              <input type="hidden" name="totalVenta" id="totalVenta">
                              
                        
                            </div>

                          </td>

                        </tr>

                      </tbody>

                    </table>

                  </div>

                </div>

                <hr>

                <!--=====================================
                ENTRADA MÉTODO DE PAGO
                ======================================-->

                <div class="form-group row">
                  
                  <div class="col-xs-6" style="padding-right:0px">
                    
                     <div class="input-group">
                  
                      <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required>
                        <option value="">Método de pago</option>
                        <option value="Efectivo">Efectivo</option>
                        <option value="CQ">Cheque</option>               
                      </select>    

                    </div>

                  </div>

                  <div class="cajasMetodoPago"></div>

                  <input type="hidden" id="listaMetodoPago" name="listaMetodoPago">

                </div>

                <br>
      
              </div>

          </div>

          <div class="box-footer">

            <button type="submit" class="btn btn-dodgerblue pull-right"><i class="far fa-save"></i> Guardar venta</button>

          </div>

        </form>

        <?php

          $guardarVenta = new ControladorVentas();
          $guardarVenta -> ctrCrearVenta();
          
        ?>

        </div>
            
      </div>

      <!--=====================================
      LA TABLA DE PRODUCTOS
      ======================================-->

      <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
        
        <div class="box box-dodgerblue">

          <div class="box-header with-border"></div>

          <div class="box-body">
            
            <table class="table table-bordered table-hover dt-responsive tablaVentas">
              
               <thead>

                 <tr>
                  
                  <th style="width: 5px">Imagen</th>
                  <th style="width: 5px">Cod</th>
                  <th style="width: 10px">Descripción</th>
                  <th style="width: 10px">Precio</th>
                  <th style="width: 10px">Stock</th>
                  <th style="width: 10px">Acciones</th>
                </tr>

              </thead>

            </table>

          </div>

        </div>


      </div>

    </div>
   
  </section>

</div>

<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background: dodgerblue; color:white">
          <center>
          <img class="modal-title" src="vistas/img/plantilla/agregarcliente.png" width="320px">
          </center>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" ><i class="fa fa-user" style="width: 10px"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL DOCUMENTO ID -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key" style="width: 10px"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingresar NIT" maxlength="10" required>
 
              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope" style="width: 10px"></i></span> 

                <input type="email" class="form-control input-lg" name="nuevoEmail" value="c_f@correo.com" placeholder="Ingresar email" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone" style="width: 10px"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'9999-9999'" data-mask value="12345678" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker" style="width: 10px"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fas fa-window-close"></i> Salir</button>

          <button type="submit" class="btn btn-dodgerblue"><i class="far fa-save"></i> Guardar cliente</button>

        </div>

      </form>

      <?php

        $crearCliente = new ControladorClientes();
        $crearCliente -> ctrCrearCliente();

      ?>

    </div>

  </div>

</div>