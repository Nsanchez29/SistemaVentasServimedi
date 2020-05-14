<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Clientes

    </h1>

  </section>

  <section class="content">

    <div class="box box-dodgerblue">

      <div class="box-header with-border">

        <button class="btn btn-dodgerblue" data-toggle="modal" data-target="#modalAgregarCliente">

          Agregar cliente

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-hover dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:5px">No.</th>
              <th style="text-align: center">Nombre</th>
              <th style="width:60px; text-align: center">NIT</th>
              <th style="text-align: center">Email</th>
              <th style="width:5px; text-align: center">Teléfono</th>
              <th style="text-align: center">Dirección</th>
              <th style="width:10px; text-align: center">Total compras</th>
              <th style="text-align: center">Última compra</th>
              <th style="text-align: center">Registro</th>
              <th style="width:10px; text-align: center">Acciones</th>

            </tr>

          </thead>

          <tbody style="text-align: center">

            <?php

            $item = null;
            $valor = null;

            $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

            foreach ($clientes as $key => $value) {

              echo '<tr>

                  <td>' . ($key + 1) . '</td>

                  <td>' . $value["nombre"] . '</td>

                  <td>' . $value["nit"] . '</td>

                  <td>' . $value["email"] . '</td>

                  <td>' . $value["telefono"] . '</td>

                  <td>' . $value["direccion"] . '</td>           

                  <td>' . $value["compras"] . '</td>

                  <td>' . $value["ultima_compra"] . '</td>

                  <td>' . $value["fecha"] . '</td>

                  <td>

                    <div class="btn-group">
                          
                      <button class="btn btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" idCliente="' . $value["id"] . '"><i class="fa fa-pencil"></i></button>';

              if ($_SESSION["perfil"] == "Administrador") {

                echo '

                      <button class="btn btn-danger btnEliminarCliente" idCliente="' . $value["id"] . '"><i class="fa fa-times"></i></button>';
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

          <h4 class="modal-title">Agregar cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user" style="width: 10px"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL NIT -->

            <div class="form-group">

              <div class="input-group has-feedback">

                <span class="input-group-addon"><i class="fa fa-key" style="width: 10px"></i></span>

                <input type="text" class="form-control input-lg" id="nit" name="nuevoNitId" placeholder="Ingresar NIT" maxlength="9" pattern="[0-9]{6,}[-][k|K|0-9]$" title="Formato no válido. Utiliza guión" required>

                <span class="glyphicon form-control-feedback"></span>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-at" style="width: 10px"></i></span>

                <input type="email" class="form-control input-lg" name="nuevoEmail" value="n_a@correo.com" placeholder="Ingresar email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Todas las letras deben ser minúsculas" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone" style="width: 10px"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoTelefono" value="00000000" pattern="[0-9 ]{9}" title="8 caracteres" data-inputmask="'mask': '9999 9999'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker" style="width: 10px"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaDireccion" value="Ciudad" placeholder="Ingresar dirección" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-dodgerblue">Guardar cliente</button>

        </div>

      </form>

      <?php

      $crearCliente = new ControladorClientes();
      $crearCliente->ctrCrearCliente();

      ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CLIENTE
======================================-->

<div id="modalEditarCliente" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background: dodgerblue; color:white">

          <h4 class="modal-title">Editar cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user" style="width: 10px"></i></span>

                <input type="text" class="form-control input-lg" name="editarCliente" id="editarCliente" required>
                <input type="hidden" id="idCliente" name="idCliente">
              </div>

            </div>

            <!-- ENTRADA PARA EL NIT -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key" style="width: 10px"></i></span>

                <input type="text" class="form-control input-lg" name="editarNitId" id="editarNitId" maxlength="9" pattern="[0-9]{6,}[-][k|K|0-9]$" title="Formato no valido" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-at" style="width: 10px"></i></span>

                <input type="email" class="form-control input-lg" name="editarEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Todas las letras deben ser minúsculas" id="editarEmail">

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone" style="width: 10px"></i></span>

                <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono" pattern="[0-9 ]{9}" title="8 caracteres" data-inputmask="'mask': '9999 9999'" data-mask>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker" style="width: 10px"></i></span>

                <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-dodgerblue">Guardar cambios</button>

        </div>

      </form>

      <?php

      $editarCliente = new ControladorClientes();
      $editarCliente->ctrEditarCliente();

      ?>

    </div>

  </div>

</div>

<?php

$eliminarCliente = new ControladorClientes();
$eliminarCliente->ctrEliminarCliente();

?>