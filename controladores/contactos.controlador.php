<?php

class ControladorContactos{

	/*=============================================
	CREAR CONTACTO
	=============================================*/

	static public function ctrCrearContacto(){

		if(isset($_POST["nuevoContacto"])){

			if(	preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoContacto"]) &&
			   	preg_match('/^[0-9 ]+$/', $_POST["nuevoCelular"]) &&
			   	preg_match('/^[0-9 ]+$/', $_POST["nuevoTelefono"]) &&
			   	preg_match('/^[^0-9][a-z0-9_]+([.][a-z0-9_]+)*[@][a-z0-9_]+([.][a-z0-9_]+)*[.][a-z]{2,4}$/', $_POST["nuevoEmail"]) && 
			   	preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. ]+$/', $_POST["nuevoDireccion"])){

			   	$tabla = "tbl_contacto";

			   	$datos = array("nombre"=>$_POST["nuevoContacto"],
					           "celular"=>$_POST["nuevoCelular"],
					           "telefono"=>$_POST["nuevoTelefono"],
					           "email"=>$_POST["nuevoEmail"],
					           "direccion"=>$_POST["nuevoDireccion"]);

			   	$respuesta = ModeloContactos::mdlIngresarContacto($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El contacto ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "contactos";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El contacto no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "contactos";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	MOSTRAR CONTACTOS
	=============================================*/

	static public function ctrMostrarContactos($item, $valor){

		$tabla = "tbl_contacto";

		$respuesta = ModeloContactos::mdlMostrarContactos($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR CONTACTO
	=============================================*/

	static public function ctrEditarContacto(){

		if(isset($_POST["editarContacto"])){

			if(	preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarContacto"]) &&
			   	preg_match('/^[0-9 ]+$/', $_POST["editarCelular"]) &&
			   	preg_match('/^[0-9 ]+$/', $_POST["editarTelefono"]) &&
			   	preg_match('/^[^0-9][a-z0-9_]+([.][a-z0-9_]+)*[@][a-z0-9_]+([.][a-z0-9_]+)*[.][a-z]{2,4}$/', $_POST["editarEmail"]) && 
			   	preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. ]+$/', $_POST["editarDireccion"])){

			   	$tabla = "tbl_contacto";

			   	$datos = array("id"=>$_POST["idContacto"],
			   					"nombre"=>$_POST["editarContacto"],
					           "celular"=>$_POST["editarCelular"],
					           "telefono"=>$_POST["editarTelefono"],
					           "email"=>$_POST["editarEmail"],
					           "direccion"=>$_POST["editarDireccion"]);

			   	$respuesta = ModeloContactos::mdlEditarContacto($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El contacto ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "contactos";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El contacto no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "contactos";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	ELIMINAR CONTACTO
	=============================================*/

	static public function ctrEliminarContacto(){

		if(isset($_GET["idContacto"])){

			$tabla ="tbl_contacto";
			$datos = $_GET["idContacto"];

			$respuesta = ModeloContactos::mdlEliminarContacto($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El contacto ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "contactos";

								}
							})

				</script>';

			}		

		}

	}

}