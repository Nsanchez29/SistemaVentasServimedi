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

class imprimirFactura{

public $codigo;

public function traerImpresionFactura(){

//INFORMACIÓN DE LA VENTA
$itemVenta = "codigo";
$valorVenta = $this->codigo;

$respuestaVenta = ControladorVentas::ctrMostrarVentas($itemVenta, $valorVenta);

$fecha = substr($respuestaVenta["fecha"],0,-8);
$productos = json_decode($respuestaVenta["productos"], true);
$subtotal = number_format($respuestaVenta["subtotal"],2);
$descuento = number_format($respuestaVenta["descuento"],2);
$total = number_format($respuestaVenta["total"],2);

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

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(100, 50), true, 'UTF-8', false);

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
					<b>NO. FACTURA</b>
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
		
		<td style="border: 1px solid #666; background-color:white; width:80px; text-align:center">Cantidad</td>
		<td style="border: 1px solid #666; background-color:white; width:260px; text-align:center">Descripción</td>
		<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">Valor unit.</td>
		<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">Valor total</td>

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

$valorUnitario = number_format($respuestaProducto["precio_venta"], 2);

$precioTotal = number_format($item["total"], 2);

$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="color:#333; border-left: 1px solid #666;  background-color:white; width:80px; text-align:center">
				
				$item[cantidad]
			
			</td>
			
			<td style="color:#333; background-color:white; width:260px;">
				
				$item[descripcion]
			
			</td>

			<td style="color:#333; background-color:white; width:100px; text-align:right">
				
				Q $valorUnitario
			
			</td>

			<td style="color:#333; border-right: 1px solid #666; background-color:white; width:100px; text-align:right">
				
				Q $precioTotal
			
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

EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');

// ------------------- BLOQUE 6 -------------------
$bloque6 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		
			<td style="width:540px"></td>

		</tr>

		<tr>
		
			<td style="width:340px;"></td>

			<td style="border: 1px solid #666;  background-color:white; width:100px; text-align:right">Subtotal:
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:right">
				Q $subtotal
			</td>

		</tr>

		<tr>
		
			<td style="width:340px;"></td>

			<td style="border: 1px solid #666;  background-color:white; width:100px; text-align:right">
				Descuento:
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:right">
				Q $descuento
			</td>

		</tr>

		<tr>
		
			<td style="width:340px;"></td>

			<td style="border: 1px solid #666;  background-color:white; width:100px; text-align:right">
				<b>Total</b>:
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:right">
				<b>Q $total</b>
			</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque6, false, false, false, false, '');

// ------------------- IMPRIMIR -------------------
$pdf->Output('factura'.$valorVenta.'.pdf');

}

}

$factura = new imprimirFactura();
$factura -> codigo = $_GET["codigo"];
$factura -> traerImpresionFactura();

?>