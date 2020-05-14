<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu ">

			<li>

				<a href="inicio">

					<i class="ion ion-ios-home"></i>
					<span>Inicio</span>

				</a>

			</li>

			<?php

			if ($_SESSION["perfil"] == "Administrador") {

			echo '

			<li>

				<a href="usuarios">

					<i class="ion ion-ios-person"></i>
					<span>Usuarios</span>

				</a>

			</li>

			<li>

				<a href="contactos">

					<i class="ion ion-ios-telephone"></i>
					<span>Agenda teléfonica</span>

				</a>

			</li>';

			}

			?>

			<li>

				<a href="clientes">

					<i class="ion ion-ios-people"></i>
					<span>Clientes</span>

				</a>

			</li>

			<li>

				<a href="categorias">

					<i class="ion ion-ios-keypad"></i>
					<span>Categorías</span>

				</a>

			</li>

			<?php

			if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Editor") {

			echo '

			<li>

				<a href="proveedores">

					<i class="ion ion-ios-briefcase"></i>
					<span>Proveedores</span>

				</a>

			</li>';

			}

			?>

			<li>

				<a href="productos">

					<i class="ion ion-ios-pricetags"></i>
					<span>Productos</span>

				</a>

			</li>

			<li>

				<a href="ordenes">
							
					<i class="ion ion-clipboard"></i>
					<span>Órdenes de trabajo</span>

				</a>

			</li>

			

			<li>

				<a href="facturacion">
							
					
					<b>Q</b>&nbsp
					&nbsp<span>Facturación</span>

				</a>

			</li>

			<li>

				<a href="crear-venta">
							
					<i class="ion ion-ios-cart"></i>
					<span>Crear venta</span>

				</a>

			</li>

			<?php

			if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Editor") {

			echo '

			<li>

				<a href="reportes">
							
					<i class="ion ion-stats-bars"></i>
					<span>Reporte de ventas</span>

				</a>

			</li>';

			}

			?>

			<li>

				<a href="faq">
							
					<i class="ion ion-help"></i>
					<span>Preguntas frecuentes</span>

				</a>

			</li>

		</ul>

	</section>

</aside>