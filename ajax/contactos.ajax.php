<?php

require_once "../controladores/contactos.controlador.php";
require_once "../modelos/contactos.modelo.php";

class AjaxContactos{

	/*=============================================
	EDITAR CONTACTOS
	=============================================*/	

	public $idContacto;

	public function ajaxEditarContacto(){

		$item = "id";
		$valor = $this->idContacto;

		$respuesta = ControladorContactos::ctrMostrarContactos($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR CONTACTO
=============================================*/	

if(isset($_POST["idContacto"])){

	$contacto = new AjaxContactos();
	$contacto -> idContacto = $_POST["idContacto"];
	$contacto -> ajaxEditarContacto();

}