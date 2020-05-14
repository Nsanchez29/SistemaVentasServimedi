<?php

if ($_SESSION["perfil"] == "Vendedor") {

  echo '<script>

    window.location = "404";

  </script>';

  return;
}

?>

<div class="content-wrapper">
  
  <section class="content-header">

    <h1>

      Agenda teléfonica

    </h1>

  </section>

  <section class="content">

    <div class="box box-dodgerblue">

      <div class="box-header with-border">

        <button class="btn btn-dodgerblue" data-toggle="modal" data-target="#modalAgregarContacto">

          Agregar contacto

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-hover dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:5px">No.</th>
              <th style="text-align: center">Nombre</th>
              <th style="width:60px; text-align: center">Celular</th>
              <th style="width:5px; text-align: center">Teléfono</th>
              <th style="text-align: center">Email</th>
              <th style="text-align: center">Dirección</th>
              <th style="width:10px; text-align: center">Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $contactos = ControladorContactos::ctrMostrarContactos($item, $valor);

            foreach ($contactos as $key => $value) {

              echo '<tr>

                    <td style="text-align: center">' . ($key + 1) . '</td>

                    <td style="text-align: center">' . $value["nombre"] . '</td>

                    <td>' . $value["celular"] . '</td>

                    <td>' . $value["telefono"] . '</td>

                    <td style="text-align: center">' . $value["email"] . '</td>

                    <td style="text-align: center">' . $value["direccion"] . '</td>           

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarContacto" data-toggle="modal" data-target="#modalEditarContacto" idContacto="' . $value["id"] . '"><i class="fa fa-pencil"></i></button>';

              if ($_SESSION["perfil"] == "Administrador") {

                echo '

                        <button class="btn btn-danger btnEliminarContacto" idContacto="' . $value["id"] . '"><i class="fa fa-times"></i></button>';
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
MODAL AGREGAR CONTACTO
======================================-->

<div id="modalAgregarContacto" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background: dodgerblue; color:white">

          <h4 class="modal-title">Agregar contacto</h4>

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

                <input type="text" class="form-control input-lg" name="nuevoContacto" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL CELULAR -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-mobile-phone" style="width: 10px"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCelular" value="00000000" pattern="[0-9 ]{9}" title="8 caracteres" data-inputmask="'mask': '9999 9999'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone" style="width: 10px"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoTelefono" value="00000000" pattern="[0-9 ]{9}" title="8 caracteres" data-inputmask="'mask': '9999 9999'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-at" style="width: 10px"></i></span>

                <input type="email" class="form-control input-lg" name="nuevoEmail" value="n_a@correo.com" placeholder="Ingresar email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Todas las letras deben ser minúsculas" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker" style="width: 10px"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoDireccion" placeholder="Ingresar dirección" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-dodgerblue">Guardar contacto</button>

        </div>

      </form>

      <?php

      $crearContacto = new ControladorContactos();
      $crearContacto->ctrCrearContacto();

      ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CONTACTO
======================================-->

<div id="modalEditarContacto" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background: dodgerblue; color:white">

          <h4 class="modal-title">Editar contacto</h4>

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

                <input type="text" class="form-control input-lg" name="editarContacto" id="editarContacto" required>

                <input type="hidden" id="idContacto" name="idContacto">

              </div>

            </div>

            <!-- ENTRADA PARA EL CELULAR -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-mobile" style="width: 10px"></i></span>

                <input type="text" class="form-control input-lg" name="editarCelular" id="editarCelular" pattern="[0-9 ]{9}" title="8 caracteres" data-inputmask="'mask': '9999 9999'" data-mask>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone" style="width: 10px"></i></span>

                <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono" pattern="[0-9 ]{9}" title="8 caracteres" data-inputmask="'mask': '9999 9999'" data-mask>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-at" style="width: 10px"></i></span>

                <input type="email" class="form-control input-lg" name="editarEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Todas las letras deben ser minúsculas" id="editarEmail">

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

      $editarContacto = new ControladorContactos();
      $editarContacto->ctrEditarContacto();

      ?>

    </div>

  </div>

</div>

<?php

$eliminarContacto = new ControladorContactos();
$eliminarContacto->ctrEliminarContacto();

?>