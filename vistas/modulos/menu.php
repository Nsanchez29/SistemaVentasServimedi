<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu ">

			<li>

				<a href="inicio">

					<i class="fas fa-home"></i>
					<span>Inicio</span>

				</a>

			</li>

			<?php

			if ($_SESSION["perfil"] == "Administrador") {

			echo '

			<li>

				<a href="usuarios">

				<i class="fas fa-users-cog"></i>
					<span>Usuarios</span>

				</a>

			</li>';

			}

			?>

			<li>

				<a href="clientes">

				<i class="fas fa-user"></i>
					<span>Clientes</span>

				</a>

			</li>


			<?php

			if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Editor") {

			echo '

			<li>

				<a href="proveedores">

				<i class="fas fa-user"></i>
					<span>Proveedores</span>

				</a>

			</li>';

			}

			?>

			<li>

				<a href="categorias">

					<i class="fas fa-barcode"></i>
					<span>Categorías</span>

				</a>

			</li>

			<li>

				<a href="productos">

					<i class="fas fa-box-open"></i>
					<span>Productos</span>

				</a>

			</li>

			

			

			<li>

				<a href="facturacion">
							
					
				<i class="fas fa-shopping-cart"></i>
					<span>Ventas</span>

				</a>

			</li>

			

			<?php

			if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Editor") {

			echo '

			<li>

				<a href="reportes">
							
					<i class="far fa-folder-open"></i>
					<span>Reporte de ventas</span>

				</a>

			</li>';

			}

			?>


		</ul>

	</section>

</aside>