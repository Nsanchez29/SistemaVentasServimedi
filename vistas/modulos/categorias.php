<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Categorías

    </h1>

  </section>

  <section class="content">

    <div class="box box-dodgerblue">

      <?php

      if ($_SESSION["perfil"] == "Administrador") {

        echo '

        <div class="box-header with-border">

          <button class="btn btn-dodgerblue" data-toggle="modal" data-target="#modalAgregarCategoria">
          
            Agregar categoría

          </button>

        </div>';
      }

      ?>

      <div class="box-body">

        <table class="table table-bordered table-hover dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px; text-align: center">No.</th>
              <th style="text-align: center">Categoría</th>
              <?php

              if ($_SESSION["perfil"] == "Administrador") {

                echo '<th style="width:10px; text-align: center">Acciones</th>';
              }

              ?>

            </tr>

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

            foreach ($categorias as $key => $value) {

              echo ' <tr>

                    <td style="text-align: center">' . ($key + 1) . '</td>

                    <td>' . $value["categoria"] . '</td>';

              if ($_SESSION["perfil"] == "Administrador") {

                echo '
                    <td style="text-align: center">

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarCategoria" idCategoria="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button>

                        

                        <button class="btn btn-danger btnEliminarCategoria" idCategoria="' . $value["id"] . '"><i class="fa fa-times"></i></button>';
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
MODAL AGREGAR CATEGORÍA
======================================-->

<div id="modalAgregarCategoria" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#1E90FF; color:white">

          <h4 class="modal-title">Agregar categoría</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th" style="width: 10px"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaCategoria" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{5,}" title="Debe contener únicamente letras. Mínimo 5 caracteres." placeholder="Ingresar categoría" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-dodgerblue">Guardar categoría</button>

        </div>

        <?php

        $crearCategoria = new ControladorCategorias();
        $crearCategoria->ctrCrearCategoria();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->

<div id="modalEditarCategoria" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background: dodgerblue; color:white">

          <h4 class="modal-title">Editar categoría</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th" style="width: 10px"></i></span>

                <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{5,}" title="Debe contener únicamente letras. Mínimio 5 caracteres." required>

                <input type="hidden" name="idCategoria" id="idCategoria" required>

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

        <?php

        $editarCategoria = new ControladorCategorias();
        $editarCategoria->ctrEditarCategoria();

        ?>

      </form>

    </div>

  </div>

</div>

<?php

$borrarCategoria = new ControladorCategorias();
$borrarCategoria->ctrBorrarCategoria();

?>