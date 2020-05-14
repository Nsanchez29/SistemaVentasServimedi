<?php

class ControladorProveedores{

	/*=============================================
	CREAR PROVEEDOR
	=============================================*/

	static public function ctrCrearProveedor(){

		if(isset($_POST["nuevoProveedor"])){

			if(	preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ, ]+$/', $_POST["nuevoDescripcion"]) &&
				preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoProveedor"]) &&
			   	preg_match('/^[0-9 ]+$/', $_POST["nuevoTelefonoProveedor"]) && 
			   	preg_match('/^[^0-9][a-z0-9_]+([.][a-z0-9_]+)*[@][a-z0-9_]+([.][a-z0-9_]+)*[.][a-z]{2,4}$/', $_POST["nuevoEmailProveedor"]) && 
			   	preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoEmpresa"]) &&
			   	preg_match('/^[0-9 ]+$/', $_POST["nuevoTelefonoEmpresa"]) && 
			   	preg_match('/^[^0-9][a-z0-9_]+([.][a-z0-9_]+)*[@][a-z0-9_]+([.][a-z0-9_]+)*[.][a-z]{2,4}$/', $_POST["nuevoEmailEmpresa"]) && 
			   	preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoDireccionEmpresa"])){

			   	$tabla = "tbl_proveedor";

			   	$datos = array("descripcion"=>$_POST["nuevoDescripcion"],
			   				   "nombre"=>$_POST["nuevoProveedor"],
					           "telefono_proveedor"=>$_POST["nuevoTelefonoProveedor"],
					           "email_proveedor"=>$_POST["nuevoEmailProveedor"],
					           "empresa"=>$_POST["nuevoEmpresa"],
					           "telefono_empresa"=>$_POST["nuevoTelefonoEmpresa"],
					           "email_empresa"=>$_POST["nuevoEmailEmpresa"],
					           "direccion_empresa"=>$_POST["nuevoDireccionEmpresa"]);

			   	$respuesta = ModeloProveedores::mdlIngresarProveedor($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El proveedor ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El proveedor no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "proveedores";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	MOSTRAR PROVEEDOR
	=============================================*/

	static public function ctrMostrarProveedores($item, $valor){

		$tabla = "tbl_proveedor";

		$respuesta = ModeloProveedores::mdlMostrarProveedores($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR PROVEEDOR
	=============================================*/

	static public function ctrEditarProveedor(){

		if(isset($_POST["editarProveedor"])){

			if(	preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ, ]+$/', $_POST["editarDescripcion"]) &&
				preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarProveedor"]) &&
			   	preg_match('/^[0-9 ]+$/', $_POST["editarTelefonoProveedor"]) && 
			   	preg_match('/^[^0-9][a-z0-9_]+([.][a-z0-9_]+)*[@][a-z0-9_]+([.][a-z0-9_]+)*[.][a-z]{2,4}$/', $_POST["editarEmailProveedor"]) && 
			   	preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarEmpresa"]) &&
			   	preg_match('/^[0-9 ]+$/', $_POST["editarTelefonoEmpresa"]) && 
			   	preg_match('/^[^0-9][a-z0-9_]+([.][a-z0-9_]+)*[@][a-z0-9_]+([.][a-z0-9_]+)*[.][a-z]{2,4}$/', $_POST["editarEmailEmpresa"]) && 
			   	preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDireccionEmpresa"])){

			   	$tabla = "tbl_proveedor";

			   	$datos = array(	"id"=>$_POST["idProveedor"],
			   					"descripcion"=>$_POST["editarDescripcion"],
			   				   	"nombre"=>$_POST["editarProveedor"],
						        "telefono_proveedor"=>$_POST["editarTelefonoProveedor"],
								"email_proveedor"=>$_POST["editarEmailProveedor"],
						        "empresa"=>$_POST["editarEmpresa"],
						        "telefono_empresa"=>$_POST["editarTelefonoEmpresa"],
						        "email_empresa"=>$_POST["editarEmailEmpresa"],
						        "direccion_empresa"=>$_POST["editarDireccionEmpresa"]);

			   	$respuesta = ModeloProveedores::mdlEditarProveedor($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El proveedor ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El proveedor no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "proveedores";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function ctrEliminarProveedor(){

		if(isset($_GET["idProveedor"])){

			$tabla ="tbl_proveedor";
			$datos = $_GET["idProveedor"];

			$respuesta = ModeloProveedores::mdlEliminarProveedor($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El proveedor ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "proveedores";

								}
							})

				</script>';

			}		

		}

	}

	/*===================================
	=        DESCARGAR PROVEEDORES      =
	===================================*/


	public function ctrDescargarProveedores(){

		if(isset($_GET["proveedores"])){

			$tabla = "tbl_proveedor";


				$item = null;
				$valor = null;

				$proveedores = ModeloProveedores::mdlMostrarProveedores($tabla, $item, $valor);

			}

			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$Name = $_GET["proveedores"].date('_d-m-Y').'.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:; filename="'.$Name.'"');
			header("Content-Transfer-Encoding: binary");

			echo utf8_decode("<table border='0'> 

					<tr>
					<td style='font-weight:bold; border:1px solid #eee; text-align: center'>ID</td>
					<td style='font-weight:bold; border:1px solid #eee; text-align: center'>DESCRIPCIÓN</td>
					<td style='font-weight:bold; border:1px solid #eee; text-align: center'>NOMBRE</td>
					<td style='font-weight:bold; border:1px solid #eee; text-align: center'>TELÉFONO</td>
					<td style='font-weight:bold; border:1px solid #eee; text-align: center'>EMAIL</td>
					<td style='font-weight:bold; border:1px solid #eee; text-align: center'>EMPRESA</td>
					<td style='font-weight:bold; border:1px solid #eee; text-align: center'>TELÉFONO</td>
					<td style='font-weight:bold; border:1px solid #eee; text-align: center'>EMAIL</td>
					<td style='font-weight:bold; border:1px solid #eee; text-align: center'>DIRECCION</td>
					</tr>");

			foreach ($proveedores as $row => $item){

			 echo utf8_decode("<tr>
			 			<td style='border:1px solid #eee;'>".$item["id"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["descripcion"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["nombre"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["telefono_proveedor"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["email_proveedor"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["empresa"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["telefono_empresa"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["email_empresa"]."</td>
						<td style='border:1px solid #eee;'>".$item["direccion_empresa"]."</td>
			 		</tr>");

			}

			echo "</table>";

		}

}
