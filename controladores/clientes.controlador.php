<?php

class ControladorClientes{

	/*=============================================
	CREAR CLIENTES
	=============================================*/

	static public function ctrCrearCliente(){

		if(isset($_POST["nuevoCliente"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCliente"]) &&
			   preg_match('/^[0-9]+[-][k|K|0-9]$/', $_POST["nuevoNitId"]) &&
			   preg_match('/^[^0-9][a-z0-9_]+([.][a-z0-9_]+)*[@][a-z0-9_]+([.][a-z0-9_]+)*[.][a-z]{2,4}$/', $_POST["nuevoEmail"]) && 
			   preg_match('/^[0-9 ]+$/', $_POST["nuevoTelefono"]) && 
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDireccion"])){

			   	$tabla = "tbl_cliente";

			   	$datos = array("nombre"=>$_POST["nuevoCliente"],
					           "nit"=>$_POST["nuevoNitId"],
					           "email"=>$_POST["nuevoEmail"],
					           "telefono"=>$_POST["nuevoTelefono"],
					           "direccion"=>$_POST["nuevaDireccion"]);

			   	$respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El cliente ha sido guardado correctamente",
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
						  title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "clientes";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/

	static public function ctrMostrarClientes($item, $valor){

		$tabla = "tbl_cliente";

		$respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR CLIENTE
	=============================================*/

	static public function ctrEditarCliente(){

		if(isset($_POST["editarCliente"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCliente"]) &&
			   preg_match('/^[0-9]+[-][k|K|0-9]$/', $_POST["editarNitId"]) &&
			   preg_match('/^[^0-9][a-z0-9_]+([.][a-z0-9_]+)*[@][a-z0-9_]+([.][a-z0-9_]+)*[.][a-z]{2,4}$/', $_POST["editarEmail"]) && 
			   preg_match('/^[0-9 ]+$/', $_POST["editarTelefono"]) && 
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/', $_POST["editarDireccion"])){

			   	$tabla = "tbl_cliente";

			   	$datos = array("id"=>$_POST["idCliente"],
			   				   "nombre"=>$_POST["editarCliente"],
					           "nit"=>$_POST["editarNitId"],
					           "email"=>$_POST["editarEmail"],
					           "telefono"=>$_POST["editarTelefono"],
					           "direccion"=>$_POST["editarDireccion"]);

			   	$respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El cliente ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "clientes";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "clientes";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function ctrEliminarCliente(){

		if(isset($_GET["idCliente"])){

			$tabla ="tbl_cliente";
			$datos = $_GET["idCliente"];

			$respuesta = ModeloClientes::mdlEliminarCliente($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El cliente ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "clientes";

								}
							})

				</script>';

			}		

		}

	}

	/*===================================
	=         DESCARGAR CLIENTES        =
	===================================*/

	public function ctrDescargarClientes(){

		if(isset($_GET["clientes"])){

			$tabla = "tbl_cliente";

				$item = null;
				$valor = null;

				$clientes = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);

			}

			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$Name = $_GET["clientes"].date('_d-m-Y').'.xls';

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
					<td style='font-weight:bold; border:1px solid #eee; text-align: center'>NOMBRE</td> 
					<td style='font-weight:bold; border:1px solid #eee; text-align: center'>NIT</td>
					<td style='font-weight:bold; border:1px solid #eee; text-align: center'>EMAIL</td>
					<td style='font-weight:bold; border:1px solid #eee; text-align: center'>TELEFONO</td>
					<td style='font-weight:bold; border:1px solid #eee; text-align: center'>DIRECCION</td>
					<td style='font-weight:bold; border:1px solid #eee; text-align: center'>COMPRAS</td>
					<td style='font-weight:bold; border:1px solid #eee; text-align: center'>ÚLTIMA COMPRA</td>
					</tr>");

			foreach ($clientes as $row => $item){			

			 echo utf8_decode("<tr>
			 			<td style='border:1px solid #eee;'>".$item["nombre"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["nit"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["email"]."</td>			 			
			 			<td style='border:1px solid #eee; text-align: center'>".$item["telefono"]."</td>
			 			<td style='border:1px solid #eee; text-align: center'>".$item["direccion"]."</td>
			 			<td style='border:1px solid #eee; text-align: center'>".$item["compras"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["ultima_compra"]."</td>
			 		</tr>");

			}

			echo "</table>";

		}

}