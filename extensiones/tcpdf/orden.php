<?php

//REQUERIR CONTROLADORES Y MODELOS
require_once "../../controladores/ventas.controlador.php";
require_once "../../modelos/ventas.modelo.php";

require_once "../../controladores/clientes.controlador.php";
require_once "../../modelos/clientes.modelo.php";

require_once "../../controladores/usuarios.controlador.php";
require_once "../../modelos/usuarios.modelo.php";

require_once "../../controladores/productos.controlador.php";
require_once "../../modelos/productos.modelo.php";

class imprimirOrden{

public $codigo;

public function traerImpresionOrden(){

//INFORMACIÓN DE LA VENTA
$itemVenta = "codigo";
$valorVenta = $this->codigo;

$respuestaVenta = ControladorVentas::ctrMostrarVentas($itemVenta, $valorVenta);

$fecha = substr($respuestaVenta["fecha"],0,-8);
$productos = json_decode($respuestaVenta["productos"], true);

//INFORMACIÓN DEL CLIENTE
$itemCliente = "id";
$valorCliente = $respuestaVenta["id_cliente"];

$respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

//INFORMACIÓN DEL VENDEDOR
$itemVendedor = "id";
$valorVendedor = $respuestaVenta["id_vendedor"];

$respuestaVendedor = ControladorUsuarios::ctrMostrarUsuarios($itemVendedor, $valorVendedor);

//INCLUIR LIBRERIA
include("library/tcpdf.php");

$pdf = new tcpdf('P','mm','A4');

$pdf->startPageGroup();

$pdf->SetPrintHeader(false);
$pdf->setPrintFooter(false); 

$pdf->AddPage();

// ------------------- BLOQUE 2 -------------------
$bloque1 = <<<EOF

	<table>

		<tr>

			<td style="width:150px">
			
			<br>
			<br>
			<img src="../../vistas/img/plantilla//logogd_negro.png">

			</td>

			<td style="width:140px">

				<div style="font-size: 10px; text-align: right; line-height: 15px">

					<br>
					NIT: 1291992-9

					<br>
					Guastatoya, El Progreso

				</div>			

			</td>

			<td style="width:140px">

				<div style="font-size: 10px; text-align: right; line-height: 15px">

					<br>
					Teléfono: 7945-1234

					<br>
					distguastatoya@gmail.com

				</div>			

			</td>

			<td style="width:110px; text-align: center; color: red">

					<br>
					<br>
					<b>NO. ORDEN</b>
					<br>
					<b>$valorVenta</b>	

			</td>

		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');


// ------------------- BLOQUE 2 -------------------
$bloque2 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:540px"><img src="images/back2.jpg"></td>
		
		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:270px">

				Cliente: <b>$respuestaCliente[nombre]</b>

			</td>

			<td style="border: 1px solid #666; background-color:white; width:135px">

				NIT: <b>$respuestaCliente[nit]</b>

			</td>

			<td style="border: 1px solid #666; background-color:white; width:135px; text-align:right">
			
				Fecha: <b>$fecha</b>

			</td>

		</tr>

		<tr>

			<td style="border: 1px solid #666; background-color:white; width:270px">

				Dirección: <b>$respuestaCliente[direccion]</b>

			</td>
		
			<td style="border: 1px solid #666; background-color:white; width:270px">

				Vendedor: <b>$respuestaVendedor[nombre]</b>

			</td>

		</tr>

		<tr>
		
		<td style="border-bottom: 1px solid #666; background-color:white; width:540px"></td>

		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');


// ------------------- BLOQUE 3 -------------------
$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		<td style="border: 1px solid #666; background-color:white; width:90px; text-align:center">Cantidad</td>
		<td style="border: 1px solid #666; background-color:white; width:450px; text-align:center">Producto</td>
		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');


// ------------------- BLOQUE 4 -------------------
foreach ($productos as $key => $item) {

$itemProducto = "descripcion";
$valorProducto = $item["descripcion"];
$orden = null;

$respuestaProducto = ControladorProductos::ctrMostrarProductos($itemProducto, $valorProducto, $orden);

$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>			

			<td style="color:#333; background-color:white; border-left: 1px solid #666;width:90px;  text-align:center">
				
				$item[cantidad]
			
			</td>

			<td style="color:#333; border-right: 1px solid #666; background-color:white; width:450px;">
				
				$item[descripcion]
			
			</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');

}

// ------------------- BLOQUE 5 -------------------
$bloque5 = <<<EOF

	<table>

		<tr>
		
			<td style="border-bottom: 1px solid #666; border-left: 1px solid #666; border-right: 1px solid #666; width:540px"></td>

		</tr>

	</table>
	<table>

		<tr>
		
			<td style="width:540px"></td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');

// ------------------- BLOQUE 5 -------------------
$bloque6 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:540px"><img src="images/back2.jpg"></td>
		
		</tr>

	</table>

	<table>

		<tr>
		
			<td style="width:170px"></td>
			<td style="border-bottom: 1px solid #666; width:200px"></td>
			<td style="width:170px"></td>

		</tr>
		<tr>
			<td style="width:170px"></td>
			<td style="width:200px; text-align:center">$respuestaVendedor[nombre]</td>
			<td style="width:170px"></td>
		
		</tr>


	</table>

EOF;

$pdf->writeHTML($bloque6, false, false, false, false, '');

// ------------------- IMPRIMIR -------------------
$pdf->Output('orden'.$valorVenta.'.pdf');

}

}

$factura = new imprimirOrden();
$factura -> codigo = $_GET["codigo"];
$factura -> traerImpresionOrden();

?>