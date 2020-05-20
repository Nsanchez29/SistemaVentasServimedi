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
      
      Proveedores
    
    </h1>

  </section>

  <section class="content">

    <div class="box box-dodgerblue">

      <div class="box-header with-border">
  
        <button class="btn btn-dodgerblue" data-toggle="modal" data-target="#modalAgregarProveedor">
          
        <i class="fas fa-plus"></i> Agregar proveedor

        </button>     

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-hover dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:5px">No.</th>
           <th style="text-align: center">Descripción</th>
           <th style="text-align: center">Nombre</th>
           <th style="text-align: center">Teléfono</th>
           <th style="text-align: center">Email</th>
           <th style="text-align: center">Empresa</th>
           <th style="text-align: center">Teléfono</th>
           <th style="text-align: center">Email</th>
           <th style="text-align: center">Dirección</th>
           <th style="text-align: center; width:10px">Acciones</th>

         </tr> 

        </thead>

        <tbody style="text-align: center">

        <?php

          $item = null;
          $valor = null;

          $proveedores = ControladorProveedores::ctrMostrarProveedores($item, $valor);

          foreach ($proveedores as $key => $value) {            

            echo '<tr>

                    <td style="text-align: center">'.($key+1).'</td>

                    <td>'.$value["descripcion"].'</td>

                    <td>'.$value["nombre"].'</td>

                    <td>'.$value["telefono_proveedor"].'</td>

                    <td>'.$value["email_proveedor"].'</td>

                    <td>'.$value["empresa"].'</td>

                    <td>'.$value["telefono_empresa"].'</td>

                    <td>'.$value["email_empresa"].'</td>

                    <td>'.$value["direccion_empresa"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarProveedor" data-toggle="modal" data-target="#modalEditarProveedor" idProveedor="'.$value["id"].'"><i class="fa fa-pencil"></i></button>';

                        if ($_SESSION["perfil"] == "Administrador") {

                        echo '

                        <button class="btn btn-danger btnEliminarProveedor" idProveedor="'.$value["id"].'"><i class="fa fa-times"></i></button>';
                      }


                      echo '</div>  

                    </td>

                  </tr>';
          
            }

        ?>
   
        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR PROVEEDOR
======================================-->

<div id="modalAgregarProveedor" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background: dodgerblue; color:white">
          <center>
          <img class="modal-title" src="vistas/img/plantilla/agregarproveedor.png" width="320px">
          </center>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA LA DESCRIPCION -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="ion ion-ios-keypad" style="width: 10px"></i></span> 

                <select class="form-control input-lg" name="nuevoDescripcion" id="nuevoDescripcion" required>

                  <option value="">Seleccionar categoría</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                  foreach ($categorias as $key => $value) {
                    
                    echo '<option value="'.$value["categoria"].'">'.$value["categoria"].'</option>';
                  }

                  ?>
  
                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" ><i class="fa fa-user" style="width: 10px"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoProveedor" id="nuevoProveedor" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELEFONO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" ><i class="fa fa-phone" style="width: 10px"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoTelefonoProveedor" placeholder="Ingresar teléfono" pattern="[0-9 ]{9}" title="8 caracteres" data-inputmask="'mask': '9999 9999'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-at" style="width: 10px"></i></span> 

                <input type="email" class="form-control input-lg" name="nuevoEmailProveedor" value="e_p@correo.com" placeholder="Ingresar email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Todas las letras deben ser minúsculas">

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" ><i class="fa fa-building" style="width: 10px"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoEmpresa" placeholder="Ingresar nombre de empresa" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELEFONO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" ><i class="fa fa-phone" style="width: 10px"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoTelefonoEmpresa" placeholder="Ingresar teléfono de empresa" pattern="[0-9 ]{9}" title="8 caracteres" value="00000000" data-inputmask="'mask': '9999 9999'" data-mask>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-at" style="width: 10px"></i></span> 

                <input type="email" class="form-control input-lg" name="nuevoEmailEmpresa" value="e_c@correo.com" placeholder="Ingresar email de empresa" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Todas las letras deben ser minúsculas">

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker" style="width: 10px"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoDireccionEmpresa" placeholder="Ingresar dirección de empresa" required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fas fa-window-close"></i> Salir</button>

          <button type="submit" class="btn btn-dodgerblue"><i class="far fa-save"></i> Guardar proveedor</button>

        </div>

      </form>

      <?php

        $crearProveedor = new ControladorProveedores();
        $crearProveedor -> ctrCrearProveedor();

      ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR PROVEEDOR
======================================-->

<div id="modalEditarProveedor" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background: dodgerblue; color:white">
          <center>
          <img class="modal-title" src="vistas/img/plantilla/editarproveedor.png" width="320px">
          </center>
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA LA DESCRIPCION -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="ion ion-ios-keypad" style="width: 10px"></i></span> 

                <select class="form-control input-lg" name="editarDescripcion" id="editarDescripcion" required>

                  <option value="">Seleccionar categoría</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                  foreach ($categorias as $key => $value) {
                    
                    echo '<option value="'.$value["categoria"].'">'.$value["categoria"].'</option>';
                  }

                  ?>
  
                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" ><i class="fa fa-user" style="width: 10px"></i></span> 

                <input type="text" class="form-control input-lg" name="editarProveedor" id="editarProveedor" required>
                <input type="hidden" name="idProveedor" id="idProveedor">

              </div>

            </div>

            <!-- ENTRADA PARA EL TELEFONO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" ><i class="fa fa-phone" style="width: 10px"></i></span> 

                <input type="text" class="form-control input-lg" name="editarTelefonoProveedor" id="editarTelefonoProveedor" pattern="[0-9 ]{9}" title="8 caracteres" data-inputmask="'mask': '9999 9999'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-at" style="width: 10px"></i></span> 

                <input type="email" class="form-control input-lg" name="editarEmailProveedor" id="editarEmailProveedor" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Todas las letras deben ser minúsculas">

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" ><i class="fa fa-building" style="width: 10px"></i></span> 

                <input type="text" class="form-control input-lg" name="editarEmpresa" id="editarEmpresa" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELEFONO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" ><i class="fa fa-phone" style="width: 10px"></i></span> 

                <input type="text" class="form-control input-lg" name="editarTelefonoEmpresa" id="editarTelefonoEmpresa" pattern="[0-9 ]{9}" title="8 caracteres" data-inputmask="'mask': '9999 9999'" data-mask>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-at" style="width: 10px"></i></span> 

                <input type="email" class="form-control input-lg" name="editarEmailEmpresa" id="editarEmailEmpresa" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Todas las letras deben ser minúsculas">

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker" style="width: 10px"></i></span> 

                <input type="text" class="form-control input-lg" name="editarDireccionEmpresa" id="editarDireccionEmpresa" required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fas fa-window-close"></i> Salir</button>

          <button type="submit" class="btn btn-dodgerblue"><i class="far fa-save"></i> Guardar cambios</button>

        </div>

      </form>

      <?php

        $editarProveedor = new ControladorProveedores();
        $editarProveedor -> ctrEditarProveedor();

      ?>

    </div>

  </div>

</div>

<?php

  $eliminarProveedor = new ControladorProveedores();
  $eliminarProveedor -> ctrEliminarProveedor();

?>